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

					<li><a href="#" class="nav-item nav-link active">Rumah</a></li>
					<li><a href="#content" class="nav-item nav-link">Tentang kami</a></li>
          <li><a href="#team" class="nav-item nav-link">Tim Kami</a></li>
        
          @guest
            <li><a href="/login" class="nav-item nav-link">Masuk</a></li>
            <li><a href="/register" class="nav-item nav-link">Daftar</a></li>
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
          <h2 class="display-4">Slide Pertama</h2>
          <p class="lead">Deskripsi untuk slide pertama.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('{{asset('images/header-bg2.jpg')}}')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Slide Kedua</h2>
          <p class="lead">Deskripsi untuk slide kedua.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('{{asset('images/header-bg3.jpg')}}')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Slide Ketiga</h2>
          <p class="lead">Deskripsi untuk slide ketiga.</p>
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


{{-- 4 Fitur Utama --}}
<div class="container py-5" id="content">
  <div class="py-5 text-center">
    <h1>4 Fitur Utama ASHID</h1>
    <p>Berikut adalah 4 fitur utama ASHID yang dapat Anda manfaatkan</p>
  </div>

  <div class="row">

    <div class="col-lg-3 mb-5">
      <div class="progress">
        <div class="progress-bar w-100" style="background-color: #80D261"></div>
      </div>
      <figure class="rounded p-3 bg-white shadow-lg h-100">
        <img src="{{asset('images/fitur-1.png')}}" alt="" class="w-100 card-img-top p-5">
        <figcaption class="p-4 card-img-bottom">
          <h2 class="h2 font-weight-bold mb-4 text-dark text-center">Tanaman</h2>
          <p class="mb-0 text-small text-dark text-center">Dapatkan seputar tanaman apa saja yang bisa ditanaman di media hidroponik, dan mengetahui bagaimana cara merawat tanaman hidroponik.</p>
        </figcaption>
      </figure>
    </div>

    <div class="col-lg-3 mb-5">
      <div class="progress">
        <div class="progress-bar w-100" style="background-color: #FFDA8F"></div>
      </div>
      <figure class="rounded p-3 bg-white shadow-lg h-100">
        <img src="{{asset('images/fitur-2.png')}}" alt="" class="w-100 card-img-top p-5">
        <figcaption class="p-4 card-img-bottom">
          <h2 class="h2 font-weight-bold mb-4 text-dark text-center">Kendala</h2>
          <p class="mb-0 text-small text-dark text-center">Kenali kendala-kendala apa saja yang terjadi pada tanaman Anda, dan dapatkan solusinya.</p>
        </figcaption>
      </figure>
    </div>

    <div class="col-lg-3 mb-5">
      <div class="progress">
        <div class="progress-bar w-100" style="background-color: #F06151"></div>
      </div>
      <figure class="rounded p-3 bg-white shadow-lg h-100">
        <img src="{{asset('images/fitur-3.png')}}" alt="" class="w-100 card-img-top p-5">
        <figcaption class="p-4 card-img-bottom">
          <h2 class="h2 font-weight-bold mb-4 text-dark text-center">Penjadwalan</h2>
          <p class="mb-0 text-small text-dark text-center">Lakukan penjadwalan tanaman Anda, amati dan catat apa saja yang terjadi hari itu.</p>
        </figcaption>
      </figure>
    </div>

    <div class="col-lg-3 mb-5">
      <div class="progress">
        <div class="progress-bar w-100" style="background-color: #03A9F4"></div>
      </div>
      <figure class="rounded p-3 bg-white shadow-lg h-100">
        <img src="{{asset('images/fitur-4.png')}}" alt="" class="w-100 card-img-top p-5">
        <figcaption class="p-4 card-img-bottom">
          <h2 class="h2 font-weight-bold mb-4 text-dark text-center">Forum</h2>
          <p class="mb-0 text-small text-dark text-center">Diskusikan permasalahan Anda dengan User lain, dan beri solusi dari permasalahan tersebut agar permasalahan Anda terselesaikan.</p>
        </figcaption>
      </figure>
    </div>
  </div>

</div>

<div class="container">
  <hr class="dashed">
</div>

