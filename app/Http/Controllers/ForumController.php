<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Forum;
use App\Komentar;
use Illuminate\Http\Request;
use File;
use Validator;
use Alert;
use App\Kategori;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = Forum::all();
        $kategoris = Kategori::all();
        return view('forum.index', compact('forum', 'kategoris'));
    }

    public function listforum(){
        $forum = Forum::all();
        $kategoris = Kategori::all();
        return view('forum.list', compact('forum', 'kategoris'));
    }

    public function chooseMarketing()
    {
        $forums = Forum::all();
        $forum = Forum::where('kategori_id', 1)->get();
        $kategoris = Kategori::all();
        return view('forum.index', compact('forum', 'kategoris'));
    }

    public function chooseTanaman()
    {
        $forum = Forum::where('kategori_id', 2)->get();
        $kategoris = Kategori::all();
        return view('forum.index', compact('forum', 'kategoris'));
    }

    public function chooseHama()
    {
        $forum = Forum::where('kategori_id', 3)->get();
        $kategoris = Kategori::all();
        return view('forum.index', compact('forum', 'kategoris'));
    }

    public function detail(Forum $forum)
    {
        return view('forum.detail', compact('forum'));
    }

    public function postKomentar(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'konten' => 'required|min:2' 
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());
    

        // \Session::flash('success', 'Berhasil Ditambah');
        // return redirect()->back();
        toast('Berhasil Ditambahkan','success')->autoClose(3000);
        return redirect()->back();
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
        $validator = Validator::make($request->all(),[
            'judul' => 'required|min:7',
            'konten' => 'required|min:14'
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        $forum = new Forum;
        $forum->user_id = auth()->user()->id;
        $forum->kategori_id = $request->kategori;
        $forum->judul = $request->judul;
        $forum->slug = Str::slug($request->judul);
        $forum->konten = $request->konten;

        if($request->hasFile('images')){
            $request->file('images')->move('images/forum/', $request->file('images')->getClientOriginalName());
            $forum->images = $request->file('images')->getClientOriginalName();
        }
        $forum->save();

        // $forum->kategoris()->sync($request->kategori);

        toast('Forum Berhasil Ditambahkan','success')->autoClose(3000);
        return redirect()->back();
    }

    public function hapusforum($id){
        $forum = Forum::find($id);
        $forum->delete($forum);
        File::delete('images/forum/'.$forum->images);

        return redirect('dashboard/forum');
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
