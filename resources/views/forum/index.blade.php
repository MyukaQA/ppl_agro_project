@extends('forum.app')
@section('content')
<div class="container">
	<div class="row ">

		<div class="col-md-6">
			<div class="media blog-media">
				<a href="{{route('forum-index-detail')}}"><img class="d-flex" src="https://via.placeholder.com/350x380/6495ED/000000" alt="Generic placeholder image"></a>
				<div class="circle">
					<h5 class="day">14</h5>
					<span class="month">sep</span>
				</div> 
				<div class="media-body">
					<a href="{{route('forum-index-detail')}}"><h5 class="mt-0">Forum Title</h5></a>
					Sodales aliquid, in eget ac cupidatat velit autem numquam ullam ducimus occaecati placeat error.
					<a href="{{route('forum-index-detail')}}" class="post-link">Read More</a>
					<ul>
						<li>by: Admin</li>
						<li class="text-right"><a href="blog-post-left-sidebar.html">07 comments</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="media blog-media">
				<a href="blog-post-left-sidebar.html"><img class="d-flex" src="https://via.placeholder.com/350x380/FFB6C1/000000" alt="Generic placeholder image"></a>
				<div class="circle">
						<h5 class="day">12</h5>
						<span class="month">sep</span>
					</div>
				<div class="media-body">
					<a href=""><h5 class="mt-0">Forum Title</h5></a>
					Sodales aliquid, in eget ac cupidatat velit autem numquam ullam ducimus occaecati placeat error.
					<a href="blog-post-left-sidebar.html" class="post-link">Read More</a>
					<ul>
						<li>by: Admin</li>
						<li class="text-right"><a href="blog-post-left-sidebar.html">04 comments</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="media blog-media">
				<a href="blog-post-left-sidebar.html"><img class="d-flex" src="https://via.placeholder.com/350x380/FF7F50/000000" alt="Generic placeholder image"></a>
				<div class="circle">
						<h5 class="day">09</h5>
						<span class="month">sep</span>
					</div>
				<div class="media-body">
					<a href=""><h5 class="mt-0">Forum Title</h5></a>
					Sodales aliquid, in eget ac cupidatat velit autem numquam ullam ducimus occaecati placeat error.
					<a href="blog-post-left-sidebar.html" class="post-link">Read More</a>
					<ul>
						<li>by: Admin</li>
						<li class="text-right"><a href="blog-post-left-sidebar.html">10 comments</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="media blog-media">
				<a href="blog-post-left-sidebar.html"><img class="d-flex" src="https://via.placeholder.com/350x380/008B8B/000000" alt="Generic placeholder image"></a>
				<div class="circle">
						<h5 class="day">04</h5>
						<span class="month">sep</span>
					</div>
				<div class="media-body">
					<a href=""><h5 class="mt-0">Forum Title</h5></a>
					Sodales aliquid, in eget ac cupidatat velit autem numquam ullam ducimus occaecati placeat error.
					<a href="blog-post-left-sidebar.html" class="post-link">Read More</a>
					<ul>
						<li>by: Admin</li>
						<li class="text-right"><a href="blog-post-left-sidebar.html">06 comments</a></li>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection