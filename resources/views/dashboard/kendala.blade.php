@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-6">
    <h3>Data Kendala</h3>
  </div>
  @if (auth()->user()->role == 'admin')
    <div class="col-lg-6 text-right">
      <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal">Tambah Data Kendala</button>
    </div>
  @else
  <div class="col-lg-6 text-right">
    <a href="{{route('dashboard-data-pengajuan')}}"><button type="button" class="btn btn-primary btn-md">Data Pengajuan Kendala</button></a>
  </div>
  @endif
</div><hr>
@if (auth()->user()->role == 'admin')
<!-- Tabel Data Kendala -->
<div class="row">
  <div class="col-lg-12 mx-auto">
    <div class="table-responsive">
      <table id="example" style="width:100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Ciri-Ciri</th>
            <th>Penanganan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $kendala)
            <tr>
              <td>{{$kendala->ciri2}}</td>          
              <td>{!!$kendala->penanganan!!}</td>              
              <td>
                <a href="{{route('edit-kendala', $kendala->id)}}" class="btn btn-warning"> Edit</a>
                <a href="{{route('hapus-kendala', $kendala->id)}}" class="btn btn-danger"> Hapus</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<hr>
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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pengajuan as $pgj)          
            <tr>
              <td>{{$pgj->judul}}</td>          
              <td>{{$pgj->deskripsi}}</td>        
              <td>{{$pgj->solusi}}</td>
              <td>{{$pgj->user->name}}</td>
              <!-- <td>{{$pgj->status}}</td> -->
              <td>
                <badge class="badge {{($pgj->status == 1 ) ? 'badge-success' : 'badge-danger' }}">
                  {{($pgj->status == 1 ) ? 'Diterima' : 'Tidak Diterima' }}
                </badge>
              </td>      
              <td>
                <a href="{{route('status', $pgj->id)}}" class="btn btn-warning"> Terima</a>                
              </td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@else
<section>
{{-- <div class="container-fluid"> --}}
<div class="card">
    <div class="card-header bg-primary text-white">Form Checkbox</div>
    <div class="card-body">
      <form action="{{route('dashboard-kendala-hasil')}}" method="POST">
      {{ csrf_field() }}
        <h4>Apakah tanaman anda mengalami kerusakan daun ?</h4>
        <hr/>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="daun" value="daunYes">Ya
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="daun" value="daunNo">Tidak
          </label>
        </div>
        <hr/>
        <h4>Apakah di sekitar tanaman anda tumbuh lumut?</h4>
        <hr/>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="lumut" value="lumutYes">Ya
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="lumut" value="lumutNo">Tidak
          </label>
        </div>
        <hr>
        <h4>Apakah anda memiliki masalah tentang sumber air?</h4>
        <hr/>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="air" value="airYes">Ya
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="air" value="airNo">Tidak
          </label>
        </div>
        <hr>
        <a>
            <button type="submit" class="btn btn-primary">Cek</button>
        </a>        
      </form>
    </div>
  </div>
</div>
{{-- </div> --}}
</section>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Kendala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('create-kendala')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label>ciri-ciri</label>
            <input name="ciri2" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ciri-ciri">
          </div>

          <div class="form-group">
            <label>Penanganan</label>
            <textarea name="penanganan" id="editor" class="form-control" id="" cols="20" rows="5" placeholder="Penanganan"></textarea>
          </div>        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection