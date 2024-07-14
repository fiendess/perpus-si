@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
</div>
<div class="col-lg-6">
     
    <form method="POST" action="{{ route('dashboard.buku.update', $buku->id) }}">
        @csrf
        @method('PUT')
      <div class="mb-2">
        <label for="judul" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
      </div>
        <div class="mb-2">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}">
        </div>
        <div class="mb-2">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}">
        </div>
        <div class="mb-2">
            <label for="tahun_terbit" class="form-label
            ">Tahun Terbit</label>
            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}">
        </div>
        <div class="mb-2">
            <label for="id_kategori" class="form-label
            ">Kategori Buku</label>
             <select class="form-control" id="id_kategori" name="id_kategori" required>
                @foreach($kategori_buku as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == $buku->id_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        <div class="mb-2">
            <label for="status" class="form-label
            ">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $buku->status }}">
        </div> 
        </div>
        <div class="mb-2">
            <label for="jumlah_buku" class="form-label
            ">Jumlah Buku</label>
            <input type="text" class="form-control" id="jumlah_buku" name="jumlah_buku"  value="{{ $buku->jumlah_buku }}" >
        </div>

        <button type="submit" class="btn btn-primary mb-3   ">Update Buku</button>
        

    </form>
</div>

@endsection