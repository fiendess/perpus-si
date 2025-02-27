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
        
         <div class="row justify-content-between align-items-center mb-3">
         
        <div class="col-auto">
        <a class="btn btn-primary" href="/dashboard/buku/create" role="button"><i class="bi bi-plus"></i>Tambah Buku</a>
        

        </div>
          <div class="col-lg-6">
              <form action="/dashboard/buku/search" method="GET">
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
              <th scope="col">No</th>
              <th scope="col">Judul Buku</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Tahun Terbit</th>
              <th scope="col">Jumlah buku</th>
              <th scope="col">Kategori</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($buku as $b)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $b->judul }}</td>
              <td>{{ $b->pengarang }}</td>
              <td>{{ $b->penerbit }}</td>
              <td>{{ $b->tahun_terbit }}</td>
              <td>{{ $b->jumlah_buku }}</td>
              <td>{{ $b->kategori_buku->nama_kategori }}</td>
              <td>{{ $b->status }}</td>
              <td>
                 <a class="btn btn-warning btn-sm" href="{{ route('dashboard.buku.edit-buku', $b->id) }}" role="button"><i class="bi bi-pencil-square"></i>Edit</a>
                <form action="{{ route('dashboard.buku.destroy', $b->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin ingin menghapus buku ini?')"><i class="bi bi-trash"></i>Delete</button>
                </form>
            </td>

            </tr>
            @endforeach
            
           
          </tbody>
        </table>
      </div>
@endsection