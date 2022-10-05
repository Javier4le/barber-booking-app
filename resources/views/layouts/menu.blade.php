<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    {{-- <a href="{{ route('users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a> --}}
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a>
    {{-- <a class="nav-link" href="{{ URL::to('costumers') }}">{{ __('Costumers') }}</a> --}}
</li>
