@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<!-- Tabel Data Pengajuan Kendala -->
<div class="row">
  <div class="col-lg-6">
    <h3>Data Pengajuan Kendala</h3>
  </div>
</div><hr>
<div class="row">
  <div class="col-lg-12 mx-auto">
    <div class="table-responsive">
      <table id="example1" style="width:100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Judul</th>            
            <th>Deskripsi</th>
            <th>Solusi</th>
            <th>User</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pengajuan as $pgj)          
            <tr>
              <td>{{$pgj->judul}}</td>          
              <td>{{$pgj->deskripsi}}</td>        
              <td>{{$pgj->solusi}}</td>
              <td>{{$pgj->user->name}}</td>      
              <td>?????</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection