@extends('dashboard.app')
@section('content')
  
  <div class="col-lg-12 mx-auto">
    {{-- <div class="card rounded shadow border-0"> --}}
      {{-- <div class="card-body p-5 bg-white rounded"> --}}
        <div class="table-responsive">
          <table id="example" style="width:100%" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Judul</th>
                <th>slug</th>
                <th>content</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $tanaman)
                <tr>
                  <td>{{$tanaman->title}}</td>
                  <td>{{$tanaman->slug}}</td>
                  <td>{{$tanaman->content}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      {{-- </div> --}}
    {{-- </div> --}}
  </div>

  <form action="/dashboard/create" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <textarea name="content" id="" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection