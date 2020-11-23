@extends('dashboard.app')
@section('content')
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<div class="row">
  <div class="col-lg-6">
    <h3>Profile</h3>
  </div>
</div><hr>
<div class="container mt-3">
    <div class="row">
        <div class="col-5">
            <div id="accordion">
                <div class="card">
                  <div class="card-header">
                    <a class="card-link text-center" data-toggle="collapse" href="#collapseOne">                      
                      <h4>I'am Aini</h4>
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        <p><i class="fas fa-user-tie"></i> <span class="font-weight-bold">Aini</span></p>
                        <p><i class="fas fa-user-tie"></i> <span class="font-weight-bold">aini@gmail.com</span></p>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

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