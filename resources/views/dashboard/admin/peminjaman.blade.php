@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">peminjaman test</h1> 
      </div>
      <div class="table-responsive small">
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
           
            <tr>
              <td>asdasd</td>
              <td>asd</td>
          
              <td>
                <a href="/dashboard/" class="badge bg-warning"><span class="bi bi-pencil-square"> Edit</span></a>
                <a href="/dashboard/" class="badge bg-danger"><span class="bi bi-trash"> Delete</span></a>
            </tr>
           
            
           
          </tbody>
        </table>
      </div>
@endsection