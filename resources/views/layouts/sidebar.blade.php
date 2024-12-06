<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            {{-- <img src="public\admin_assets\img\logo.png" alt=""> --}}
        </div>
        <div class="sidebar-brand-text mx-3">SIMASET GTP DIY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('assets') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Assets</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/perolehan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Perolehan Asset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/mutasiMasuk">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Mutasi Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/mutasikeluar">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Mutasi Keluar</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/kerusakan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kerusakan Aset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/penghapusan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>penghapusan Aset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/sampah">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Sampah</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/profile">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
