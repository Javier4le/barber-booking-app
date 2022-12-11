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
    <a class="nav-link " href="{{ route('appointments.index') }}">
        <i class="fas fa-clock text-info"></i> Citas
    </a>
</li>
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
