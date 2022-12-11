@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="container-fluid mt--9">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Mi Perfil</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('profile.index') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-chevron-left"></i> Regresar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong> ATENCIÓN:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>¡Por favor!</strong> {{ $error }}
                        </div>
                        @endforeach -->
                    @endif

                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Información del usuario</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="username">Usuario</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-alternative" placeholder="Nombre de usuario" value="{{ old('username', $user->username) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Correo</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-alternative" placeholder="Correo electrónico" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="first_name">Nombre</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control form-control-alternative" placeholder="Nombre" value="{{ old('first_name', $user->first_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="last_name">Apellido</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control form-control-alternative" placeholder="Apellido" value="{{ old('last_name', $user->last_name) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">Télefono</label>
                                        <input type="text" name="phone" id="phone" class="form-control form-control-alternative" placeholder="Télefono" value="{{ old('phone', $user->phone) }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Contraseña</label>
                                        <input type="text" name="password" id="password" class="form-control form-control-alternative" placeholder="Contraseña">
                                        <small class="text-warning">Sólo ingrese un valor si desea cambiar la contraseña</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
