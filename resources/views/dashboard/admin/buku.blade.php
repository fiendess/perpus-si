@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
      </div>
      <div class="table-responsive small">
        <a href="/dashboard/buku/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg">Tambah Buku Baru</i></a>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif
        
        <table class="table table-striped table-sm">
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
                <a href="{{ route('dashboard.buku.edit-buku', $b->id) }}" class="badge bg-warning"><span class="bi bi-pencil-square"> Edit</span></a>
                <form action="{{ route('dashboard.buku.destroy', $b->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus buku ini?')"><span class="bi bi-trash"> Delete</span></button>
                </form>
            </td>

            </tr>
            @endforeach
            
           
          </tbody>
        </table>
      </div>
@endsection