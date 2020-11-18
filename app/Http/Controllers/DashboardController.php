<?php

namespace App\Http\Controllers;

use App\Tanaman;
use App\Kendala;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
    
    public function landing(){
        $data = \App\Tanaman::all();
        return view('landing.index', ['data' => $data]);
    }
    
}
