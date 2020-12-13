@extends('dashboard.app')
@section('content')
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

<div class="row">
  <div class="col-lg-4">
    <img class="img-fluid rounded" src="{{$tanaman->getImages()}}" alt="">
  </div>
  <div class="col-lg-8">
    <h1>{{$tanaman->title}}</h1>
    <p>{!!$tanaman->content!!}</p>
  </div>
</div>
@endsection