<?php
    use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo Cliente</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('clients.index') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-chevron-left"></i>
                    Regresar
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
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Nombre</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Nombre del cliente" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Apellido del cliente">
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone"  value="{{ old('phone') }}" class="form-control" placeholder="Teléfono" required>
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control" placeholder="Nombre de usuario" required>
            </div>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" id="password" value="{{ old('password', Str::random(8)) }}" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
