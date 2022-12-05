<!-- Heading -->
<h6 class="navbar-heading text-muted">
    @if (auth()->user()->hasRoles(['admin']))
        Gestión
    @else
        Menú
    @endif
</h6>

<ul class="navbar-nav">
    @if (auth()->user()->hasRoles(['admin']))
        <li class="nav-item  active ">
            <a class="nav-link  active " href="{{ url('/dashboard') }}">
                <i class="ni ni-tv-2 text-danger"></i> Panel de control
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link " href="./examples/icons.html">
                <i class="ni ni-calendar-grid-58 text-blue"></i> Citas
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/dashboard/clients') }}">
                <i class="ni ni-single-02 text-orange"></i> Clientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/dashboard/barbers') }}">
                <i class="ni ni-scissors text-yellow"></i> Barberos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/dashboard/services') }}">
                <i class="ni ni-briefcase-24 text-blue"></i> Servicios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard/locations') }}">
                <i class="ni ni-shop text-info"></i> Locales
            </a>
        </li>
    @elseif (auth()->user()->hasRoles(['barber']))
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="fas fa-clock text-info"></i> Mis citas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="ni ni-single-02 text-orange"></i> Mis clientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/dashboard/barber/schedules') }}">
                <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar horario
            </a>
        </li>
    @elseif (auth()->user()->hasRoles(['client']))
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar cita
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="fas fa-clock text-info"></i> Mis citas
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

</ul>

@if (auth()->user()->hasRoles(['admin']))
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
@endif
