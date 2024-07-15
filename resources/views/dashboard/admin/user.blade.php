@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1> 
      </div>
      <div class="table-responsive small">
        
        <table class="table table-striped table-bordered table-sm mx-auto">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">ID Anggota</th>
              <th scope="col">Username</th>
              <th scope="col">Alamat</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $u)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $u->id }}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->alamat }}</td>
              <td>{{ $u->no_telp }}</td>
              <td>{{ $u->roles->nama }}</td>
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
@endsection