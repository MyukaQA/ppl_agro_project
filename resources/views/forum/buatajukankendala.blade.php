@extends('forum.app')
@section('content')
<div class="container py-5">
  <h4>Buat Topik Diskusi</h4>
  <p class="text-dark">Anda dapat membuat topik diskusi disini</p>
  <div class="alert alert-warning" role="alert">
    <p class="font-weight-bold">Aturan dalam Membuat Solusi Kendala Anda di Fitur ini</p>
    <p class="text-bold">Pastikan solusi dari kendala Anda sudah benar-benar terselesaikan. Manfaatkan fitur <a href="" class="alert-link">Forum Diskusi</a> untuk menemukan solusi dari permasalah Anda. Buat solusi Anda agar bisa bermanfaat bagi User lain.</p>
    <p class="text-bold">Admin akan memverifikasi solusi Anda dalam <b>waktu 3-4 hari kerja (tidak termasuk hari lbur)</b>, Anda dapat melihat solusi Anda di tabel <b>Data Pengajuan Kendala</b> yang ada di fitur <b>Data Kendala</b> </p>
  </div>


  <form action="{{route('ajukan-kendala')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{-- untuk nyimpan id forum --}}
    <input type="text" name="forum_id" class="form-control d-none" value="{{$frm->id}}">

    <div class="form-group">
      <label class="font-weight-bold">Judul</label>
      <input name="judul" type="text" class="form-control">
      <small class="form-text text-muted">Isi dengan singkat Judul Solusi Anda</small>
    </div>

    <div class="form-group">
      <label class="font-weight-bold">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" cols="80" rows="7" placeholder="Ketik Sesuatu.."></textarea>
      <small class="form-text text-muted">Deskripsi permasalahan Anda</small>
    </div>

    <div class="form-group">
      <label class="font-weight-bold">Solusi</label>
      <textarea name="solusi" class="form-control" cols="80" rows="7" placeholder="Ketik Sesuatu.."></textarea>
      <small class="form-text text-muted">Tulis solusi dari permasalahan Anda, lebih detail lebih baik</small>
    </div>
  
    <div class="text-left">
      <a data-toggle="modal" data-target="#create" class="btn btn-primary text-white"><i class="fa fa-floppy-o" aria-hidden="true"></i> Buat Ajukan Kendala</a>
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