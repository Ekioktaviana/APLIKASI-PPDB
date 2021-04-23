<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $document = Document::where('nisn' , Auth::user()->nisn)->get();
        return view('home', compact('document'));
    }

    public function adminHome()
    {
        $data = DB::select("SELECT * FROM users where name != 'admin'");
        return view('admin.adminHome', compact('data'));
    }
}
