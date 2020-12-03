<?php

namespace App\Http\Controllers;

use App\Penjadwalan;
use App\Tanaman;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventAll = Penjadwalan::all();
        $event = Penjadwalan::where('user_id', Auth::user()->id)->get(); 
        $tanaman = Tanaman::all();

        return response()->view('dashboard.penjadwalan', compact('eventAll', 'event', 'tanaman'));
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


        $jadwal = new Penjadwalan;
        $jadwal->user_id = Auth::user()->id; 
        $jadwal->tanaman_id = $request->title;
        $jadwal->start_date = Carbon::now();

        $jadwal->save();

        toast('Berhasil Ditambahkan','success')->autoClose(3000);
        return redirect('/dashboard/penjadwalan/'); 
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
        $jadwal = Penjadwalan::find($id);

        return view('dashboard.penjadwalanedit', compact('jadwal'));
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
        $jadwal = Penjadwalan::find($id);
        $jadwal->update($request->all());

        toast('Berhasil di update', 'success')->autoClose(3000);
        return redirect('dashboard/penjadwalan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Penjadwalan::find($id);
        $jadwal->delete($jadwal);

        toast('Berhasil Dihapus','success')->autoClose(3000);
        return redirect()->back();
    }
}
