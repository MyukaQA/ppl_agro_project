<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Pengajuan;

class PengajuanController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengajuan()
    {
        //        
        $pengajuan = Pengajuan::all();
        $ajuan = Pengajuan::where('user_id', Auth::user()->id)->get();         

        return view('dashboard.datapengajuan', compact('pengajuan', 'ajuan'));
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
        $validator = Validator::make($request->all(),[
            'judul' => 'required|min:7',
            'deskripsi' => 'required|min:10',
            'solusi' => 'required|min:10'
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        $pengajuan = new Pengajuan;
        $pengajuan->user_id = auth()->user()->id;
        $pengajuan->judul = $request->judul;
        $pengajuan->deskripsi = $request->deskripsi;
        $pengajuan->solusi = $request->solusi;

        $pengajuan->save();

        toast('pengajuan Berhasil Ditambahkan','success')->autoClose(3000);
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

    public function status($id){
        $pengajuan = Pengajuan::find($id);
        
        $status_sekarang = $pengajuan->status;
 
        if($status_sekarang == 1){
            Pengajuan::find($id)->update([
                'status'=>0
            ]);
        }else{
            Pengajuan::find($id)->update([
                'status'=>1
            ]);
        }
        toast('Berhasil Diupdate','success')->autoClose(3000);
 
        return redirect('dashboard/kendala');
    }


}
