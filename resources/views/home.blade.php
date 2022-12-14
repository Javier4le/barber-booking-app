<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/styles.scss', 'resources/js/app.js'])
</head>

<body>

        <header class="home__header">
            <div class="home__header-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/brand/logo.png') }}" alt="Logo"></a>
            </div>

            <nav class="home__header__nav-menu">

                <input class="home__header__check" type="checkbox" id="check">

                <label for="check" class="home__header__btn-check">
                    <div class="home__header__menu-icon"><i class="fas fa-bars"></i></div>
                </label>

                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="#about">Quiénes Somos</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a href="#barbers">Barberos</a></li>
                    <li><a href="#contact">Contacto</a></li>
                </ul>
            </nav>

            <div class="home__header__auth">
                @guest
                    <a class="home__header__auth-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="home__header__auth-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else


                    <div class="home__header__auth-avatar">
                        <input class="home__header__auth-avatar__toggler" type="checkbox" id="toggler-avatar">

                        <label for="toggler-avatar" class="home__header__auth-avatar__btn-toggle">
                            <img src="{{ asset('assets/img/theme/team-1-800x800.jpg') }}" alt="Avatar">
                        </label>

                        <ul>
                            <li>
                                <a href="{{ route('appointments.index') }}">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    Mis Citas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.index') }}">
                                    <i class="ni ni-single-02"></i>
                                    Mi Perfil
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>


                    <a class="home__header__auth-username" href="#">
                        <span class="caret">@</span>{{ Auth::user()->username }}
                    </a>
                @endguest
            </div>

        </header>

        <main>
            <section class="home__hero" style="background-image: url({{ asset('assets/img/home/hero.jpg') }})" id="home">
                <div class="home__hero-content">
                    <div class="home__hero-logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/img/brand/logo.png') }}" alt="Logo"></a>
                    </div>

                    <h1>Barbershop</h1>
                    <h2>Relájate, Luce Genial, Siéntete Cómodo.</h2>
                    <p>Disfruta de la mejor experiencia de cuidado personal para hombres cada vez que entres en la barbería.</p>
                    <div class="home__hero-btns">
                        <a href="{{ route('appointments.create') }}">Agendar Cita</a>
                        <a href="">Contacto</a>
                    </div>
                </div>
            </section>

            <section class="home__welcome">
                <div class="home__v-line"></div>
                <div class="home__welcome-content">
                    <div class="home__welcome-content__title">
                        <h1>Barbershop</h1>
                        <h2>Bienvenido a nuestra barbería</h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere. Duis ullamcorper justo velit, in eleifend ex consequat vel. Proin malesuada tellus ut magna volutpat feugiat. Aliquam enim eros, congue vel imperdiet maximus, lacinia quis purus. Nulla egestas, nisi a porta.
                    </p>
                    <div class="home__welcome-content__cards">
                        <div class="home__welcome-content__card">
                            <div class="home__welcome-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__welcome-content__card-content">
                                <div class="home__welcome-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="home__about" id="about">
                <div class="home__about-content">
                    <div class="home__about-content__title">
                        <h1>Barbershop</h1>
                        <h2>Historia de nuestra barbería</h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere. Duis ullamcorper justo velit, in eleifend ex consequat vel. Proin malesuada tellus ut magna volutpat feugiat. Aliquam enim eros, congue vel imperdiet maximus, lacinia quis purus. Nulla egestas, nisi a porta.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere. Duis ullamcorper justo velit, in eleifend ex consequat vel. Proin malesuada tellus ut magna volutpat feugiat. Aliquam enim eros, congue vel imperdiet maximus, lacinia quis purus. Nulla egestas, nisi a porta.
                    </p>
                    <div class="home__about-content__btns">
                        <a href="{{ route('appointments.create') }}">Agendar Cita</a>
                    </div>
                </div>
            </section>

            <section class="home__services" id="services">
                <div class="home__v-line"></div>
                <div class="home__services-content">
                    <div class="home__services-content__title">
                        <h1>Barbershop</h1>
                        <h2>Estos son nuestros servicios</h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere. Duis ullamcorper justo velit, in eleifend ex consequat vel. Proin malesuada tellus ut magna volutpat feugiat. Aliquam enim eros, congue vel imperdiet maximus, lacinia quis purus. Nulla egestas, nisi a porta.
                    </p>
                    <div class="home__services-content__cards">
                        <div class="home__services-content__card">
                            <div class="home__services-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__services-content__card-content">
                                <div class="home__services-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>

                        <div class="home__services-content__card">
                            <div class="home__services-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__services-content__card-content">
                                <div class="home__services-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>

                        <div class="home__services-content__card">
                            <div class="home__services-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__services-content__card-content">
                                <div class="home__services-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>

                        <div class="home__services-content__card">
                            <div class="home__services-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__services-content__card-content">
                                <div class="home__services-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>
                    </div>
                    <div class="home__services-content__btns">
                        <a href="{{ route('appointments.create') }}">Agendar Cita</a>
                    </div>
                </div>
            </section>


            <section class="home__barbers">
                <div class="home__v-line"></div>
                <div class="home__barbers-content">
                    <div class="home__barbers-content__title">
                        <h1>Barbershop</h1>
                        <h2>Conoce a la familia</h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere. Duis ullamcorper justo velit, in eleifend ex consequat vel. Proin malesuada tellus ut magna volutpat feugiat. Aliquam enim eros, congue vel imperdiet maximus, lacinia quis purus. Nulla egestas, nisi a porta.
                    </p>
                    <div class="home__barbers-content__cards">
                        <div class="home__barbers-content__card">
                            <div class="home__barbers-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__barbers-content__card-content">
                                <div class="home__barbers-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="home__reviews">
                <div class="home__v-line"></div>
                <div class="home__reviews-content">
                    <div class="home__reviews-content__title">
                        <h1>Barbershop</h1>
                        <h2>Qué piensan nuestros clientes</h2>
                    </div>
                    <!-- <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere. Duis ullamcorper justo velit, in eleifend ex consequat vel. Proin malesuada tellus ut magna volutpat feugiat. Aliquam enim eros, congue vel imperdiet maximus, lacinia quis purus. Nulla egestas, nisi a porta.
                    </p> -->
                    <div class="home__reviews-content__cards">
                        <div class="home__reviews-content__card">
                            <div class="home__reviews-content__card-icon">
                                <i class="fas fa-cut fa-2x"></i>
                            </div>
                            <div class="home__reviews-content__card-content">
                                <div class="home__reviews-content__card-title">
                                    <h3>Corte de Pelo</h3>
                                    <span>$100</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at volutpat purus. Aenean ultrices sapien vel ante porta posuere.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </main>


        <footer class="home__footer">
            <div class="home__footer-content">
                <div class="home__footer-content__logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/img/brand/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="home__footer-content__links">
                    <a href="/">Inicio</a>
                    <a href="#about">Nosotros</a>
                    <a href="#services">Servicios</a>
                    <a href="#barbers">Barberos</a>
                    <a href="#contact">Contacto</a>
                </div>
                <div class="home__footer-content__social">
                    <h2>Síguenos</h2>
                    <div class="home__footer-content__social-icons">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="home__footer-copyright">

                <small>&copy; {{ date('Y') }} <a href="/" class="font-weight-bold ml-1">{{ config('app.name') }}</a> - Todos los Derechos Reservados</small>
            </div>
        </footer>

</body>

</html>
