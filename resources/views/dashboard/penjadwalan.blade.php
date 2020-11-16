@extends('dashboard.app')
@section('content')
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
  <div class="row">
    <div class="col-lg-6">
      <h3>Penjadwalan</h3>
    </div>
    <div class="col-lg-6 text-right">
      <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#fullcalendar">Tambah Penjadwalan</button>
    </div>
  </div><hr>

  
  
  <div id="calendar"></div>

  <div>
    {!! $calendar_details->calendar() !!}
    {!! $calendar_details->script() !!}
  </div>



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
            <label>Judul Event</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Tanaman">
          </div>
          
          <div class="form-group">
            <label>Start Date</label>
            <input name="start_date" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nutrisi Tanaman">
          </div>

          <div class="form-group">
            <label>End Date</label>
            <input name="end_date" type="datetime-local" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ph Tanaman">
          </div>

          {{-- <div class="form-group">
            <label>konten</label>
            <textarea name="content" class="form-control" id="" cols="20" rows="5" placeholder="Deskripsi Tanaman"></textarea>
          </div> --}}
        
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
  
@endsection