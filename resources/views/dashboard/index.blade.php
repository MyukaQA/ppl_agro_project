@extends('dashboard.app')
@section('content')
<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
<h3>Dashboard</h3><hr>

<div class="row">
  <div class="col-lg-12">
    <h4>Pengumuman</h4>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat Datang !</strong> {{Auth::user()->name}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  </div>
</div>

@if (auth()->user()->role == 'admin')
<div class="row">
  <div class="col-lg-12">
    <div class="p-5 bg-white rounded shadow mb-5">
      <!-- Lined tabs-->
      <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
        <li class="nav-item flex-sm-fill ">
          <a id="home2-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="home2" aria-selected="true" class="nav-link text-uppercase font-weight-bold rounded-0 active">Admin</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="profile2-tab" data-toggle="tab" href="#users" role="tab" aria-controls="profile2" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0">Users</a>
        </li>
      </ul>

      <div id="myTab2Content" class="tab-content">

        <div id="admin" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade py-2 show active">
          <div class="row">
            <div class="col-lg-12 text-right py-3">
              <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#admincreate"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="admincreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Buat Akun Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('dashboard-user-create')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input name="name" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat Email</label>
                      <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" >
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin)
                  <tr>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->telepon}}</td>
                    <td>{{$admin->alamat}}</td>
                    <td>{{$admin->email}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div id="users" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade py-5">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Penjadwalan</th>
                  <th>Forum</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->telepon}}</td>
                    <td>{{$user->alamat}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->penjadwalan()->count()}} Penjadwalan</td>
                    <td>{{$user->forum()->count()}} Forum</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
      <!-- End lined tabs -->
    </div>
  </div>
</div>
@endif
@endsection