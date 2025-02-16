@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
</div>
<div class="col-lg-6">
    <form method="POST" action="{{ route('dashboard.peminjaman.store') }}">
    @csrf

    <div class="mb-3">
        <label for="id_user" class="form-label">ID Anggota</label>
       <select class="form-select" id="id_user" name="id_user" required>
            <option value="" disabled selected>Pilih Anggota</option>
           @foreach ($user as $u)
                @if ($u->id_role !== 1) 
                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->id }})</option>
                @endif
            @endforeach

        </select>
    </div>

    <div class="mb-3">
            <label for="id_buku" class="form-label">Judul Buku</label>
            <select class="form-select" id="id_buku" name="id_buku" required>
                <option value="" disabled selected>Pilih Buku</option>
                @foreach ($buku as $b)
                    <option value="{{ $b->id }}">{{ $b->judul }}</option>
                @endforeach
            </select>
        </div>

    <div class="mb-3">
        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
    </div>

 <input type="hidden" name="status" value="Belum dikembalikan">

    <button type="submit" class="btn btn-primary mb-2">Tambah Peminjaman</button>
</form>

</div>

@endsection