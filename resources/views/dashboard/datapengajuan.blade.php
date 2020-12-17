@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<!-- Tabel Data Pengajuan Kendala -->
<div class="row">
  <div class="col-lg-6">
    <h3>Data Pengajuan Kendala</h3>
  </div>
  <div class="col-lg-6 text-right">
    <a class="btn btn-outline-secondary" href="{{route('dashboard-kendala')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
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
            <th>Aksi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($ajuan as $pgj)          
            <tr>
              <td>{{$pgj->judul}}</td>          
              <td class="w-25">{{Str::limit($pgj->deskripsi, 50, '..')}}</td>        
              <td class="w-25">{{Str::limit($pgj->solusi, 50, '..')}}</td>
              <td>{{$pgj->user->name}}</td>      
              <td>
                <a href="{{route('forum-index-detail', $pgj->forum_id)}}" class="btn btn-outline-info btn-sm">Lihat Forum</a>
              </td>
              <td>
                <badge class="badge {{($pgj->status == 1 ) ? 'badge-success' : 'badge-danger' }}">
                  {{($pgj->status == 1 ) ? 'Diterima' : 'Tidak Diterima' }}
                </badge>
              </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection