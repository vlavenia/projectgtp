 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar" style="position: sticky; top: 0; z-index: 1000;">

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
             <span>Data Asset</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="/perolehan">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Pengadaan / Perolehan </span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menumutasi"
             aria-expanded="true" aria-controls="menumutasi">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Menu Mutasi</span>
         </a>
         <div id="menumutasi" class="collapse"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('mutasiMasuk') }}">Mutasi Masuk</a>
                 <a class="collapse-item" href="/mutasikeluar">Mutasi Keluar</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menukib"
             aria-expanded="true" aria-controls="menukib">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Menu KIB</span>
         </a>
         <div id="menukib" class="collapse"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Laporan KIB</h6>
                 <a class="collapse-item" href="{{ route('kibaExport') }}">KIB A</a>
                 <a class="collapse-item" href="{{ route('kibbExport') }}">KIB B</a>
                 <a class="collapse-item" href="{{ route('kibcExport') }}">KIB C</a>
                 <a class="collapse-item" href="/">KIB D</a>
                 <a class="collapse-item" href="/">KIB E</a>
                 <a class="collapse-item" href="/">KIB F</a>
                 <a class="collapse-item" href="/">KIB ATB</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="/kerusakan">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Kerusakan</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="/penghapusan">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>penghapusan</span></a>
     </li>

     {{-- <li class="nav-item">
         <a class="nav-link" href="/inventarisasi">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Inventarisasi</span></a>
     </li> --}}

     <li class="nav-item">
         <a class="nav-link" href="/sampah">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Sampah</span></a>
     </li>

     {{-- <li class="nav-item">
         <a class="nav-link" href="/profile">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Profile</span></a>
     </li> --}}

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>
