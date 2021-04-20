<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin == 1)
        {
            $data = DB::select("SELECT * FROM users where name!= 'admin'");
            return view('admin.index', compact('data')); //jalankan view folder admin file index
        }
        return view('home');
        
    }

     public function terima()
    {
        $data = DB::select("select * from users where id != 1 and status = 'diterima' ");
        return view('admin.diterima', compact('data'));
    }
     public function tolak()
    {
        $data = DB::select("select * from users where id != 1 and status = 'ditolak' ");
        return view('admin.ditolak', compact('data'));
    }

    public function diterima($id){
        $terima = User::where('id', $id)->update(['status'=>'diterima']);

        if($terima){
            return redirect('/admin')->with('status', ' Siswa Berhasil diterima');
        }else{
            return redirect('/admin')->with('status', 'Siswa Gagal Diterima');
        }
    }
    public function ditolak($id){
        $terima = User::where('id', $id)->update(['status'=>'ditolak']);

        if($terima){
            return redirect('/admin')->with('status', ' Siswa Berhasil ditolak');
        }else{
            return redirect('/admin')->with('status', 'Siswa Gagal ditolak');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
