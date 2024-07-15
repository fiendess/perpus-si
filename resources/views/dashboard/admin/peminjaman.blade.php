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
            <a class="btn btn-primary" href="/dashboard/peminjaman/create" role="button"><i class="bi bi-plus"></i>Tambah Peminjaman</a>
        </div>
        <div class="col-lg-6">
            <form action="/dashboard/peminjaman/search" method="GET">
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
              <th scope="col">ID Anggota</th>
              <th scope="col">Nama</th>
              <th scope="col">ID Buku</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Tanggal Pinjam</th>
              <th scope="col">Tanggal Kembali</th>
              <th scope="col">Tanggal Jatuh Tempo</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($peminjaman as $pinjam)
            <tr>
                <td>{{ $pinjam->id_user }}</td>
                <td>{{ $pinjam->user->name }}</td>
                <td>{{ $pinjam->id_buku }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td>{{ $pinjam->tanggal_pinjam }}</td>
                <td>{{ $pinjam->tanggal_kembali }}</td>
                <td>{{ $pinjam->tanggal_jatuh_tempo }}</td>
                <td class="{{ $pinjam->status == 'Belum dikembalikan' ? 'text-bg-danger' : 'text-bg-success' }}">{{ $pinjam->status }}</td>

            </tr>
            @endforeach
            
           
          </tbody>
        </table>
      </div>
@endsection