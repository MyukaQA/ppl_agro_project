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
  <div class="col-lg-7">
    <a class="btn btn-outline-primary w-100" data-toggle="collapse" href="#jadwal" role="button">Perubahan Jadwal</a>
  </div>

  <div class="col-lg-5">
    <a class="btn btn-outline-primary w-100" data-toggle="collapse" href="#catatan" role="button">Tambah Catatan</a>
  </div>

</div>
<div class="row">
  <div class="col-lg-7 mb-3">
    <div class="collapse multi-collapse" id="jadwal">
      <div class="card card-body">
        
        <form action="{{route('dashboard-penjadwalan-update', $jadwal->id)}}" method="POST">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-4">
              <label >Semai</label>
              <input name="plus_date_semai" type="number" class="form-control" value="{{$jadwal->plus_date_semai}}">
            </div>
            <div class="form-group col-md-4">
              <label >Pindah Tanam</label>
              <input name="plus_date_pindah_tanam" type="number" class="form-control" value="{{$jadwal->plus_date_pindah_tanam}}">
            </div>
            <div class="form-group col-md-4">
              <label >Penjadwalan</label>
              <input name="plus_date_penjadwalan" type="number" class="form-control" value="{{$jadwal->plus_date_penjadwalan}}">
            </div>
          </div>

          <button class="btn btn-outline-primary" type="submit">Tambah Jadwal</button>
        </form>

      </div>
    </div>
  </div>

  <div class="col-lg-5 mb-3">
    <div class="collapse multi-collapse" id="catatan">
      <div class="card card-body">
        
        <form action="{{route('catatan-penjadwalan-store')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <input name="penjadwalan_id" type="number" class="form-control d-none" value="{{$jadwal->id}}">
            <textarea name="catatan" class="form-control" rows="2" placeholder="Catat Apa yang terjadi hari ini"></textarea>
          </div>
          <button class="btn btn-outline-primary" type="submit">Tambah Catatan</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal untuk melihat catatan -->
<div class="modal fade" id="allcatatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach ($catatan as $item)
        <div class="card text-white bg-dark mb-3">
          <div class="card-body">
            <p class="card-text">{{$item->catatan}}</p>
          </div>
          <div class="card-header font-italic">-- {{$item->created_at->format('j F Y')}}</div>
        </div>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
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
      <div class="col-lg-6 text-right">
        <a href="" class="" data-toggle="modal" data-target="#allcatatan">Lihat Catatan</a><span class="badge badge-danger">{{$catatan->count()}}</span> 
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
          {{ Carbon\Carbon::parse($jadwal->start_date)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->plus_date_semai)->format('j F') }} 
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
          {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->plus_date_semai)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->plus_date_semai)->addDays($jadwal->plus_date_pindah_tanam)->format('j F') }}  
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
          {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->plus_date_semai)->addDays($jadwal->plus_date_pindah_tanam)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->tanaman->pemeliharaan)->addDays($jadwal->plus_date_semai)->addDays($jadwal->plus_date_pindah_tanam)->addDays($jadwal->plus_date_penjadwalan)->format('j F') }}
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


@endsection