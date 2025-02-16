    
 <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary vh-100 position-relative">

      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Dashboard Perpustakaan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            @if(Auth::user()->id_role == 1)
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
               <i class="bi bi-house"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('dashboard.admin.user') }}">
                 <i class="bi bi-people"></i>
                Daftar Anggota
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/buku">
                 <i class="bi bi-book"></i>
                Daftar Buku
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/kategori">
                 <i class="bi bi-list"></i>
                Kategori
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/peminjaman">
                 <i class="bi bi-file-earmark-diff"></i>
                Peminjaman
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/pengembalian">
                 <i class="bi bi-file-earmark-check"></i>
                Pengembalian
              </a>
            </li>
            @endif
          </ul>

          <ul class="nav flex-column">
          @if(Auth::user()->id_role == 0)
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard/user">
               <i class="bi bi-house"></i>
                Dashboard
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('dashboard.user.profil') }}">
                 <i class="bi bi-people"></i>
                Profile
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('dashboard.user.buku') }}">
                 <i class="bi bi-book"></i>
                Katalog Buku
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('dashboard.user.peminjaman') }}">
                 <i class="bi bi-cart"></i>
                Peminjaman
              </a>
            </li>
          </ul>
      
          @endif

          <hr class="my-3">

          <ul class="nav flex-column position-absolute bottom-0 start-0 w-100">
            <form action="/logout" method="post">
                @csrf
                <li>
                    <button type="submit" class="nav-link d-flex align-items-center gap-2 text-danger px-3 py-2">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </li>
            </form>
        </ul>

        </div>
      </div>
    </div>
