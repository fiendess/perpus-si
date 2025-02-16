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
            </tr>
            @endforeach
            
           
          </tbody>
        </table>
      </div>
@endsection