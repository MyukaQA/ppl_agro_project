@extends('dashboard.app')
@section('content')
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
  <div class="row">
    <div class="col-lg-4">
      <h3>Penjadwalan</h3>
    </div>
    <div class="col-lg-4">
      <h4>Tanggal {{Carbon\Carbon::now()->format('j F Y')}}</h4>
    </div>
    <div class="col-lg-4 text-right">
      <button id="btn-jadwal" class="btn btn-primary btn-md" data-toggle="modal" data-target="#fullcalendar">Tambah Penjadwalan</button>
    </div>
  </div><hr>
  {{-- <div id="konten-kalender" >
    @include('dashboard.fullcalendar')
  </div> --}}
  
@foreach ($event as $jadwal)
<div class="card mb-3">
  <div class="card-header">
    <div class="row">
      <div class="col-lg-6">
        {{$jadwal->tanaman->title}}
      </div>
      <div class="col-lg-6 text-right">
        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash fa-fw"></i></a>
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
        <p class="card-text">{{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->tanaman->pemeliharaan)->format('j F Y') }}</p>
      </div>
    </div>

    <div class="row mt-2">
      <div class="col-lg-4">
        <div class="card p-2 font-weight-bold">
          {{ Carbon\Carbon::parse($jadwal->start_date)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->format('j F') }} 
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
          {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->format('j F') }}  
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
          {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->format('j F') }} Sampai {{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->semai)->addDays($jadwal->tanaman->pindah_tanam)->addDays($jadwal->tanaman->pemeliharaan)->format('j F') }}
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
@endforeach




  <!-- Modal -->
<div class="modal fade" id="fullcalendar" tabindex="-1" aria-labelledby="fullcalendarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penjadwalan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dashboard-penjadwalan-store')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Tanaman</label>
            <select name="title" class="form-control">
              @foreach ($tanaman as $nama)  
                <option value="{{$nama->id}}">{{$nama->title}}</option>
              @endforeach
            </select>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
</div>


@endsection

