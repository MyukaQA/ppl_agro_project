@extends('dashboard.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/tanaman.css')}}">
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-6">
    <h3>Tanaman</h3>
  </div>
  <div class="col-lg-6 text-right">
    <a class="btn btn-outline-secondary" href="{{route('dashboard-tanaman')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
  </div>
</div><hr>

  <form action="{{route('update-tanaman', $tanaman->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      {{-- <label>Images</label> --}}
      <div class="mb-2">
        <a data-toggle="collapse" href="#gambar" role="button"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i></a>
      </div>
      <div class="collapse" id="gambar">
        <img class="img-thumbnail w-50 mb-2" src="{{$tanaman->getImages()}}" alt="">
        <input name="oldimg" type="text" class="form-control d-none" placeholder="Nama Tanaman" value="{{$tanaman->images}}">
        <input name="images" type="file" class="form-control-file" placeholder="Nama Tanaman">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-lg-6">
        <label>Tanaman</label>
        <input name="title" type="text" class="form-control" placeholder="Nama Tanaman" value="{{$tanaman->title}}">
      </div>
      
      <div class="form-group col-lg-6">
        <label>Nutrisi</label>
        <input name="tds_nutrisi" type="number" class="form-control" placeholder="Nutrisi Tanaman" value="{{$tanaman->tds_nutrisi}}">
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group col-lg-6">
        <label>Ph</label>
        <input name="ph" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->ph}}">
      </div>

      <div class="form-group col-lg-6">
        <label>Semai</label>
        <input name="semai" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->semai}}">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-lg-6">
        <label>Pindah Tanam</label>
        <input name="pindah_tanam" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->pindah_tanam}}">
      </div>
      
      <div class="form-group col-lg-6">
        <label>Pemeliharaan</label>
        <input name="pemeliharaan" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->pemeliharaan}}">
      </div>
    </div>

    <div class="form-group">
      <label>konten</label>
      <textarea name="content" id="editor" class="form-control" id="" cols="20" rows="5" placeholder="Deskripsi Tanaman">{{$tanaman->content}}</textarea>
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
      
@endsection