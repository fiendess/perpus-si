@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
      </div>
      <div class="table-responsive small">
        <a href="/dashboard/kategori/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg">Tambah Kategori Baru</i></a>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif
        <div class="col-lg-6">
        <table class="table table-striped table-sm">
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
                <a href="/dashboard/" class="badge bg-warning"><span class="bi bi-pencil-square"> Edit</span></a>
                <a href="/dashboard/" class="badge bg-danger"><span class="bi bi-trash"> Delete</span></a>
            </tr>
            @endforeach
           
            
           
          </tbody>
        </table>
        </div>
      </div>
@endsection