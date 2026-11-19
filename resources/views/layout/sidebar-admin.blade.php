 <li class="nav-item">
    <a href="{{ route('admin.akun') }}" class="nav-link {{ request()->routeIs('admin.akun') ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>Akun</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.riwayat') }}" class="nav-link {{ request()->routeIs('admin.riwayat') ? 'active' : '' }}">
        <i class="nav-icon bi bi-clock-history"></i>
        <p>Riwayat</p>
    </a>
</li>
<li class="nav-item">
<a href="{{ route('admin.statuslab') }}" class="nav-link {{ request()->routeIs('admin.statuslab') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack-fill"></i>
        <p>Status Lab</p>
    </a>
</li>
<li class="nav-item">
<a href="{{ route('admin.notifikasi') }}" class="nav-link {{ request()->routeIs('admin.notifikasi') ? 'active' : '' }}">
        <i class="nav-icon bi bi-bell"></i>
        <p>Notifikasi</p>
    </a>
</li>