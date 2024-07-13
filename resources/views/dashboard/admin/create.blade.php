@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah buku</h1> 
</div>
<div class="col-lg-8">
    <form method="post" action="{{ route('dashboard.buku.store') }}">
        @csrf
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="judul" name="judul">
      </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit">
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label
            ">Tahun Terbit</label>
            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
        </div>
        <div class="mb-3">
            <label for="jumlah_buku" class="form-label
            ">Jumlah Buku</label>
            <input type="text" class="form-control" id="jumlah_buku" name="jumlah_buku">
        </div>

    </form>
</div>

@endsection