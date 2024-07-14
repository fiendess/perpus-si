@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
</div>
<div class="col-lg-6">
    <form method="POST" action="{{ route('dashboard.peminjaman.store') }}">
    @csrf

    <div class="mb-3">
        <label for="id_user" class="form-label">ID User</label>
        <input type="text" class="form-control" id="id_user" name="id_user" required>
    </div>

    <div class="mb-3">
        <label for="id_buku" class="form-label">ID Buku</label>
        <input type="text" class="form-control" id="id_buku" name="id_buku" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
    </div>

    <div class="mb-3">
            <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

@endsection