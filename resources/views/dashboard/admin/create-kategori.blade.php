@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
</div>
<div class="col-lg-6">
    <form method="POST" action="{{ route('dashboard.kategori.store') }}">
        @csrf
      <div class="mb-2">
        <label for="nama_kategori" class="form-label">Nama Kategori Buku</label>
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
      </div>

        <button type="submit" class="btn btn-primary mb-3   ">Tambah Kategori</button>
        

    </form>
</div>

@endsection