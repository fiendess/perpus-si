    
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary vh-100">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Dashboard Perpustakaan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
               <i class="bi bi-house"></i>
                Dashboard
              </a>
            </li>
            @if(Auth::user()->id_role == 1)
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('dashboard.admin.user') }}">
                 <i class="bi bi-people"></i>
                Daftar User
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
                 <i class="bi bi-cart"></i>
                Peminjaman
              </a>
            </li>
            @endif
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <form action="/logout" method="post">
            @csrf
            
            <li>
                <button type="submit" class="nav-link d-flex align-items-center gap-2" href="#">Logout</button>
            </li>
          </form>
          </ul>
        </div>
      </div>
    </div>
