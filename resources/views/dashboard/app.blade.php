<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>

    {{-- ======================================== dari luar ================================================= --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    {{-- jquery ui --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    
    
    {{-- ======================================== dari dalam ================================================ --}}
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    
    {{-- <link rel="stylesheet" href="{{asset('/css/fullcalendar.css.map')}}"> --}}
</head>
<body>
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4">
    <div class="media d-flex align-items-center"><img src="{{Auth::user()->getAvatars()}}" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0 text-dark">{{Auth::user()->name}}</h4>
        <p class="font-weight-light text-muted mb-0"><a class="font-italic text-dark" href="/">Landing Page</a></p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Utama</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="{{route('dashboard-user')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Dashboard
            </a>
    </li>
    <li class="nav-item">
      <a href="{{route('dashboard-tanaman')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-leaf mr-3 text-primary fa-fw"></i>
                Tanaman
            </a>
    </li>
    <li class="nav-item">
      <a href="{{route('dashboard-kendala')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-exclamation-circle mr-3 text-primary fa-fw"></i>
                Data Kendala
            </a>
    </li>
    <li class="nav-item">
      <a href="{{route('dashboard-penjadwalan')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-calendar mr-3 text-primary fa-fw"></i>
                Penjadwalan
            </a>
    </li>
    <li class="nav-item">
      <a href="{{route('forum-index')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-forumbee mr-3 text-primary fa-fw"></i>
               Forum
            </a>
    </li>
  </ul>

  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Setting</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="{{route('dashboard-profile')}}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-user mr-3 text-primary fa-fw"></i>
               Profil
            </a>
    </li>
    <li class="nav-item">
      <a href="" data-toggle="modal" data-target="#keluar" class="nav-link text-dark font-italic bg-light" >
                <i class="fa fa-sign-out mr-3 text-primary fa-fw"></i>
                Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
    </li>
  </ul>
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-3" id="content">
  @yield('content')
</div>

<!-- Modal Logout -->
<div class="modal fade" id="keluar" tabindex="-1" aria-labelledby="keluarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        Yakin ingin keluar ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/logout" class="btn btn-danger" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Keluar</a>
      </div>
    </div>
  </div>
</div>



  {{-- ========================================== dari luar ================================================ --}}

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
  {{-- dari luar | untuk datatable --}}
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  {{-- ========================================== dari dalam =============================================== --}}
  {{-- dari dalam | fullcalendar js --}}
  
  {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
  {{-- dari dalam | script calendar --}}
  {{-- <script src="{{asset('js/scriptcalendar.js')}}"></script> --}}
  
  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    // untuk icon
    feather.replace()

    // untuk sidebar toggle
    $(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
      });
}   );

    // untuk datatable
    $(function() {
      $(document).ready(function() {
        $('#example, #example1').DataTable();
      });
    });

    $(document).ready(function(){

      $("#btn-calendar").click(function(){
          $("#konten-kalender").slideToggle();
      });
    });

  </script>


@include('sweetalert::alert')

</body>
</html>