{{-- Jenis Tanaman --}}
<div class="container py-5">
  <div class="row ">

    <div class="col-lg-5">
      <h4 class="h2 text-bold">ASHID</h4>
      <h1 class="">Jenis Tanaman</h1>
      <p>Beberapa jenis tanaman yang bisa di tanaman di media hidroponik</p>
    </div>

    <div class="col-lg-7">
      <div class="row justify-content-end">
        @foreach ($data as $tanaman)
          <div class="col-lg-6 mb-5">
            <figure class="rounded bg-white shadow-lg h-100">
              <img src="{{$tanaman->getImages()}}" alt="" class="w-100 card-img-top">
              <figcaption class="p-4 card-img-bottom">
                <h2 class="h3 font-weight-bold mb-5" style="color: #80D261">{{$tanaman->title}}</h2>
                <p class="mb-0 text-small text-dark">{{$tanaman->content}}</p>
              </figcaption>
              <div class="mt-3 p-4 justify-content-end">
                <div class="m-3 text-right">
                  <a href="{{route('dashboard-tanaman')}}" class="font-weight-bold" style="color: #80D261">Lihat Selengkapnya</a>
                </div>
              </div>
            </figure>
          </div>
        @endforeach
    
      </div>
    </div>

  </div>
</div>


{{-- Jenis Kendala --}}
<div class="container">
  <div class="row py-5">

    <div class="col-lg-5">
      <h4 class="h2 text-bold">ASHID</h4>
      <h1 class="">Jenis Kendala</h1>
      <p>Beberapa Kendala yang Anda lihat</p>
    </div>

    <div class="col-lg-7">
      <div class="row justify-content-end">
        @foreach ($kendala as $kdl)
          <div class="col-lg-6">
            <div class="card effect-1 mb-5">
              <div class="card-body p-5">
                  <h2 class="h5">{{$kdl->ciri2}}</h2>
                  <p class="font-italic text-muted">{!!$kdl->penanganan!!}</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>

  </div>
</div>

<div class="container">
  <hr class="dashed">
</div>

{{-- Team PPL --}}
<div class="container py-5">
  <div class="mb-5 text-center">
    <h1>TIM ASHID</h1>
  </div>

  <div class="row pb-5 mb-4">

    <div class="col-lg-4 mb-lg-5">
        <!-- Card-->
        <div class="card shadow border-0 rounded h-100">
            <div class="card-body p-0"><img src="{{asset('images/tim/fauzan.jpg')}}" alt="" class="w-100 card-img-top">
                <div class="p-4">
                    <h5 class="h2 mb-2">MOH. SHOLIHUL FAUZAN</h5>
                    <p class="text-bold font-italic">Project Manager</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mb-lg-5">
        <!-- Card-->
        <div class="card shadow border-0 rounded h-100">
            <div class="card-body p-0"><img src="{{asset('images/tim/ali.jpeg')}}" alt="" class="w-100 card-img-top">
                <div class="p-4">
                    <h5 class="h2 mb-2">SAIFUR RIFQI ALI</h5>
                    <p class="text-bold font-italic">System Analist</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mb-lg-5">
        <!-- Card-->
        <div class="card shadow border-0 rounded h-100">
            <div class="card-body p-0"><img src="{{asset('images/tim/egik.jpg')}}" alt="" class="w-100 card-img-top">
                <div class="p-4">
                    <h5 class="h2 mb-2">ZIHAN MUHAMMAD AL G. I. Z.</h5>
                    <p class="text-bold font-italic">Desginer</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mb-lg-5">
      <!-- Card-->
      <div class="card shadow border-0 rounded h-100">
          <div class="card-body p-0"><img src="{{asset('images/tim/sadli.jpg')}}" alt="" class="w-100 card-img-top">
              <div class="p-4">
                  <h5 class="h2 mb-2">MUHAMMAD SADLI MUSHTHAFA</h5>
                  <p class="text-bold font-italic">Programmer</p>
              </div>
          </div>
      </div>
    </div>

    <div class="col-lg-4 mb-lg-5">
      <!-- Card-->
      <div class="card shadow border-0 rounded h-100">
          <div class="card-body p-0"><img src="{{asset('images/tim/mylian.jpg')}}" alt="" class="w-100 card-img-top">
              <div class="p-4">
                  <h5 class="h2 mb-2">MYLIAN GEDHE</h5>
                  <p class="text-bold font-italic">Programmer</p>
              </div>
          </div>
      </div>
    </div>

    <div class="col-lg-4 mb-lg-5">
      <!-- Card-->
      <div class="card shadow border-0 rounded h-100">
          <div class="card-body p-0"><img src="{{asset('images/tim/khamim.jpg')}}" alt="" class="w-100 card-img-top">
              <div class="p-4">
                  <h5 class="h2 mb-2">KHAMIM THOHARI WAKHID</h5>
                  <p class="text-bold font-italic">Tester</p>
              </div>
          </div>
      </div>
    </div>

  </div>
</div>

@include('landing.footer')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>


<script src="{{asset('js/navbar.js')}}"></script>
</body>
</html>