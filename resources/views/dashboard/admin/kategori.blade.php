@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
      </div>
      <div class="table-responsive small">
         <a class="btn btn-primary mb-3" href="/dashboard/kategori/create" role="button"><i class="bi bi-plus"></i>Tambah Kategori</a>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif
        <div class="col-lg-6">
        <table class="table table-striped table-bordered table-sm mx-auto">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kategori as $k)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $k->nama_kategori }}</td>
              <td>
                <a class="btn btn-warning btn-sm" href="" role="button"><i class="bi bi-pencil-square"></i>Edit</a>
                <form action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin ingin menghapus buku ini?')"><i class="bi bi-trash"></i>Delete</button>
                </form>
            </tr>
            @endforeach
           
            
           
          </tbody>
        </table>
        </div>
      </div>
@endsection