@extends('dashboard.app')
@section('content')
<style>
  .profile-header {
    transform: translateY(5rem);
  }
</style>
<!-- Profile widget -->
<div class="bg-white shadow rounded overflow-hidden">
  
  <div class="px-4 pt-0 pb-4 bg-dark">
    <div class="row pt-3 pl-3">
      <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
    </div>
    <div class="media align-items-end profile-header">
      <div class="profile mr-3"><img src="{{$user->getAvatars()}}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
        <a class="btn btn-dark btn-sm btn-block" data-toggle="collapse" href="#collapseExample" role="button">Edit Profil</a>
      </div>
      <div class="media-body mb-5 text-white">
          <h4 class="mt-0 mb-0">{{$user->name}}</h4>
          <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>San Farcisco</p>
      </div>
    </div>
  </div>

  <div class="bg-light p-4 d-flex justify-content-end text-center">
      {{-- <ul class="list-inline mb-0">
          <li class="list-inline-item">
              <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>
          </li>
          <li class="list-inline-item">
              <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>
          </li>
      </ul> --}}
      
  </div>

  <div class="py-4 px-4">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="collapsing" id="collapseExample">
          <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
          {{-- <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a> --}}
      </div>
      <div class="row">
          {{-- <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/nicole-honeywill-546848-unsplash_ymprvp.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
          <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294927/dose-juice-1184444-unsplash_bmbutn.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
          <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294926/cody-davis-253925-unsplash_hsetv7.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
          <div class="col-lg-6 pl-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/tim-foster-734470-unsplash_xqde00.jpg" alt="" class="img-fluid rounded shadow-sm"></div> --}}
      </div>
      <div class="py-4">
          <h5 class="mb-3">Forumku</h5>
          @foreach ($forum as $frm)
            <div class="p-4 bg-dark rounded shadow-sm text-white mb-3">
                <p class="font-italic mb-0">{{$frm->konten}}</p>
                <ul class="list-inline small mt-3 mb-0 ">
                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>{{$frm->komentar()->count()}}</li>
                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>{{$frm->judul}}</li>
                </ul>
            </div>
          @endforeach
      </div>
  </div>
</div><!-- End profile widget -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama</label>
            <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama">
          </div>      
                   
          <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Email">
          </div>        
        
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection