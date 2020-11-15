<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanaman;
use Illuminate\Support\Str;
use File;

class TanamanController extends Controller
{
    public function tanaman(){
        $data = \App\Tanaman::all();
        return view('dashboard.tanaman', ['data' => $data]);
    }

    public function create(Request $request){
        $dataTanaman = New Tanaman;
        $dataTanaman->title = $request->title;
        $dataTanaman->slug = Str::slug($request->title);
        $dataTanaman->content = $request->content;
        $dataTanaman->tds_nutrisi = $request->tds_nutrisi;
        $dataTanaman->ph = $request->ph;

        if($request->hasFile('images')){
            $request->file('images')->move('images/tanaman/', $request->file('images')->getClientOriginalName());
            $dataTanaman->images = $request->file('images')->getClientOriginalName();
        }

        $dataTanaman->save();

        return redirect('dashboard/tanaman');
        
    }

    public function edittanaman($id){
        $tanaman = Tanaman::find($id);

        return view('dashboard.tanamanedit', compact('tanaman'));
    }

    public function updatetanaman(Request $request, $id){
        $tanaman = Tanaman::find($id);
        $tanaman->update($request->all());
        if($request->hasFile('images')){
            $request->file('images')->move('images/tanaman/', $request->file('images')->getClientOriginalName());
            $tanaman->images = $request->file('images')->getClientOriginalName();
            File::delete('images/tanaman/'.$request->oldimg);
            $tanaman->save();
        }
        return redirect('dashboard/tanaman');
    }

    public function detailtanaman(Tanaman $tanaman){
        return view('dashboard.tanamandetails', compact('tanaman'));
    }

    public function hapustanaman($id){
        $tanaman = Tanaman::find($id);
        $tanaman->delete($tanaman);
        File::delete('images/tanaman/'.$tanaman->images);

        return redirect('dashboard/tanaman');
    }
}