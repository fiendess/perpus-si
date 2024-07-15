@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1> 
      </div>
      
      <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-data buku">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-lg-end">
                        <div class="card-desc">Buku</div>
                        <div class="card-count">{{ $bukuCount }}</div>
                </div>
            </div>
        </div>
      </div>

        <div class="col-lg-4">
            <div class="card-data kategori">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-lg-end">
                        <div class="card-desc">Kategori</div>
                        <div class="card-count">{{ $kategoriCount }}</div>
                </div>
            </div>
        </div>
      </div>

        <div class="col-lg-4">
            <div class="card-data user">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-lg-end">
                        <div class="card-desc">Anggota</div>
                        <div class="card-count">{{ $userCount }}</div>
                </div>
            </div>
        </div>
      </div>
@endsection