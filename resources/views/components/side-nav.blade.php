<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PerpusKu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ request()->path() == 'admin/dashboard' ? ' active' : ''}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item{{request()->path() == 'admin/users' ? ' active' : ''}}">
        <a class="nav-link" href="{{route('admin.users')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Daftar User</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Buku
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item{{request()->path() == 'admin/authors' ? ' active' : '' }}">
        <a class="nav-link collapsed" href="{{route('admin.authors')}}">
            <i class="fas fa-fw fa-pencil-alt"></i>
            <span>Authors</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item{{request()->path() == 'admin/books' ? ' active' : ''}}">
        <a class="nav-link collapsed" href="{{route('admin.books')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Books</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Peminjaman
    </div>

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
