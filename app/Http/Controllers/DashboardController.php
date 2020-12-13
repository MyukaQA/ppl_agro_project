<?php

namespace App\Http\Controllers;

use App\Tanaman;
use App\Kendala;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class DashboardController extends Controller
{
    public function index(){
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'users')->get();
        return view('dashboard.index', compact('admins', 'users'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        User::create([
            'role' => "admin",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        toast('berhasil', 'success')->autoClose(3000);
        return redirect()->back();
    }
    
    public function landing(){
        $data = \App\Tanaman::all();
        return view('landing.index', ['data' => $data]);
    }
    
}
