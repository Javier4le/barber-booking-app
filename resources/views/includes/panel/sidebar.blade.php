<!-- Heading -->
<h6 class="navbar-heading text-muted">
    @if (auth()->user()->hasRoles(['admin']))
        Gestión
    @else
        Menú
    @endif
</h6>

<ul class="navbar-nav">

    @include('includes.panel.sidebar.' . auth()->user()->role->name)

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
            <a class="nav-link" href="{{ url('dashboard/reports/appointments/line') }}">
                <i class="ni ni-calendar-grid-58 text-blue"></i> Citas
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard/reports/barbers/column') }}">
                <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño de Barberos
            </a>
        </li>
    </ul>
@endif
