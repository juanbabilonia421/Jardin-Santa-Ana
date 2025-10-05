<!-- UI Settings -->
<div class="fixed-plugin">
    <!-- Botón flotante -->
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"></i>
    </a>

    <!-- Tarjeta de Configuración -->
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mt-2 mb-0">Santa Ana</h5>
                <p class="text-sm text-muted">Opciones del panel</p>
            </div>
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <hr class="horizontal dark my-1">

        <div class="card-body pt-sm-3 pt-0">
            <!-- Colores Sidebar -->
            <div>
                <h6 class="mb-0">Colores del menú lateral</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>

            <!-- Tipo de menú -->
            <div class="mt-3">
                <h6 class="mb-0">Tipo de menú lateral</h6>
                <p class="text-sm">Elige entre 2 estilos diferentes.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparente</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">Blanco</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">Solo disponible en vista de escritorio.</p>

            <!-- Navbar fija -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar fija</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>

            <hr class="horizontal dark my-sm-4">
        </div>
    </div>
</div>
<!-- End of UI Settings -->
