<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Bienvenido {{ auth()->user()->first_name }}</h6>
    </div>
    <a href="{{ url('/') }}" class="dropdown-item">
        <i class="fas fa-home"></i>
        <span>Inicio</span>
    </a>

    <a href="{{ route('profile.index') }}" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi perfil</span>
    </a>
    <!-- <a href="#" class="dropdown-item">
        <i class="ni ni-settings-gear-65"></i>
        <span>Configuración</span>
    </a>
    <a href="#" class="dropdown-item">
        <i class="ni ni-calendar-grid-58"></i>
        <span>Mis citas</span>
    </a>
    <a href="#" class="dropdown-item">
        <i class="ni ni-support-16"></i>
        <span>Ayuda</span>
    </a> -->
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ni ni-user-run"></i>
        <span>Cerrar sesión</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>
</div>
