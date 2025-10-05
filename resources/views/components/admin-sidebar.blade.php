<!-- Side-Bar -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" 
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/img/header.png') }}" class="navbar-brand-img h-100" alt="logo_santa_ana">
            <span class="ms-1 font-weight-bold">Santa Ana - Panel</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin') ? 'active' : '') }}" href="{{ route('admin.dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" xmlns="http://www.w3.org/2000/svg">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6" d="M46.71,10.74 L40.84,0.95 C40.49,0.36 39.85,0 39.16,0 H7.83 C7.14,0 6.50,0.36 6.15,0.95 L0.28,10.74 C0.09,11.04 0,11.39 0,11.75 C-0.00,16.06 3.48,19.57 7.80,19.58 C9.75,19.58 11.61,18.87 13.05,17.57 C16.01,20.25 20.52,20.25 23.49,17.57 C26.46,20.26 30.97,20.26 33.94,17.57 C36.24,19.64 39.54,20.17 42.36,18.91 C45.19,17.64 47.00,14.84 47.00,11.75 C47.00,11.39 46.90,11.04 46.71,10.74 Z"></path>
                                            <path class="color-background" d="M39.19,22.49 C37.37,22.49 35.58,22.01 33.95,21.09 C31.14,22.68 27.92,22.93 24.98,21.79 C20.69,22.68 17.47,22.93 14.53,21.79 C11.42,22.01 9.63,22.49 7.81,22.49 C7.16,22.48 6.51,22.41 5.87,22.29 V44.72 C5.87,45.94 6.75,46.94 7.83,46.94 H19.58 V33.60 H27.41 V46.94 H39.16 C40.24,46.94 41.12,45.94 41.12,44.72 V22.28 C40.48,22.41 39.84,22.48 39.19,22.49 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>

            <!-- Usuarios -->
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/users','admin/users/*') ? 'active' : '') }}" href="{{ route('admin.users.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="24px" height="24px" xmlns="http://www.w3.org/2000/svg" fill="#030D45" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Usuarios</span>
                </a>
            </li>

            <!-- Roles -->
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/roles','admin/roles/*') ? 'active' : '') }}" href="{{ route('admin.roles.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-shield text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>

            <!-- Permisos -->
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/permissions','admin/permissions/*') ? 'active' : '') }}" href="{{ route('admin.permissions.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-key text-warning"></i>
                    </div>
                    <span class="nav-link-text ms-1">Permisos</span>
                </a>
            </li>

            <!-- Sección -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Gestión del sistema</h6>
            </li>

            <!-- Ventas -->
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('admin/ventas','admin/ventas/*') ? 'active' : '') }}" href="{{ route('admin.ventas.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-cart text-success"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ventas</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
<!-- End of Side-Bar -->
