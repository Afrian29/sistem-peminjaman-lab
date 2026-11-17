 <li class="nav-item">
    <a href="{{ route('akun-admin') }}" class="nav-link {{ request()->routeIs('akun-admin') ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>Akun</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('riwayat-admin') }}" class="nav-link {{ request()->routeIs('riwayat-admin') ? 'active' : '' }}">
        <i class="nav-icon bi bi-clock-history"></i>
        <p>Riwayat</p>
    </a>
</li>
<li class="nav-item">
<a href="{{ route('statuslab-admin') }}" class="nav-link {{ request()->routeIs('statuslab-admin') ? 'active' : '' }}">
        <i class="nav-icon bi bi-hdd-stack-fill"></i>
        <p>Status Lab</p>
    </a>
</li>
<li class="nav-item">
<a href="{{ route('notifikasi-admin') }}" class="nav-link {{ request()->routeIs('nofitikasi-admin') ? 'active' : '' }}">
        <i class="nav-icon bi bi-bell"></i>
        <p>Notifikasi</p>
    </a>
</li>