@extends('forum.app')
@section('content')
<div class="container py-5">
  <h4>Buat Topik Diskusi</h4>
  <p class="text-dark">Anda dapat membuat topik diskusi disini</p>
  <div class="alert alert-warning" role="alert">
    <p class="font-weight-bold">Aturan dalam Membuat dan Menjawab Pertanyaan di Forum Diskusi</p>
    <p class="text-bold">Untuk mempermudah kami dalam membantu permasalahan Anda, dimohon pastikan bahwa <b>Topik Diskusi</b> yang ingin Anda buat belum ada, agar menghindari duplikasi. Pastikan juga untuk menulis <b>uraian pertanyaan</b> sedetail mungkin.</p>
  </div>


  <form action="{{route('forum-create')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="font-weight-bold">Pertanyaan</label>
      <input name="judul" type="text" class="form-control">
      <small class="form-text text-muted">Isi dengan singkat Pertanyaan Anda</small>
    </div>
  
    <div class="form-group">
      <label class="font-weight-bold">Kategori</label>
      <select class="form-control" name="kategori" >
        @foreach ($kategoris as $item)
          <option value="{{$item->id}}">{{$item->nama}}</option>
        @endforeach
      </select>
      <small class="form-text text-muted">Pilih kategori yang sesuai dengan pertanyaan Anda</small>
    </div>
  
    <div class="form-group">
      <label class="font-weight-bold">Gambar</label>
      <input name="images" type="file" class="form-control-file" placeholder="Judul Topik">
      <small class="form-text text-muted">Sertakan gambar jika diperlukan</small>
    </div>
  
    <div class="form-group">
      <label class="font-weight-bold">Uraikan Pertanyaan</label>
      <textarea name="konten" id="editor" class="form-control" cols="80" rows="10" placeholder="Ketik Sesuatu.."></textarea>
      <small class="form-text text-muted">Uraikan Pertanyaan sedetail mungkin</small>
    </div>
  
    <div class="text-left">
      <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Buat Diskusi</button>
      <a class="btn btn-secondary" href="{{route('forum-index')}}">Batal</a>
    </div>
  </form>
</div>
@endsection