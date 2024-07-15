@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm mx-auto">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $pinjam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td>{{ $pinjam->tanggal_pinjam }}</td>
                <td>{{ $pinjam->tanggal_kembali }}</td>
                <td>{{ $pinjam->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
