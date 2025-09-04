<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
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
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                Dashboard
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('menu.index') }}" class="menu-link">
                <!-- Bootstrap Icons CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

                <!-- Ikon garis tiga -->
                <i class="menu-icon tf-icons bi bi-list me-2"></i>
                Menu
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bi bi-clipboard-check-fill me-2"></i>
                Pesanan
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bi bi-currency-dollar me-2"></i>
                Pembayaran
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bi bi-bar-chart-fill me-2"></i>
                Laporan
            </a>
        </li>
    </ul>
</aside>
