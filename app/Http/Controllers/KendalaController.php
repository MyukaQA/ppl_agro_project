<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kendala;
use App\ValidasiKendala;
use App\Pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
class KendalaController extends Controller
{
    //
    public function kendala(){
        $data = \App\Kendala::all();
        $pengajuan = \App\Pengajuan::all();
        return view('dashboard.kendala', compact('data', 'pengajuan'));
    }

    public function validasi(Request $request){
        $validator = Validator::make($request->all(),[
            'daun' => 'required',
            'lumut' => 'required',
            'air' => 'required'
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        // all
        if ($request->daun == 'daunYes' && $request->lumut == 'lumutYes' && $request->air == 'airYes'){
            $data = Kendala::all();
            toast('Penanganan Berhasil Muncul', 'success')->autoClose(3000);
        }
        // all

        // Fokus Daun
        elseif ($request->daun == 'daunYes' && $request->lumut == 'lumutNo' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'daun')->get();
            toast('Penanganan Daun Berhasil Muncul', 'success')->autoClose(3000);
        }
        elseif ($request->daun == 'daunYes' && $request->lumut == 'lumutYes' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'lumut')->get();
            toast('Penanganan Daun dan Lumut Berhasil Muncul', 'success')->autoClose(3000);
        }
        elseif ($request->daun == 'daunYes' && $request->lumut == 'lumutNo' && $request->air == 'airYes'){
            $data = Kendala::where('ciri2', 'daun')->orWhere('ciri2', 'air')->get();
            toast('Penanganan Daun dan Air Berhasil Muncul', 'success')->autoClose(3000);
        }
        // Fokus Daun

        // Fokus Lumut
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutYes' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'lumut')->get();
            toast('Penanganan Lumut Berhasil Muncul', 'success')->autoClose(3000);
        }
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutYes' && $request->air == 'airYes'){
            $data = Kendala::where('ciri2', 'lumut')->orWhere('ciri2', 'air')->get();
            toast('Penanganan Lumut dan Air Berhasil Muncul', 'success')->autoClose(3000);
        }
        // Fokus Lumut

        // Fokus Air
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutNo' && $request->air == 'airYes'){
            $data = Kendala::where('ciri2', 'air')->get();
            toast('Penanganan Air Berhasil Muncul', 'success')->autoClose(3000);
        }
        // Fokus Air

        // Fokus Air
        elseif ($request->daun == 'daunNo' && $request->lumut == 'lumutNo' && $request->air == 'airNo'){
            $data = Kendala::where('ciri2', 'no')->get();
            toast('Mohon Maaf Penanganan Tidak Ada', 'warning')->autoClose(3000);
        }
        // Fokus Air

        return view('dashboard/hasil', compact('data'));
    }

    public function back(){
        return view('dashboard/kendala');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'ciri2' => 'required|min:3',
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
        $validator = Validator::make($request->all(),[
            'ciri2' => 'required|min:3',
            'penanganan' => 'required|min:14'            
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }
        
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
