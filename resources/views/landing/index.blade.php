<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to ASHID</title>
  
  {{-- dari luar --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- dari dalam --}}
  <link rel="stylesheet" href="{{asset('css/landingpage.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark">
		<div class="container">
			<a href="/" class="navbar-brand">ASHID</a>
			
			<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
			</button>
			
			<div id="main-nav" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
          {{-- <li class="dropdown">
						<a href="#content" class="nav-item nav-link" data-toggle="dropdown">Services</a>
						<div class="dropdown-menu">
							<a href="#content" class="dropdown-item">Dropdown Item 1</a>
							<a href="#" class="dropdown-item">Dropdown Item 2</a>
							<a href="#" class="dropdown-item">Dropdown Item 3</a>
						</div>
          </li> --}}

					<li><a href="#" class="nav-item nav-link active">Home</a></li>
					<li><a href="#content" class="nav-item nav-link">Tentang kami</a></li>
          <li><a href="#team" class="nav-item nav-link">Our Team</a></li>
        
          @guest
            <li><a href="/login" class="nav-item nav-link">Login</a></li>
            <li><a href="/register" class="nav-item nav-link">Register</a></li>
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Hai, {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('dashboard-user') }}">Dashboard</a>
                  <a class="dropdown-item" href="/logout"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
          @endguest
        
        </ul>
			</div>
		</div>
	</nav>


<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('{{asset('images/header-bg1.jpg')}}')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">First Slide</h2>
          <p class="lead">This is a description for the first slide.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('{{asset('images/header-bg2.jpg')}}')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Second Slide</h2>
          <p class="lead">This is a description for the second slide.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('{{asset('images/header-bg3.jpg')}}')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Third Slide</h2>
          <p class="lead">This is a description for the third slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>


{{-- tentang kami --}}
<div id="content" class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Jenis Tanaman</h2>
        <p class="font-italic text-muted mb-4">Disini ASHID membantu anda untuk mengetahui jenis-jenis tanaman yang bagus/cocok untuk ditanama dalam media hidroponik.</p><a href="#j-tanaman" class="btn btn-light px-5 rounded-pill shadow-sm">Yuk cari tau</a>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('images/ct-1.jpg')}}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="{{asset('images/ct-2.jpg')}}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Jenis Kendala</h2>
        <p class="font-italic text-muted mb-4">Disini ASHID juga akan membantu anda untuk mengetahui jenis-jenis kendala yang sering dialami dalam bercocok tanam dalam media hidroponik serta cara penanganannya.</p><a href="#j-kendala" class="btn btn-light px-5 rounded-pill shadow-sm">Yuk cari tau</a>
      </div>
    </div>
  </div>
</div>

<div id="j-tanaman" class="container-fluid py-5 bg-light pt-5 pb-5">
  @include('landing.jenisTanaman')
</div>

<div id="j-kendala" class="container-fluid py-5 pt-5 pb-5">
  @include('landing.jenisKendala')
</div>

<div id="team" class="container-fluid py-5 pt-5 pb-5">
  @include('landing.team')
</div>



@include('landing.footer')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>


<script src="{{asset('js/navbar.js')}}"></script>
</body>
</html>