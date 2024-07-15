@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="col-lg-6">
    <form method="POST" action="{{ route('dashboard.pengembalian.store') }}">
        @csrf
        <div class="mb-3">
            <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
            <select class="form-select" id="id_peminjaman" name="id_peminjaman" required>
                <option value="" disabled selected>Pilih Peminjaman</option>
               @foreach ($peminjaman as $p)
                    <option value="{{ $p->id }}">{{ $p->user->name }} - {{ $p->buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pengembalian</button>
    </form>
</div>
@endsection
