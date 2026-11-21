<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="#" class="brand-link">
      <span class="brand-text">Peminjaman Lab</span>
    </a>
  </div>
  <div class="sidebar-wrapper d-flex flex-column h-100">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
    @if (session('active_role') === "Mahasiswa")
      @include('layout.sidebar-mahasiswa')
    @elseif (session('active_role') === "Asisten Lab")
      @include('layout.sidebar-aslab')
    @elseif (session('active_role') === 'Admin')
      @include('layout.sidebar-admin')
    @endif
      </ul>
    </nav>
    <div class="mt-auto">
      <ul class="nav sidebar-menu flex-column">
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link w-100 text-start border-0 ">
              <i class="nav-icon bi bi-box-arrow-right"></i>
              <p>Keluar</p>
            </button>
          </form>
        </li>
      </ul>
    </div>
    </div>
</aside>