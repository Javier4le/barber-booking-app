<?php
    use Illuminate\Support\Facades\Schema;
    // use format hour
    use Illuminate\Support\Facades\Date;

    use Illuminate\Database\Schema\Blueprint;
?>

@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Servicios</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('services.create') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus"></i> Nuevo Servicio
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('notification'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check"></i>
                <strong>¡Bien hecho!</strong> {{ session('notification') }}
            </div>
        @endif
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Duración</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <th scope="row">{{ $service->name }}</th>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->duration }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->created_at }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
