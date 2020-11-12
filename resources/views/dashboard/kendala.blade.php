@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<h3>Data Kendala</h3><hr>
<div class="card">
    <div class="card-header bg-primary text-white">Form Checkbox</div>
    <div class="card-body">
      <form action="{{route('dashboard-hasil')}}">
        <h4>Apakah tanaman anda sering mati?</h4>
        <hr/>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" value="">Ya
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" value="">Tidak
          </label>
        </div>
        <hr/>
        <a>
            <button type="submit" class="btn btn-primary">Cek</button>
        </a>
        
      </form>
    </div>
  </div>
@endsection