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

		<div class="col-lg-6">
			<div class="text-right"><a class="btn btn-primary text-white" data-toggle="modal" data-target="#tambahtopik">Tambah Topik</a></div>
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
</div>


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
        <form action="{{route('forum-create')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleFormControlInput1">Judul</label>
						<input name="judul" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Judul Topik">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Kategori</label>
						<select class="form-control" name="kategori">
							@foreach ($kategoris as $item)
								<option value="{{$item->id}}">{{$item->nama}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Gambar</label>
						<input name="images" type="file" class="form-control-file" placeholder="Judul Topik">
					</div>

					<div class="form-group">
						<label>Konten</label>
						<textarea name="konten" id="editor" class="form-control" rows="20" placeholder="Isi Topik"></textarea>
					</div>

					<div class="text-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
      </div>
    </div>
  </div>
</div>
@endsection