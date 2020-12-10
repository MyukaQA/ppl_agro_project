<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kendala;
use App\ValidasiKendala;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
class KendalaController extends Controller
{
    //
    public function kendala(){
        $data = \App\Kendala::all();
        return view('dashboard.kendala', ['data' => $data]);
    }

    public function validasi(Request $request){
        // $data = \App\Kendala::all();
        // return view('dashboard.hasil', ['data' => $data]);
        $validator = Validator::make($request->all(),[
            'daun' => 'required',
            'lumut' => 'required',
            'air' => 'required'
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        $validasi = new ValidasiKendala;
        $validasi->daun = $request->daun;
        $validasi->lumut = $request->lumut;
        $validasi->air = $request->air;

        $validasi->save();

        // all
        if ($request->daun == 'daunYes' && $request->lumut == 'lumutYes' && $request->air == 'airYes'){
            $data = Kendala::all();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Berhasil Muncul', 'success')->autoClose(3000);
        }
        // all

        // Fokus Daun
        elseif ($request->daun == 'daunYes' && $request->lumut == 'lumutNo' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'daun')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Daun Berhasil Muncul', 'success')->autoClose(3000);
        }
        elseif ($request->daun == 'daunYes' && $request->lumut == 'lumutYes' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'lumut')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Daun dan Lumut Berhasil Muncul', 'success')->autoClose(3000);
        }
        elseif ($request->daun == 'daunYes' && $request->lumut == 'lumutNo' && $request->air == 'airYes'){
            $data = Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'air')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Daun dan Air Berhasil Muncul', 'success')->autoClose(3000);
        }
        // Fokus Daun

        // Fokus Lumut
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutYes' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'lumut')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Lumut Berhasil Muncul', 'success')->autoClose(3000);
        }
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutYes' && $request->air == 'airYes'){
            $data = Kendala::where('ciri2', 'lumut')->orWhere('ciri2', 'air')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Lumut dan Air Berhasil Muncul', 'success')->autoClose(3000);
        }
        // Fokus Lumut

        // Fokus Air
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutNo' && $request->air == 'airYes'){
            $data = Kendala::where('ciri2', 'air')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Penanganan Air Berhasil Muncul', 'success')->autoClose(3000);
        }
        // Fokus Air

        // Fokus Air
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutNo' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'no')->get();
            DB::table('validasi_kendala')->truncate();
            toast('Mohon Maaf Penanganan Tidak Ada', 'warning')->autoClose(3000);
        }
        // Fokus Air

        
        return view('dashboard/hasil', compact('data'));
    }

    // public function hasil(){
    //     $semua = ValidasiKendala::
    //     where('daun', 'daunYes')
    //     ->orWhere('lumut', 'lumutYes')
    //     ->orWhere('air', 'airYes')
    //     ->get(); 

    //     $daunaja = ValidasiKendala::
    //     where('daun', 'daunYes')
    //     ->orWhere('lumut', 'lumutNo')
    //     ->orWhere('air', 'airNo')
    //     ->get();

    //     if ($semua){
    //         $data = Kendala::all();
    //         DB::table('validasi_kendala')->truncate();
            
    //     }elseif ($daunaja){
    //         $data = Kendala::where('ciri2', 'daun')->get();
    //         // DB::table('validasi_kendala')->truncate();

    //     }
    //     // elseif (\App\ValidasiKendala::where([
    //     //     ['daun', 'daunYes'],
    //     //     ['lumut', 'lumutYes'],
    //     //     ['air', 'airNo']
    //     // ])->get()){
    //     //     $data = \App\Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'lumut')->get();
    //     //     // DB::table('validasi_kendala')->truncate();
        
    //     // }elseif (\App\ValidasiKendala::where([
    //     //     ['daun', 'daunYes'],
    //     //     ['lumut', 'lumutNo'],
    //     //     ['air', 'airYes']
    //     // ])->get()){
    //     //     $data = \App\Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'air')->get();
    //     //     // DB::table('validasi_kendala')->truncate();
        
    //     // }elseif (\App\ValidasiKendala::where([
    //     //     ['daun', 'daunNo'],
    //     //     ['lumut', 'lumutYes'],
    //     //     ['air', 'airNo']
    //     // ])->get()){
    //     //     $data = \App\Kendala::where('ciri2', 'lumut')->get();
    //     //     // DB::table('validasi_kendala')->truncate();
        
    //     // }
    //     // // if (\App\ValidasiKendala::where([
    //     // //     ['daun', 'daunYes'],
    //     // //     ['lumut', 'lumutYes'],
    //     // //     ['air', 'airNo']
    //     // // ])->get()){
    //     // //     $data = \App\Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'lumut')->get();
    //     // //     // DB::table('validasi_kendala')->truncate();
        
    //     // // }
    //     // elseif (\App\ValidasiKendala::where([
    //     //     ['daun', 'daunNo'],
    //     //     ['lumut', 'lumutYes'],
    //     //     ['air', 'airYes']
    //     // ])->get()){
    //     //     $data = \App\Kendala::where('ciri2', 'lumut')->orWhere('ciri2', 'air')->get();
    //     //     // DB::table('validasi_kendala')->truncate();
        
    //     // }elseif (\App\ValidasiKendala::where([
    //     //     ['daun', 'daunNo'],
    //     //     ['lumut', 'lumutNo'],
    //     //     ['air', 'airYes']
    //     // ])->get()){
    //     //     $data = \App\Kendala::where('ciri2', 'air')->get();
    //     //     // DB::table('validasi_kendala')->truncate();
        
    //     // }


    //     return view('dashboard/hasil', compact('data'));
    // }

    public function back(){
        
        // DB::table('validasi_kendala')->delete();
        return view('dashboard/kendala');
    }

    // public function cek(Request $request){
    //     $kendala = New Kendala;
    //     $kendala->ciri2 = $request->daun;
    //     $kendala->penanganan = $request->penanganan;
    // } 

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'ciri2' => 'required|min:7',
            'penanganan' => 'required|min:14'            
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }
        
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
                
        toast('Berhasil Diupdate','success')->autoClose(3000);
        return redirect('dashboard/kendala');
    }

    public function hapuskendala($id){
        $kendala = Kendala::find($id);
        $kendala->delete($kendala);

        return redirect('dashboard/kendala');
    }
}
