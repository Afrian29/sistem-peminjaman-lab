<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.10.0/dist/css/adminlte.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body, html{
            height: 100%;
            margin: 0;
            overflow-x: hidden;
            font-family: "Lato", sans-serif;
        }
        .app-sidebar[data-bs-theme="dark"]{
            background-color: #001F3F !important;
        }
        .sidebar-wrapper .nav-item .nav-link:hover{
            background-color: cornflowerblue !important;
            color: #001F3F !important;
        }
        .nav-link.active{
            background-color: rgba(0, 110, 255, 0.44) !important;
            color: white !important;
            font-weight:bold !important;
        }
        .sidebar-brand{
            display: flex !important;
            flex: 0 0 auto!important;
            align-items: center!important;
            justify-content: left!important;
        }
        .sidebar-wrapper{
            padding-right: ;
        }
        .brand-text{
            font-weight: 400 !important;
        }
        .avatar { 
            width: 35px; 
            height: 35px; 
            border-radius: 50%; 
            background: #001F3F; 
            color: #fff; display: 
            grid; place-items: center; 
            font-weight: bold; }
    </style>
  <title>Laboratiorium JTIF UNG</title>

</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="app-wrapper">

    <!-- Header -->
    <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                @yield('header')
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
              <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
              <div style="min-width: 80px;">
                <div class="fw-bold text-dark">{{ auth()->user()->name }}</div>
                <small class="text-secondary">{{ session('active_role') }}</small>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow">
              @foreach (collect([auth()->user()->role])->merge(auth()->user()->roles->pluck('nama_role'))->unique() as $r)
                <li>
                  <form action="{{ route('role.switch') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="{{ $r }}">
                    <button class="dropdown-item {{ session('active_role') === $r ? 'active' : '' }}">{{ $r }}</button>
                  </form>
                </li>
              @endforeach
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="dropdown-item text-danger">Keluar</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Sidebar -->
    @include('layout.sidebar')


    <!-- Main content -->
    @hasSection('custom-content')
      @yield('custom-content')
    @else
      @include('layout.content')
    @endif

  </div>

    <!-- <script src="https://jsdelivr.net"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.10.0/dist/js/adminlte.min.js"></script>
    
</body>
</html>