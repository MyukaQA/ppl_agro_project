@extends('forum.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container-fluid py-3">
	<div class="row">
		<div class="col-lg-6">
			
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="{{route('forum-index')}}" class="btn btn-outline-secondary">Semua</a>
				<a href="{{route('forum-choose-marketing')}}" class="btn btn-outline-secondary">Marketing</a>
				<a href="{{route('forum-choose-tanaman')}}" class="btn btn-outline-secondary">Tanaman</a>
				<a href="{{route('forum-choose-hama')}}" class="btn btn-outline-secondary">Hama</a>
			</div>

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
					<th>Aksi</th>
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
									{{Str::limit($frm->konten, 50, '...')}} 
									<span class="badge badge-success">{{$frm->kategori->nama}}</span>
								</div>
						</div>

					</td>
					<td>{{$frm->created_at->diffForHumans()}}</td>
					<td>By {{$frm->user->name}}</td>
					<td>{{$frm->komentar()->count()}} Komentar</td>
					<td><a data-toggle="modal" data-target="#delete{{$frm->id}}" class="btn btn-danger text-white"> Hapus</a></td>
				</tr>

				<!-- Modal delete -->
				<div class="modal fade" id="delete{{$frm->id}}" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<div class="alert alert-warning" role="alert">
									Tekan <b>Hapus</b> jika sudah yakin ingin menghapus!
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								<a href="{{route('hapus-forum', $frm->id)}}"  class="btn btn-danger"> Hapus</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
@endsection