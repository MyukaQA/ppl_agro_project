@extends('dashboard.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/tanaman.css')}}">
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

@if (auth()->user()->role == 'admin')
<div class="row">
  <div class="col-lg-12 mx-auto">
    <div class="table-responsive">
      <table id="example" style="width:100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Tanaman</th>
            <th>images</th>
            <th>Nutrisi</th>
            <th>ph</th>
            <th>Semai</th>
            <th>Pindah Tanam</th>
            <th>Pemeliharaan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $tanaman)
            <tr>
              <td><a class="text-dark" href="{{route('dashboard-tanaman-detail', $tanaman->id)}}">{{$tanaman->title}}</a></td>
              <td class="w-25 text-center"><img class="img-thumbnail w-50" src="{{$tanaman->getImages()}}" alt=""></td>
              <td>{{$tanaman->tds_nutrisi}}</td>
              <td>{{$tanaman->ph}}</td>
              <td>{{$tanaman->semai}} Hari</td>
              <td>{{$tanaman->pindah_tanam}} Hari</td>
              <td>{{$tanaman->pemeliharaan}} Hari</td>
              <td>{!!$tanaman->content!!}</td>
              <td>
                <a href="{{route('edit-tanaman', $tanaman->id)}}" class="btn btn-warning"> Edit</a>
                <a href="{{route('hapus-tanaman', $tanaman->id)}}" class="btn btn-danger"> Hapus</a>
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
    <div class="row">
      @foreach ($data as $tanaman)          
        <!--Profile Card 5-->
        <div class="col-md-4 mb-4">
          <div class="card profile-card-5">
            <div class="card-img-block">
                <img class="card-img-top" src="{{$tanaman->getImages()}}" alt="Card image cap">
            </div>
            <div class="card-body pt-0">
              <h5 class="card-title">{{$tanaman->title}}</h5>
              <p class="card-text">{{$tanaman->content}}</p>
              <a href="{{route('dashboard-tanaman-detail', $tanaman->id)}}" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>
  {{-- </div> --}}
</section>

@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tanaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('create-tanaman')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          <div class="form-group">
            <label>Images</label>
            <input name="images" type="file" class="form-control-file" aria-describedby="emailHelp" placeholder="Nama Tanaman">
          </div>

          <div class="form-row">
            <div class="form-group col-lg-6">
              <label>Tanaman</label>
              <input name="title" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Tanaman">
            </div>

            <div class="form-group col-lg-6">
              <label>Nutrisi</label>
              <input name="tds_nutrisi" type="number" class="form-control" aria-describedby="emailHelp" placeholder="Nutrisi Tanaman">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-lg-6">
              <label>Ph</label>
              <input name="ph" type="number" class="form-control" aria-describedby="emailHelp" placeholder="Ph Tanaman">
            </div>

            <div class="form-group col-lg-6">
              <label>Semai</label>
              <input name="semai" type="number" class="form-control" aria-describedby="emailHelp" placeholder="Hari Semai">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-lg-6">
              <label>Pindah Tanam</label>
              <input name="pindah_tanam" type="number" class="form-control" aria-describedby="emailHelp" placeholder="Hari Pindah Tanam">
            </div>

            <div class="form-group col-lg-6">
              <label>Pemeliharaan</label>
              <input name="pemeliharaan" type="number" class="form-control" aria-describedby="emailHelp" placeholder="Hari Pemeliharaan">
            </div>
          </div>
        
          <div class="form-group">
            <label>konten</label>
            <textarea name="content" id="editor" class="form-control" id="" cols="20" rows="5" placeholder="Deskripsi Tanaman"></textarea>
          </div>
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection