<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Forum;
use App\Komentar;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = Forum::orderBy('created_at', 'desc')->paginate(2);
        return view('forum.index', compact('forum'));
    }

    public function detail(Forum $forum)
    {
        return view('forum.detail', compact('forum'));
    }

    public function postKomentar(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());
    


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
        // $request->request->add(['slug' => Str::slug($request->judul)]);
        // $request->request->add(['user_id' => auth()->user()->id]);
        // $forum = Forum::create($request->all());
        $forum = new Forum;
        $forum->user_id = auth()->user()->id;
        $forum->judul = $request->judul;
        $forum->slug = Str::slug($request->judul);
        $forum->konten = $request->konten;

        if($request->hasFile('images')){
            $request->file('images')->move('images/forum/', $request->file('images')->getClientOriginalName());
            $forum->images = $request->file('images')->getClientOriginalName();
        }
        $forum->save();

        return redirect()->back();
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
