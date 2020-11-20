@extends('dashboard.app')
@section('content')
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
  <div class="row">
    <div class="col-lg-6">
      <h3>Penjadwalan</h3>
    </div>
    <div class="col-lg-6 text-right">
      <button id="btn-jadwal" class="btn btn-primary btn-md" data-toggle="modal" data-target="#fullcalendar">Tambah Penjadwalan</button>
    </div>
  </div><hr>
  {{-- <div id="konten-kalender" >
    @include('dashboard.fullcalendar')
  </div> --}}
  
@foreach ($event as $jadwal)
<div class="card mb-3">
  <div class="card-header">
    {{$jadwal->tanaman->title}}
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
        <p class="card-text">{{$jadwal->start_date}}</p>
      </div>
      <div class="col-lg-8 text-center">
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="col-lg-2 text-right">
        <p class="card-text">{{ Carbon\Carbon::parse($jadwal->start_date)->addDays($jadwal->tanaman->ph) }}</p>
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
                {{-- <option value="{{$nama->ph}}">{{$nama->ph}}</option> --}}
              @endforeach
            </select>
          </div>
          
          {{-- <div class="form-group">
            <label>ph</label>
            <input name="ph" type="text" class="form-control" value="{{$tanaman->ph}}">
          </div> --}}
          
          {{-- <div class="form-group">
            <label>Start Date</label>
            <input name="start" type="datetime-local" id="startDate" class="form-control" aria-describedby="emailHelp" placeholder="Nutrisi Tanaman">
          </div>
    
          <div class="form-group">
            <label>End Date</label>
            <input name="end" type="datetime-local" id="endDate" class="form-control" aria-describedby="emailHelp" placeholder="Ph Tanaman">
          </div> --}}
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
</div>


@endsection

