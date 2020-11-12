<?php

namespace App\Http\Controllers;

use App\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(){
        
        return view('dashboard.index');
    }

    public function tanaman(){
        $data = \App\Tanaman::all();
        return view('dashboard.tanaman', ['data' => $data]);
    }

    public function kendala(){
        return view('dashboard.kendala');
    }

    public function penjadwalan(){
        return view('dashboard.penjadwalan');
    }

    public function hasil(){
        return view('dashboard.hasil');
    }

    public function landing(){
        $data = \App\Tanaman::all();
        return view('landing.index', ['data' => $data]);
    }

    public function create(Request $request){
        $dataTanaman = New Tanaman;
        $dataTanaman->title = $request->title;
        $dataTanaman->slug = Str::slug($request->title);
        $dataTanaman->content = $request->content;

        $dataTanaman->save();

        return redirect('dashboard');
        
    }
}
