@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-4">
    <h3>Penjadwalan</h3>
  </div>
  <div class="col-lg-4">
    <h3>{{$jadwal->tanaman->title}}</h3>
  </div>
  <div class="col-lg-4 text-right">
    <a href="{{route('dashboard-penjadwalan')}}" class="btn btn-outline-secondary btn-md"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
  </div>
</div><hr>

<div class="row mt-2">
  <div class="col-lg-6">
    <a class="btn btn-outline-primary w-100" data-toggle="collapse" href="#buruk" role="button">Hal Buruk ?</a>
  </div>
  
  <div class="col-lg-6">
    <a class="btn btn-outline-primary w-100" data-toggle="collapse" href="#baik" role="button">Hal Baik ?</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 mb-3">
    <div class="collapse multi-collapse" id="buruk">
      <div class="card card-body">
        Semoga hal buruk yang menimpa tanaman {{$jadwal->tanaman->title}} Anda cepat terselesaikan, 
        jika penjadwalan Anda terganggu, anda bisa menambah hari agar penjadwalan anda tetap terjaga
         <form action="{{route('dashboard-penjadwalan-update', $jadwal->id)}}" method="POST">
          {{ csrf_field() }}
          <div class="input-group mt-2">
            <input name="plus_date" type="number" class="form-control" value="{{$jadwal->plus_date}}">
            <div class="input-group-append">
              <span class="input-group-text">hari</span>
              <button class="btn btn-outline-primary" type="submit">Submit</button>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-3">
    <div class="collapse multi-collapse" id="baik">
      <div class="card card-body">
        Waw tanaman {{$jadwal->tanaman->title}} Anda sudah terawat dengan baik 
        jika penjadwalan Anda ingin dipercepat, anda bisa mengurangi hari agar penjadwalan anda tetap terjaga
         <form action="{{route('dashboard-penjadwalan-update', $jadwal->id)}}" method="POST">
          {{ csrf_field() }}
          <div class="input-group mt-2">
            <input name="minus_date" type="number" class="form-control" value="{{$jadwal->minus_date}}">
            <div class="input-group-append">
              <span class="input-group-text">hari</span>
              <button class="btn btn-outline-primary" type="submit">Submit</button>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-header">
    <div class="row">
      <div class="col-lg-6">
        {{$jadwal->tanaman->title}} 
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6 text-left">
        <h6 class="card-title">Tanggal Awal</h6>
      </div>
      <div class="col-lg-6 text-right">
        <h6 class="card-title">Tanggal Akhir</h6>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-2 text-left">
        <p class="card-text">{{Carbon\Carbon::parse($jadwal->start_date)->format('j F Y')}}</p>
      </div>
      <div class="col-lg-8 text-center">
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="col-lg-2 text-right">
        <p class="card-text">{{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->tanaman->pemeliharaan)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F Y') }}</p>
      </div>
    </div>

    <div class="row mt-2">
      <div class="col-lg-4">
        <div class="card p-2 font-weight-bold">
          {{ Carbon\Carbon::parse($jadwal->start_date)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F') }} 
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card p-2 font-weight-bold">
          Semai
        </div>
      </div>
    </div>

    <div class="row mt-2">
      <div class="col-lg-4">
        <div class="card p-2 font-weight-bold">
          {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F') }}  
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card p-2 font-weight-bold">
          Pindah Tanam
        </div>
      </div>
    </div>

    <div class="row mt-2">
      <div class="col-lg-4">
        <div class="card p-2 font-weight-bold">
          {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->tanaman->pemeliharaan)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F') }}
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card p-2 font-weight-bold">
          Pemeliharaan
        </div>
      </div>
    </div>


  </div>
</div>

<!-- Modal hapus penjadwalan -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2>Yakin ingin di hapus ?</h2>
        <div class="row">
          <div class="col-lg-6 text-left">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          <div class="col-lg-6 text-right">
            <a href="{{route('dashboard-penjadwalan-hapus',$jadwal->id)}}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection