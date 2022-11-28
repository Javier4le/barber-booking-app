<!-- Heading -->
<h6 class="navbar-heading text-muted">Gestión</h6>

<ul class="navbar-nav">
    <li class="nav-item  active ">
        <a class="nav-link  active " href="./index.html">
            <i class="ni ni-tv-2 text-danger"></i> Panel de control
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link " href="./examples/icons.html">
            <i class="ni ni-calendar-grid-58 text-blue"></i> Citas
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link " href="./examples/maps.html">
            <i class="ni ni-single-02 text-orange"></i> Clientes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="./examples/profile.html">
            <i class="ni ni-scissors text-yellow"></i> Barberos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="./examples/tables.html">
            <i class="ni ni-briefcase-24 text-blue"></i> Servicios
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./examples/login.html">
            <i class="ni ni-shop text-info"></i> Locales
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-calendar-grid-58 text-blue"></i> Citas
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño de Barberos
        </a>
    </li>
</ul>
