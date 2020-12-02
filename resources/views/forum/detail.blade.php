@extends('forum.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pb50 py-5">
    <div class="col-xs-12">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @elseif (Session::has('warning'))
            <div class="alert alert-danger">{{toast('Success Toast','success')}}</div>
        @endif
    </div>
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
                    <p>{{$forum->konten}}</p>
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
                            <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
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
                                            <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
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
                <a href="{{route('forum-index')}}" class="btn btn-secondary w-100">Back</a>
            </div>
            <!--/col-->
            <div>
                <h4 class="sidebar-title">Latest News</h4>
                <ul class="list-unstyled">
                    {{-- <li class="media">
                        <img class="d-flex mr-3 img-fluid" width="64" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5> April 05, 2017
                        </div>
                    </li>
                    <li class="media my-4">
                        <img class="d-flex mr-3 img-fluid" width="64" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5> Jan 05, 2017
                        </div>
                    </li>
                    <li class="media">
                        <img class="d-flex mr-3 img-fluid" width="64" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="#">Lorem ipsum dolor sit amet</a></h5> March 15, 2017
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
