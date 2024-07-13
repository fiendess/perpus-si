@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar User</h1> 
      </div>
      <div class="table-responsive small">
        <a href="/dashboard/buku/create" class="btn btn-primary mb-3"><i class="bi bi-plus-lg">Tambah Admin Baru</i></a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Alamat</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Status</th>
              <th scope="col">Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $u)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->alamat }}</td>
              <td>{{ $u->no_telp }}</td>
              <td>{{ $u->status }}</td>
              <td>{{ $u->role }}</td>
              <td>
                <a href="/dashboard/" class="badge bg-warning"><span class="bi bi-pencil-square"> Edit</span></a>
                <a href="/dashboard/" class="badge bg-danger"><span class="bi bi-trash"> Delete</span></a>
            </tr>
            @endforeach
            
           
          </tbody>
        </table>
      </div>
@endsection