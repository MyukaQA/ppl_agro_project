<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanaman;
use Illuminate\Support\Str;
use File;
use Validator;
 
class TanamanController extends Controller
{
    public function tanaman(){
        $data = \App\Tanaman::all();
        return view('dashboard.tanaman', ['data' => $data]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:7|max:191', 
            'content' => 'required|min:14|max:191',
            'tds_nutrisi' => 'required|numeric|min:0|max:31',
            'ph' => 'required|numeric|min:0|max:31',
            'semai' => 'required|numeric|min:0|max:31',
            'pindah_tanam' => 'required|numeric|min:0|max:31',
            'pemeliharaan' => 'required|numeric|min:0|max:31'
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        $dataTanaman = New Tanaman;
        $dataTanaman->title = $request->title;
        $dataTanaman->slug = Str::slug($request->title);
        $dataTanaman->content = $request->content;
        $dataTanaman->tds_nutrisi = $request->tds_nutrisi;
        $dataTanaman->ph = $request->ph;
        $dataTanaman->semai = $request->semai;
        $dataTanaman->pindah_tanam = $request->pindah_tanam;
        $dataTanaman->pemeliharaan = $request->pemeliharaan;
        $dataTanaman->panen = 1;

        if($request->hasFile('images')){
            $request->file('images')->move('images/tanaman/', $request->file('images')->getClientOriginalName());
            $dataTanaman->images = $request->file('images')->getClientOriginalName();
        }

        $dataTanaman->save();

        toast('Berhasil Ditambahkan','success')->autoClose(3000);
        return redirect('dashboard/tanaman');
        
    } 

    public function edittanaman($id){
        $tanaman = Tanaman::find($id);

        return view('dashboard.tanamanedit', compact('tanaman'));
    }

    public function updatetanaman(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:7|max:191', 
            'content' => 'required|min:14|max:191',
            'tds_nutrisi' => 'required|numeric|min:0|max:31',
            'ph' => 'required|numeric|min:0|max:31',
            'semai' => 'required|numeric|min:0|max:31',
            'pindah_tanam' => 'required|numeric|min:0|max:31',
            'pemeliharaan' => 'required|numeric|min:0|max:31'
        ]);

        if ($validator->fails()){
            toast($validator->messages()->all()[0],'error')->autoClose(3000);
            return back();
        }

        $tanaman = Tanaman::find($id);
        $request->request->add(['panen' => 1]);
        $tanaman->update($request->all());
        
        if($request->hasFile('images')){
            $request->file('images')->move('images/tanaman/', $request->file('images')->getClientOriginalName());
            $tanaman->images = $request->file('images')->getClientOriginalName();
            File::delete('images/tanaman/'.$request->oldimg);
            $tanaman->save();
        }

        toast('Berhasil Diupdate','success')->autoClose(3000);
        return redirect('dashboard/tanaman');
    }

    public function detailtanaman(Tanaman $tanaman){
        return view('dashboard.tanamandetails', compact('tanaman'));
    }

    public function hapustanaman($id){
        $tanaman = Tanaman::find($id);
        $tanaman->delete($tanaman);
        File::delete('images/tanaman/'.$tanaman->images);

        toast('Berhasil Dihapus', 'success')->autoClose(3000);
        return redirect('dashboard/tanaman');
    }
}
