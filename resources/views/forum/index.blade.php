@extends('forum.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
	<div class="row">
		<div class="col-lg-3 py-5">
			<h4 class="pb-3">Forum Diskusi</h4>
			<p class="pb-2">Fitur forum diskusi ini bertujuan untuk mempermudah user dalam memahami tentang hidroponik, user dapat bertanya dan menjawab hal-hal yang terkait hidroponik.</p>
			<div class="pb-5"><a class="btn btn-primary text-white shadow" href="{{route('forum-create')}}">Buat Forum Diskusi Baru</a></div>
		
			<h4 class="pb-3">Pilih Berdasarkan Kategori</h4>
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="{{route('forum-index')}}" class="btn btn-outline-secondary btn-sm">Semua</a>
				<a href="{{route('forum-choose-marketing')}}" class="btn btn-outline-secondary btn-sm">Marketing</a>
				<a href="{{route('forum-choose-tanaman')}}" class="btn btn-outline-secondary btn-sm">Tanaman</a>
				<a href="{{route('forum-choose-hama')}}" class="btn btn-outline-secondary btn-sm">Hama</a>
			</div>
		</div>

		<div class="col-md-1"></div>

		<div class="col-lg-8 py-5">

			<form action="/dashboard/forum" method="GET">
				<div class="input-group mb-3 shadow">
					<input name="cari" type="text" class="form-control" placeholder="Cari Judul Forum Diskusi">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search text-info" aria-hidden="true"></i></button>
					</div>
				</div>
			</form>
			<div class="dropdown-divider"></div>

			@if ($forum->count() == 0)
				<div class="py-3">
					<div class="alert alert-primary" role="alert">
						Tidak ada forum yang bisa ditampilkan. Ayo <a href="{{route('forum-create')}}" class="alert-link">buat forum</a> sekarang !
					</div>
				</div>
			@else
				@foreach ($forum as $frm)
				<div class="py-3">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-10">
									<h4><a href="{{route('forum-index-detail', $frm->id)}}" class="text-primary">{{$frm->judul}}</a></h4>
									<p class="text-dark">{!!Str::limit($frm->konten, 100, '..')!!}</p>
									<div class="mb-3">
										<small class="text-muted mr-3"><i class="fa fa-user" aria-hidden="true"></i> {{$frm->user->name}}</small>
										<small class="text-muted mr-3"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$frm->created_at->diffForHumans()}}</small>
										<small class="text-muted mr-3"><i class="fa fa-commenting" aria-hidden="true"></i> {{$frm->komentar()->count()}} Komentar</small>
									</div>
								</div>
								<div class="col-lg-2">
									<p class="text-secondary">Kategori:</p>
									<span class="badge badge-secondary">{{$frm->kategori->nama}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif



		</div>
	</div>
</div>

{{-- <div class="container-fluid py-3">
	<div class="row">
		<div class="col-lg-6">
			
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="{{route('forum-index')}}" class="btn btn-outline-secondary">Semua</a>
				<a href="{{route('forum-choose-marketing')}}" class="btn btn-outline-secondary">Marketing</a>
				<a href="{{route('forum-choose-tanaman')}}" class="btn btn-outline-secondary">Tanaman</a>
				<a href="{{route('forum-choose-hama')}}" class="btn btn-outline-secondary">Hama</a>
			</div>

		</div>

		<div class="col-lg-6">
			<div class="text-right"><a class="btn btn-primary text-white" style="background-color: #5aa469" data-toggle="modal" data-target="#tambahtopik">Tambah Topik</a></div>
		</div>
	</div>
</div>

<div class="container-fluid">
	
	<div class="table-responsive table-hover">
		<table id="example" style="width:100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Topik</th>
					<th>Created</th>
					<th>By</th>
					<th>Komentar</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($forum as $frm)
				<tr>
					<td class="w-25">
						
						<div class="feed-element">
							<a href="#" class="pull-left">
							<img alt="image" class="img-circle" src="{{$frm->user->getAvatars()}}">
							</a>
								<h5 class="mb-4"><a href="{{route('forum-index-detail', $frm->id)}}" class="text-dark">{{$frm->judul}}</a></h5>
								<div class="">
									{!!Str::limit($frm->konten, 50, '...')!!} 
										<span class="badge badge-success">{{$frm->kategori->nama}}</span>

								</div>
						</div>

					</td>
					<td>{{$frm->created_at->diffForHumans()}}</td>
					<td>By {{$frm->user->name}}</td>
					<td>{{$frm->komentar()->count()}} Komentar</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div> --}}


<!-- Modal -->
<div class="modal fade" id="tambahtopik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
@endsection