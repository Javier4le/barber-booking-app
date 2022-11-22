@extends('layouts/blankLayout' )

@section('vendor-script')
<script src="{{asset('assets/vendor/js/dropdown-hover.js')}}"></script>
<script src="{{asset('assets/vendor/js/mega-dropdown.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/home/ui-navbar.js')}}"></script>
@endsection

@section('title', 'Home')

@section('content')


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <a class="nav-item nav-link px-0 me-xl-4 d-xl-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bx bx-menu bx-sm"></i>
    </a>



    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <!-- <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy" />
      </a> -->
      <a class="navbar-brand mt-2 mt-lg-0" href="/">
        <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
      </a>


      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="true" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Barberos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Locales</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->



    <!-- Right elements -->
    <div class="d-flex align-items-center">

      <!-- Style Switcher -->
      <a class="text-reset me-3 style-switcher-toggle hide-arrow" href="javascript:void(0);">
        <i class='bx bx-sm'></i>
      </a>
      <!--/ Style Switcher -->

      <!-- Toggler Login and Register -->
      @if (!Auth::check())
      <button data-bs-toggle="collapse" data-bs-target="#navbarRightNoAuth" aria-controls="navbarRightNoAuth" class="text-reset btn shadow-0 p-0 me-3 d-block d-xxl-none" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars fa-ellipsis"></i>
      </button>
      @endif
      <!--/ Toggler Login and Register -->


      @if (Auth::check())

      <!-- Notifications -->
      <!-- <div class="dropdown">
        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div> -->
      <!--/ Notifications -->


      <!-- Dashboard -->
      <a type="button" class="text-reset me-3 hide-arrow d-flex flex-nowrap" href="{{ route('dashboard') }}">
        <i class="bx bx-grid-horizontal bx-sm" aria-hidden="true"></i>
        <span class="d-none d-sm-block align-middle">Dashboard</span>
      </a>
      <!--/ Dashboard -->


      <!-- Avatar -->
      <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-center hide-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" tabindex="0">
          <div class="avatar avatar-online">
            <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/avatars/1.png') }}" alt class="rounded-circle">
          </div>
        </a>

        <ul class="dropdown-menu dropdown-menu-end" style="z-index: 9; position: absolute" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0);' }}">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('assets/img/avatars/1.png') }}" alt class="rounded-circle">
                  </div>
                </div>

                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">
                    @if (Auth::check())
                    {{ Auth::user()->name }}
                    @else
                    John Doe
                    @endif
                  </span>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li>

          <li>
            <div class="dropdown-divider"></div>
          </li>

          <li>
            <a class="dropdown-item" href="{{ Route::has('profile.show') ? route('profile.show') : 'javascript:void(0);' }}">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li>

          @if (Auth::check() && Laravel\Jetstream\Jetstream::hasApiFeatures())
          <li>
            <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
              <i class='bx bx-key me-2'></i>
              <span class="align-middle">API Tokens</span>
            </a>
          </li>
          @endif

          @if (Auth::User() && Laravel\Jetstream\Jetstream::hasTeamFeatures())
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <h6 class="dropdown-header">Manage Team</h6>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{ Auth::user() ? route('teams.show', Auth::user()->currentTeam->id) : 'javascript:void(0)' }}">
              <i class='bx bx-cog me-2'></i>
              <span class="align-middle">Team Settings</span>
            </a>
          </li>

          @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
          <li>
            <a class="dropdown-item" href="{{ route('teams.create') }}">
              <i class='bx bx-user me-2'></i>
              <span class="align-middle">Create New Team</span>
            </a>
          </li>
          @endcan

          <li>
            <div class="dropdown-divider"></div>
          </li>
          <lI>
            <h6 class="dropdown-header">Switch Teams</h6>
          </lI>
          <li>
            <div class="dropdown-divider"></div>
          </li>

          @if (Auth::user())
          @foreach (Auth::user()->allTeams() as $team)
          {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want to use jetstream. --}}
          <x-jet-switchable-team :team="$team" />
          @endforeach
          @endif

          @endif
          <li>
            <div class="dropdown-divider"></div>
          </li>

          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class='bx bx-power-off me-2'></i>
              <span class="align-middle">Logout</span>
            </a>
          </li>
          <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
          </form>
        </ul>
      </div>

      <!-- No logueado -->
      @else
      <!-- <button data-bs-toggle="collapse" data-bs-target="#navbarRightNoAuth" aria-controls="navbarRightNoAuth" class="btn shadow-0 p-0 me-3 d-block d-xxl-none" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bars fa-ellipsis"></i>
    </button> -->


      <div class="collapse navbar-collapse" id="navbarRightNoAuth">
        <div class="me-auto d-flex align-items-center gap-2">
          <a type="button" class="btn btn-primary" href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
            Iniciar sesión
          </a>
          <a type="button" class="btn btn-outline-primary" href="{{ Route::has('register') ? route('register') : 'javascript:void(0)' }}">
            Registrarse
          </a>
        </div>
      </div>
      @endif


    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->






<!-- Contenido -->
<div class="container p-5" >
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col col-md-6 col-lg-4">
      <div class="card text-center">
        <div class="card-header">
          <h4 class="card-title text-center">¿Quieres agendar una hora?</h4>
        </div>
        <div class="card-body">
          @if (Auth::check())
          <a href="#" class="btn btn-success">Agendar hora</a>
          @else
          <a href="{{ route('login') }}" class="btn btn-success">Agendar hora</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<div>

  <!-- Contenido -->
  @endsection
