<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-header">Master Data</li>
            <li class="nav-item">
                <a href="{{ url('/mobil') }}" class="nav-link {{ ($activeMenu == 'mobil') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Data Mobil</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/pelanggan') }}" class="nav-link {{ ($activeMenu == 'pelanggan') ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data Pelanggan</p>
                </a>
            </li>

            <li class="nav-header">Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{ ($activeMenu == 'penjualan') ? 'active' : '' }}">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Penjualan</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
