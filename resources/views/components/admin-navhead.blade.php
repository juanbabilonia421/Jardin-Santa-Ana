<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-4 py-2 shadow-sm border-bottom bg-white" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid">

    <!-- Breadcrumb -->
    @yield('breadcrumb')

    <!-- Collapse -->
    <div class="collapse navbar-collapse mt-2 mt-sm-0 me-md-0" id="navbar">
      
      <!-- Search Bar -->
      <div class="ms-auto pe-md-3 d-flex align-items-center">
        <div class="input-group input-group-sm">
          <span class="input-group-text bg-light border-0">
            <i class="fas fa-search text-muted"></i>
          </span>
          <input type="text" class="form-control border-0 shadow-none" placeholder="Buscar...">
        </div>
      </div>
      <!-- End Search Bar -->

      <!-- Right Menu -->
      <ul class="navbar-nav ms-3">

        <!-- User Dropdown -->
        <li class="nav-item dropdown d-flex align-items-center">
          <a href="#" id="dropdownMenuButton" class="nav-link dropdown-toggle d-flex align-items-center fw-bold text-dark" 
             data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user-circle me-2"></i>
            @auth
              <span>{{ Auth::user()->name }}</span>
            @else
              <span>Iniciar Sesión</span>
            @endauth
          </a>

          <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="dropdownMenuButton">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile.index') }}">
                <i class="fa-solid fa-user me-2 text-primary"></i> Perfil
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket me-2 text-danger"></i> Cerrar sesión
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        <!-- End User Dropdown -->

      </ul>
      <!-- End Right Menu -->

    </div>
    <!-- End Collapse -->

  </div>
</nav>
<!-- End Navbar -->
