<?php

namespace App\Http\Controllers;

use App\Penjadwalan;
use App\Tanaman;
use Illuminate\Http\Request;

use Carbon\Carbon;

class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jadwal = Penjadwalan::all();
        // $events = [];
        // foreach ($jadwal as $key => $jdwl){
        //     $events[] = \Calendar::event(
        //         $jdwl->title,
        //         true,
        //         new \DateTime($jdwl->start_date),
        //         new \DateTime($jdwl->end_date.'+1 day')
        //     );
        // }
        // $calendar_details = \Calendar::addEvents($events);

        
        $event = Penjadwalan::all();
        $tanaman = Tanaman::all();
        // return response()->json($event);
        // return response()->json([
        //     'html, css' => view('dashboard.penjadwalan', compact('event'))->render(),
        // ]);
        // return view('dashboard.penjadwalan', compact('event'));
        return response()->view('dashboard.penjadwalan', compact('event', 'tanaman'));
    }
    
    // public function list(){
    //     return response()->json($event, 200);
    // }

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
        // $jadwal = new Penjadwalan;
        // $jadwal->title = $request->title;
        // $jadwal->start_date = $request->start_date;
        // $jadwal->end_date = $request->end_date;
        // $jadwal->save();
        // $tanaman = \App\Tanaman::where('ph', $request->title)->get();
        $jadwal = new Penjadwalan;
        // $jadwal->title = $request->title;
        if($request->title == 1){
            $h = 3;
        }else{
            $h = 1;
        }

        $dateNow = Carbon::now();

        $jadwal->tanaman_id = $request->title;
        $jadwal->start_date = Carbon::now();
        $jadwal->end_date = $dateNow;
        $jadwal->save();
        // $request->request->add(['tanaman_id' => $tanaman]);
        // $request->request->add(['start_date' => "2020-24-12"]);
        // Penjadwalan::create($request->all());

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
