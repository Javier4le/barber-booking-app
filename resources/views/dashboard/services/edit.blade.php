@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Editar Servicio</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('services.index') }}" class="btn btn-sm btn-success">
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
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del servicio</label>
                <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" class="form-control" placeholder="Nombre del servicio" required>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" class="form-control" placeholder="Precio" required>
            </div>
            <div class="form-group">
                <label for="duration">Duración</label>
                <select name="duration" id="duration" class="form-control">
                    </option>
                    @for ($i = 5; $i <= 115; $i +=5)
                        @if ($i < 60)
                            <option value="{{ $i }}" {{ $service->duration == $i ? 'selected' : '' }}>
                                {{ $i }} min.
                            </option>
                        @else
                            <option value="{{ $i }}" {{ $service->duration == $i ? 'selected' : '' }}>
                                1:{{ ($i >= 70 ? $i - 60 : '0' . $i - 60) }} hrs.
                            </option>
                        @endif
                    @endfor
                    <option value="120" {{ $service->duration == 120 ? 'selected' : '' }}>
                        2:00 hrs.
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" id="description" value="{{ old('description', $service->description) }}" class="form-control" placeholder="Descripción" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
