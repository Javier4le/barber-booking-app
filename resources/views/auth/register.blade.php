@extends('layouts.form')

@section('title', 'Registro')

@section('content')
<!-- Page content -->
<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
                <!-- <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
                    <div class="text-center">
                        <a href="#" class="btn btn-neutral btn-icon mr-4">
                            <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                            <span class="btn-inner--text">Github</span>
                        </a>
                        <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                            <span class="btn-inner--text">Google</span>
                        </a>
                    </div>
                </div> -->
                <div class="card-body px-lg-5 py-lg-5">
                    @if ($errors->any())
                        <div class="text-center text-muted mb-2">
                            <h4>Se encontró el siguiente error</h4>
                        </div>

                        <div class="alert alert-danger mb-4" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @else
                        <div class="text-center text-muted mb-4">
                            <small>Ingresa tus datos</small>
                        </div>
                    @endif
                    <form role="form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" placeholder="Nombre" type="text" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" placeholder="Apellido" type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                </div>
                                <input class="form-control" placeholder="Teléfono" type="text" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control" placeholder="Nombre de usuario" type="text" name="username" value="{{ old('username') }}" required autocomplete="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Correo electrónico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Repetir contraseña" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- <div class="row my-4">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                    <label class="custom-control-label" for="customCheckRegister">
                                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
