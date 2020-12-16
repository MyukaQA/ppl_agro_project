@extends('dashboard.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/tanaman.css')}}">
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-6">
    <h3>Data kendala</h3>
  </div>
  <div class="col-lg-6 text-right">
    <a class="btn btn-outline-secondary" href="{{route('dashboard-kendala')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
  </div>
</div><hr>

  <form action="{{route('update-kendala', $kendala->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Masalah</label>
      <input name="ciri2" type="text" class="form-control" placeholder="Masalah" value="{{$kendala->ciri2}}">
    </div>

    <div class="form-group">
      <label>Penanganan</label>
      <textarea name="penanganan" id="editor" class="form-control" id="" cols="20" rows="5" placeholder="Penanganan">{{$kendala->penanganan}}</textarea>
    </div>
  
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
      
@endsection