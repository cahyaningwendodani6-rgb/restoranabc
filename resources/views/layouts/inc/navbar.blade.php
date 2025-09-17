<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0 d-flex align-items-center gap-2"
                    href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ auth()->check() && auth()->user()->profile_photo
                            ? asset(auth()->user()->profile_photo)
                            : asset('img/avatars/org.jpg') }}"
                            alt="Foto Profil" class="rounded-circle" />
                    </div>
                    <span class="fw-medium">{{ auth()->user()->name ?? 'Guest' }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    @auth
                        <li>
                            <a class="dropdown-item" href="{{ route('ubah-profil') }}">
                                <i class="ti ti-user me-3 ti-md"></i>
                                <span class="align-middle">Ubah Profil</span>
                            </a>
                        </li>
                        <li>
                            <div class="d-grid px-2 pt-2 pb-1">
                                <a class="btn btn-sm btn-danger d-flex align-items-center justify-content-center"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    href="#">
                                    <small class="align-middle">Logout</small>
                                    <i class="ti ti-logout ms-2 ti-14px"></i>
                                </a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="ti ti-login me-3 ti-md"></i>
                                <span class="align-middle">Login</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
            aria-label="Search..." />
        <i class="ti ti-x search-toggler cursor-pointer"></i>
    </div>
</nav>
