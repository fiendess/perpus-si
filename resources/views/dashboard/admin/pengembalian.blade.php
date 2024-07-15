@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

 <div class="table-responsive small">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif
        <!-- error -->
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row justify-content-between align-items-center mb-3">
        <div class="col-auto">
            <a class="btn btn-primary" href="/dashboard/pengembalian/create" role="button"><i class="bi bi-plus"></i>Tambah Pengembalian</a>
        </div>
        <div class="col-lg-6">
            <form action="/dashboard/pengembalian/search" method="GET">
                <div class="input-group">
                      <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
                      <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                  </div>
            </form>
        </div>
    </div>

    <table class="table table-striped table-bordered table-sm mx-auto">
        <thead>
            <tr>
              <th scope="col">ID Peminjaman</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
              <th scope="col">Tanggal Pengembalian</th>
              <th scope="col">Denda</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pengembalian as $pengembalian)
            <tr>
                <td>{{ $pengembalian->id_peminjaman }}</td>
                <td>{{ $pengembalian->peminjaman->user->name }}</td>
                <td>{{ $pengembalian->peminjaman->buku->judul }}</td>
                <td>{{ $pengembalian->peminjaman->tanggal_pinjam }}</td>
                <td>{{ $pengembalian->tanggal_pengembalian }}</td>
                <td>{{ $pengembalian->denda }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
