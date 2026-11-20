<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="#" class="brand-link">
      <span class="brand-text">Peminjaman Lab</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
    @if (auth()->user()->role === "Mahasiswa")
      @include('layout.sidebar-mahasiswa')
    @elseif(auth()->user()->role === "Asisten Lab")
      @include('layout.sidebar-aslab')
    @elseif(auth()->user()->role === 'Admin')
      @include('layout.sidebar-admin')
    @endif
      </ul>
    </nav>
    </div>
</aside>