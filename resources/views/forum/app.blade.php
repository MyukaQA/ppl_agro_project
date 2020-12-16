<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Forum ASHID</title>

    {{-- dari luar --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('css/forum.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light text-white bg-dark">
    <a class="navbar-brand text-white" href="{{route('forum-index')}}">Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item active">
          <a class="nav-link text-white" href="{{route('dashboard-user')}}">Dashboard<span class="sr-only">(current)</span></a>
        </li>

        <!-- @yield('navbar') -->
          @if (auth()->user()->role == 'admin')
              <li class="nav-item active">
                <a class="nav-link text-white" href="{{route('forum-list')}}">List Topik</a>
            </li>
          @else
            <li class="nav-item active justify-content-end">
                <a style="cursor: pointer" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal1">Ajukan Kendala<span class="sr-only">(current)</span></a>
            </li>
          @endif
          
      </ul>
    </div>
  </nav>

  @yield('content')

    {{-- dari luar --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>
      $(document).ready(function(){
          $("#btn-komentar-utama").click(function(){
              $("#komentar-utama, #hasil-komentar").slideToggle();
          });
      });

      
      $(function() {
        $(document).ready(function() {
          $('#example').DataTable();
        });
      });

      ClassicEditor
            .create( document.querySelector( '#editor',{

            } ),{toolbar: [ 'heading', '|', 'bold', 'italic' ],})
            .catch( error => {
                console.error( error );
            } );
            
     
    </script> 
    @include('sweetalert::alert')
</body>
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Kendala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('ajukan-kendala')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleFormControlInput1">Judul</label>
						<input name="judul" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Judul" required>
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi</label>
						<textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi" required></textarea>
					</div>

          <div class="form-group">
						<label for="exampleFormControlTextarea1">Solusi</label>
						<textarea name="solusi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Solusi" required></textarea>
					</div>

					<div class="text-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Tambah Kendala</button>
					</div>
				</form>
      </div>
    </div>
  </div>
</div>
</html>