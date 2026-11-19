<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="#" class="brand-link">
      <span class="brand-text">Peminjaman Lab</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
    @includeIf('layout.sidebar-'.strtolower(auth()->user()->role))
      </ul>
    </nav>
    </div>
</aside>