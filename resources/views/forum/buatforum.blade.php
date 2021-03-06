@extends('forum.app')
@section('content')
<div class="container py-5">
  <h4>Buat Topik Diskusi</h4>
  <p class="text-dark">Anda dapat membuat topik diskusi disini</p>
  <div class="alert alert-warning" role="alert">
    <p class="font-weight-bold">Aturan dalam Membuat dan Menjawab Pertanyaan di Forum Diskusi</p>
    <p class="text-bold">Pembuatan topik pada forum <b>bertujuan</b> untuk mendiskusikan kendala apa saja yang dialami oleh para petani hidroponik (sesuai kategori yang ditentukan), pastikan data yang Anda masukkan merupakan <b>data real</b> dan tidak mengada - ada.</p>
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
      <a data-toggle="modal" data-target="#create" class="btn btn-primary text-white"><i class="fa fa-floppy-o" aria-hidden="true"></i> Buat Diskusi</a>
      <a class="btn btn-secondary" href="{{route('forum-index')}}">Batal</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="alert alert-warning" role="alert">
              Tekan <b>Buat</b> jika sudah yakin dengan isinya
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Buat</button>
          </div>
        </div>
      </div>
    </div>


  </form>
</div>
@endsection