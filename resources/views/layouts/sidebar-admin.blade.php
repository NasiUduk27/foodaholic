<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="{{ url('/admin/home') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/mitra') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Mitra
            </p>
        </a>
    <li class="nav-item">
        <a href="{{ url('/admin/transaksi') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Transaksi
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/admin/user') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Pengguna
            </p>
        </a>
</ul>