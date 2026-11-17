<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="#" class="brand-link">
      <span class="brand-text">Peminjaman Lab</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
       @if ($role == 'mahasiswa')
        @include('layout.sidebar-mahasiswa')
       @endif
       @if ($role == 'aslab')
        @include('layout.sidebar-aslab')
       @endif
       @if ($role == 'admin')
        @include('layout.sidebar-admin')
       @endif
      </ul>
    </nav>
    </div>
</aside>