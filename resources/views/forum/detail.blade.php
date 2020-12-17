@extends('forum.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pb50 py-5">
    <div class="row">
        <div class="col-md-9 mb40">
            <article>
                <img src="{{$forum->getImages()}}" alt="" class="img-fluid mb30">
                <div class="post-content">
                    <h3>{{$forum->judul}}</h3>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-user-circle-o"></i> <a href="#">{{$forum->user->name}}</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o"></i> <a href="#">{{$forum->created_at->diffForHumans()}}</a>
                        </li>
                        <li class="list-inline-item">
                            
                            <i class="fa fa-tags"></i> <a href="#">{{$forum->kategori->nama}}</a>
                            
                        </li>
                    </ul>
                    <p>{!!$forum->konten!!}</p>
                    <hr>
                    <div class="btn-group">
                        {{-- <button class="btn btn-outline-secondary"><i class="fa fa-thumbs-up"></i> Suka</button> --}}
                        <button id="btn-komentar-utama" class="btn btn-outline-secondary"><i class="fa fa-comments"></i> Komentar</button>
                    </div>
                    <form action="" method="POST" style="display: none;" id="komentar-utama">
                        {{ csrf_field() }}
                        <div class="form-group mt-3">
                            <input type="hidden" name="forum_id" value="{{$forum->id}}">
                            <input type="hidden" name="parent" value="0">                            
                            <textarea name="konten" class="form-control" rows="5" placeholder="Comment"></textarea>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>

                    <hr class="mb-3">
 
                    @foreach ($forum->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)    
                        <div class="media">
                            <img src="{{$komentar->user->getAvatars()}}" alt="" width="56" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                            <div class="media-body">
                                <h5 class="mt-0 font400 clearfix">
                                    <p class="float-right">{{$komentar->created_at->diffForHumans()}}</p>
                                    {{$komentar->user->name}}</h5>
                                    <p class="card-header">{{$komentar->konten}}</p>
                                    <form action="" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group mt-3">
                                            <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                            <input type="hidden" name="parent" value="{{$komentar->id}}"> 
                                            <input type="text" name="konten" class="form-control">
                                        </div>
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary btn-sm mb-3">Balas</button>
                                        </div>
                                    </form>
                                     
                                    @foreach ($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)                                        
                                        <div class="media mb40">
                                            <img src="{{$komentar->user->getAvatars()}}" alt="" width="56" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                                            <div class="media-body">
                                                <h5 class="mt-0 font400 clearfix">
                                                    <p class="float-right">{{$child->created_at->diffForHumans()}}</p>
                                                    {{$child->user->name}}</h5>
                                                    <p class="card-header">{{$child->konten}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                            </div>
                        </div>
                    @endforeach
                    

                </div>
            </article>
            <!-- post article-->

        </div>
        <div class="col-md-3 mb40">

            <!--/col-->
            <div class="mb-3 w-100">
                <p class="font-weight-bold">Diskusi</p>
                <p class="text-muted"><i class="fa fa-comments" aria-hidden="true"></i> {{$forum->komentar()->count()}} Komentar</p>
                <p class="text-muted"><i class="fa fa-list-alt" aria-hidden="true"></i> {{$forum->pengajuan()->count()}} Pengajuan Kendala</p>
                <p class="font-weight-bold">Aksi</p>
                <div class="pb-2">
                    <a href="{{route('forum-index')}}" data-toggle="modal" data-target="#ajukanKendala" class="btn btn-outline-secondary w-100 shadow"><i class="fa fa-share-alt" aria-hidden="true"></i> Ajukan Kendala</a>
                </div>
                <div class="pb-2">
                    <a href="{{route('forum-index')}}" class="btn btn-outline-secondary w-100 shadow"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="ajukanKendala" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajukan Kendala</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-warning" role="alert">
                Fitur ajukan kendala bertujuan agar Anda bisa membuat solusi dari kendala Anda, 
                yang nantinya solusi Anda akan tampil di Web ASHID. 
                Tekan <b>Buat</b> jika ingin membuat solusi.
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <a class="btn btn-primary" href="{{route('forum-ajukan-kendala', $forum->id)}}">Buat Solusi Kendala</a>
            </div>
        </div>
        </div>
    </div>

@endsection
