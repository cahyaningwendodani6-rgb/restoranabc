<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('landing') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/logo-restoran.jpg') }}" alt="Logo Resto ABC" height="40">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Resto ABC </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                Dashboard
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('menu.*') ? 'active' : '' }}">
            <a href="{{ route('menu.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-list me-2"></i>
                Menu
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('pesanan.*') || request()->is('pesanan*') ? 'active' : '' }}">
            <a href="{{ route('pesanan.index') }}" class="menu-link d-flex align-items-center justify-content-between">
                <span>
                    <i class="menu-icon tf-icons bi bi-clipboard-check-fill me-2"></i>
                    Pesanan
                </span>
                <span id="notif-pesanan" class="badge bg-danger rounded-pill" style="display:none;">0</span>
            </a>
        </li>


        <li
            class="menu-item {{ request()->routeIs('pembayaran.*') || request()->routeIs('admin.form-pembayaran.*') ? 'active' : '' }}">
            <a href="{{ route('admin.form-pembayaran.index') }}"
                class="menu-link d-flex align-items-center justify-content-between">
                <span>
                    <i class="menu-icon tf-icons bi bi-currency-dollar me-2"></i>
                    Pembayaran
                </span>
                <span id="notif-pembayaran" class="badge bg-warning text-dark rounded-pill"
                    style="display:none;">0</span>
            </a>
        </li>


        <li class="menu-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <a href="{{ route('laporan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-bar-chart-fill me-2"></i>
                Laporan
            </a>
        </li>


        <li class="menu-item {{ request()->routeIs('admin.pelanggan.*') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.pelanggan.index') }}">
                <i class="menu-icon tf-icons fa fa-users"></i> Pelanggan
            </a>
        </li>

    </ul>
</aside>
