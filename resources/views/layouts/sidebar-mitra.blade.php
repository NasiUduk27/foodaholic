<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="{{ url('/mitra/home') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/mitra/pesanan') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
                Pesanan
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/mitra/produk') }}" class="nav-link">
            <i class="nav-icon fas fa-utensils"></i>
            <p>
                Produk
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/mitra/riwayat-pesanan') }}" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
                Riwayat Pemesanan
            </p>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a href="{{ url('/profile') }}" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Laporan
            </p>
        </a>
    </li> -->
</ul>