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
      <label>Tanaman</label>
      <input name="title" type="text" class="form-control" placeholder="Nama Tanaman" value="{{$tanaman->title}}">
    </div>

    <div class="form-group">
      <label>Images</label>
      <img class="img-thumbnail w-50" src="{{$tanaman->getImages()}}" alt="">
      <input name="oldimg" type="text" class="form-control d-none" placeholder="Nama Tanaman" value="{{$tanaman->images}}">
      <input name="images" type="file" class="form-control-file" placeholder="Nama Tanaman">
    </div>
    
    <div class="form-group">
      <label>Nutrisi</label>
      <input name="tds_nutrisi" type="number" class="form-control" placeholder="Nutrisi Tanaman" value="{{$tanaman->tds_nutrisi}}">
    </div>

    <div class="form-group">
      <label>Ph</label>
      <input name="ph" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->ph}}">
    </div>

    <div class="form-group">
      <label>Semai</label>
      <input name="semai" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->semai}}">
    </div>

    <div class="form-group">
      <label>Pindah Tanam</label>
      <input name="pindah_tanam" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->pindah_tanam}}">
    </div>

    <div class="form-group">
      <label>Pemeliharaan</label>
      <input name="pemeliharaan" type="number" class="form-control" placeholder="Ph Tanaman" value="{{$tanaman->pemeliharaan}}">
    </div>

    <div class="form-group">
      <label>konten</label>
      <textarea name="content" class="form-control" id="" cols="20" rows="5" placeholder="Deskripsi Tanaman">{{$tanaman->content}}</textarea>
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
      
@endsection