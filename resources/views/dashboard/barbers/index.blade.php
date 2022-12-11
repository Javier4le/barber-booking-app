@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Barberos</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('barbers.create') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus"></i> Nuevo Barbero
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
                    <th scope="col">Apellido</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barbers as $barber)
                <tr>
                    <th scope="row">{{ $barber->first_name }}</th>
                    <td>{{ $barber->last_name }}</td>
                    <td>{{ $barber->phone }}</td>
                    <td>{{ $barber->username }}</td>
                    <td>{{ $barber->email }}</td>
                    <td>{{ $barber->created_at }}</td>
                    <td>
                        <a href="{{ route('barbers.edit', $barber->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('barbers.destroy', $barber->id) }}" method="POST" class="d-inline">
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
    <div class="card-body">
        <nav class="d-flex justify-content-center" aria-label="...">
            {{ $barbers->links() }}
        </nav>
    </div>
</div>
@endsection
