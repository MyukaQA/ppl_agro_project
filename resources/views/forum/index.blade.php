@extends('forum.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="panel-heading text-right"><a class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModal">Tambah Topik</a></div>
<div class="container">
	<div class="feed-activity-list">

		@foreach ($forum as $frm)
			<div class="feed-element">
					<a href="#" class="pull-left">
					<img alt="image" class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png">
					</a>
					
					<div class="container mb-5">
							<small class="pull-right">{{$frm->created_at->diffForHumans()}}</small>
							{{$frm->judul}} <br>
							<small class="text-muted">By : {{$frm->user->name}}</small>
									<div class="well bg-light">
										{{$frm->konten}}
									</div>
									<div class="pull-right">
											{{-- <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
											<a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a> --}}
											<a href="{{route('forum-index-detail', $frm->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Baca</a>
									</div>
					</div>
			</div><!-- feed-element-->
		@endforeach

	</div><!--feed-activity-list-->
	<div class="mt-3">
		{{ $forum->links() }}
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
						<label for="exampleFormControlInput1">Gambar</label>
						<input name="images" type="file" class="form-control-file" id="exampleFormControlInput1" placeholder="Judul Topik">
					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Konten</label>
						<textarea name="konten" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Topik"></textarea>
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