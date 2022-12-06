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
                    @for ($i = 5; $i <= 125; $i +=5)
                        @if ($i < 60)
                            <option value="{{ $i }}" {{ old('duration', $service->duration) == $i ? 'selected' : '' }}>{{ $i }} min.</option>
                        @elseif ($i < 120)
                            <option value="{{ $i }}" {{ old('duration', $service->duration) == $i ? 'selected' : '' }}>1{{ $i - 60 < 5 ? " hr." : " hr. " . $i - 60 . " min." }}</option>
                        @else
                            <option value="{{ $i }}" {{ old('duration', $service->duration) == $i ? 'selected' : '' }}>2 hr.</option>
                        @endif
                    @endfor
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
