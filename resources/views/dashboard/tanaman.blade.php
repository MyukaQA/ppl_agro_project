@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-6">
    <h3>Tanaman</h3>
  </div>
  @if (auth()->user()->role == 'admin')
    <div class="col-lg-6 text-right">
      <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal">Tambah Data Tanaman</button>
    </div>
  @endif
</div><hr>
<div class="row">
  <div class="col-lg-12 mx-auto">
    <div class="table-responsive">
      <table id="example" style="width:100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Tanaman</th>
            <th>Nutrisi</th>
            <th>ph</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $tanaman)
            <tr>
              <td>{{$tanaman->title}}</td>
              <td>{{$tanaman->tds_nutrisi}}</td>
              <td>{{$tanaman->ph}}</td>
              <td>{{$tanaman->content}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tanaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/dashboard/create" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Tanaman</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Tanaman">
          </div>
          
          <div class="form-group">
            <label>Nutrisi</label>
            <input name="tds_nutrisi" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nutrisi Tanaman">
          </div>

          <div class="form-group">
            <label>Ph</label>
            <input name="ph" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ph Tanaman">
          </div>

          <div class="form-group">
            <label>konten</label>
            <textarea name="content" class="form-control" id="" cols="20" rows="5" placeholder="Deskripsi Tanaman"></textarea>
          </div>
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection