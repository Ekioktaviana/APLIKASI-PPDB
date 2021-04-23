<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Auth;
use DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $data = Document::where('nisn',Auth::user()->nisn);
        // dd($data);
        //if(Auth::user()->is_admin == 1)
        //{
        //      return view('admin.index', compact('data')); 
        // }
        return view('user.document', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::select('select * from users where id !=1');
        $data = Document::all();
        if(Auth::user()->is_admin == 1){
            return view('admin.index', compact('data','user'));
        }
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'kk' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'akte' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'skhun' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'ijazah' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $path2 = $request->file('kk')->store('public/images');
        $path3 = $request->file('akte')->store('public/images');
        $path4 = $request->file('skhun')->store('public/images');
        $path5 = $request->file('ijazah')->store('public/images');

        $document = new Document();

        $document ->nisn = $request->nisn;
        $document->kk = $path2;
        $document->akte = $path3;
        $document->skhun = $path4;
        $document->ijazah = $path5;

        $document->save();

        // $request->validate([
        //     'nisn' => 'required',
        //     'kk' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     'akte' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     'skhun' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     'ijazah' =>'required|mimes:jpeg,png,jpg,gif,svg',
        // ]);

        // $imgname = $request->kk->getClientOriginalName();
        // $request->kk->move(public_path('image'),$imgname);

        // $imgname1 = $request->akte->getClientOriginalName();
        // $request->akte->move(public_path('image'),$imgname1);

        // $imgname2 = $request->skhun->getClientOriginalName();
        // $request->skhun->move(public_path('image'),$imgname2);

        // $imgname3 = $request->ijazah->getClientOriginalName();
        // $request->ijazah->move(public_path('image'),$imgname3);

        // $document = new Document();

        // $document ->nisn = $request->nisn;
        // $document ->kk = $imgname;
        // $document ->akte = $imgname1;
        // $document ->skhun = $imgname2;
        // $document ->ijazah = $imgname3;
        
        // $document ->save();

        return redirect()->route('user.document');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::where('nisn', Auth::user()->nisn )->first();
        $document = Document::where('nisn', Auth::user()->nisn )->first();
        // dd($document);
        return view('user.document', compact('document', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $id)
    {
        // dd($id);
        // $user = User::where('nisn', $id->nisn)->first();
        // $document = Document::where('nisn', $id->nisn)->get();
        // dd($document);
        return view('user.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Document $id)
    {   
        if($request->hasFile('kk')){
            $request->validate([
                'kk' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path2 = $request->file('kk')->store('public/images');

            $id->kk = $path2;
        }

        if($request->hasFile('akte')){
            $request->validate([
                'akte' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path3 = $request->file('akte')->store('public/images');

            $id->akte = $path3;
        }

        if($request->hasFile('skhun')){
            $request->validate([
                'skhun' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path4 = $request->file('skhun')->store('public/images');

            $id->skhun = $path4;
        }

        if($request->hasFile('ijazah')){
            $request->validate([
                'ijazah' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path5 = $request->file('ijazah')->store('public/images');

            $id->ijazah = $path5;
        }
        
        // $id->title = $request->title;
        // $id->description = $request->description;

        $id->save();
        // dd($id);
        // $request->validate([
        //     'nisn' => 'required',
        //     'kk' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     'akte' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     'skhun' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     'ijazah' =>'required|mimes:jpeg,png,jpg,gif,svg',
        //     ]);
    
                // $imgname = $request->kk->getClientOriginalName();
                // $request->kk->move(public_path('image'),$imgname);

                // $imgname1 = $request->akte->getClientOriginalName();
                // $request->akte->move(public_path('image'),$imgname1);

                // $imgname2 = $request->skhun->getClientOriginalName();
                // $request->skhun->move(public_path('image'),$imgname2);

                // $imgname3 = $request->ijazah->getClientOriginalName();
                // $request->ijazah->move(public_path('image'),$imgname3);

                // $document = new Document();
                
                // $document ->update([
                //     'nisn' => $request->nisn,
                //     'kk' => $imgname,
                //     'akte' => $imgname1,
                //     'skhun' => $imgname2,
                //     'ijazah' => $imgname3,
                // ]);

            
            // $id->update([
            //     'nisn' => $id->nisn,
            //     'kk' =>$imgname, 
            //     'akte'=> $imgname1,
            //     'skhun' => $imgname2,
            //     'ijazah' => $imgname2
            // ]);

            return redirect()->route('user.document');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Document::destroy($id);
        if(Auth::user()->is_admin == 1)
        {
            return redirect('/user/create');
        }
        return redirect('/user/document');
    }
}
