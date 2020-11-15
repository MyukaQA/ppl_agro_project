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

    
    public function kendala(){
        return view('dashboard.kendala');
    }
    
    public function hasil(){
        return view('dashboard.hasil');
    }
    
    public function landing(){
        $data = \App\Tanaman::all();
        return view('landing.index', ['data' => $data]);
    }
    
    
}
