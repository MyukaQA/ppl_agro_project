@extends('dashboard.app')
@section('content')
<!-- Toggle button -->
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-4">
    <h3>Penjadwalan</h3>
  </div>
  <div class="col-lg-4">
    {{-- <h4>Tanggal {{Carbon\Carbon::now()->format('j F Y')}}</h4> --}}
  </div>
  <div class="col-lg-4 text-right">
    <a href="{{route('dashboard-penjadwalan')}}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
  </div>
</div><hr>

<form action="{{route('dashboard-penjadwalan-update', $jadwal->id)}}" method="POST">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nama Tanaman</label>
      <input type="text" class="form-control" value="{{$jadwal->tanaman->title}}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label>User</label>
      <input type="text" class="form-control" value="{{$jadwal->user->name}}" readonly>
    </div>
  </div>

  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Tanggal Awal</label>
      <input type="text" class="form-control" value="{{Carbon\Carbon::parse($jadwal->start_date)->format('j F Y')}}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label>Tanggal Akhir</label>
      <input type="text" class="form-control" value="{{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->tanaman->pemeliharaan)->addDays($jadwal->plus_date)->subDays($jadwal->minus_date)->format('j F Y') }}" readonly>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Semai</label>
      <div class="input-group">
        <input name="plus_date" type="number" class="form-control" readonly value="{{$jadwal->plus_date_semai}}">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">Hari</span>
        </div>
      </div>
    </div>

    <div class="form-group col-md-4">
      <label>Pindah Tanam</label>
      <div class="input-group">
        <input name="minus_date" type="number" class="form-control" readonly value="{{$jadwal->plus_date_pindah_tanam}}">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">Hari</span>
        </div>
      </div>
    </div>

    <div class="form-group col-md-4">
      <label>Penjadwalan</label>
      <div class="input-group">
        <input name="minus_date" type="number" class="form-control" readonly value="{{$jadwal->plus_date_penjadwalan}}">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">Hari</span>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <a class="btn btn-outline-info w-100" data-toggle="collapse" href="#detail" role="button">Lihat Detail Penjadwalan</a>
  </div>

  <div class="form-group">
    <div class="collapse" id="detail">
         
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-6">
                {{$jadwal->tanaman->title}} 
              </div>
              <div class="col-lg-6 text-right">
                <a href="" class="text" data-toggle="modal" data-target="#catatan">Lihat Catatan</a> 
              </div>
            </div>
          </div>
          <div class="card-body">
        
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

    </div>
  </div>
</form>

<!-- Modal untuk melihat catatan -->
<div class="modal fade" id="catatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

@endsection