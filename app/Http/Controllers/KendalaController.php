<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kendala;
use Illuminate\Support\Str;

class KendalaController extends Controller
{
    //
    public function kendala(){
        $data = \App\Kendala::all();
        return view('dashboard.kendala', ['data' => $data]);
    }

    public function hasil(){
        $data = \App\Kendala::all();
        return view('dashboard.hasil', ['data' => $data]);
    }

    // public function cek(Request $request){
    //     $kendala = New Kendala;
    //     $kendala->ciri2 = $request->daun;
    //     $kendala->penanganan = $request->penanganan;
    // }

    public function create(Request $request){
        $kendala = New Kendala;
        $kendala->ciri2 = $request->ciri2;
        $kendala->penanganan = $request->penanganan;

        $kendala->save();

        return redirect('dashboard/kendala');
        
    }

    public function editkendala($id){
        $kendala = Kendala::find($id);

        return view('dashboard.kendalaedit', compact('kendala'));
    }

    public function updatekendala(Request $request, $id){
        $kendala = Kendala::find($id);
        $kendala->update($request->all());
        
        return redirect('dashboard/kendala');
    }

    public function hapuskendala($id){
        $kendala = Kendala::find($id);
        $kendala->delete($kendala);

        return redirect('dashboard/kendala');
    }
}
