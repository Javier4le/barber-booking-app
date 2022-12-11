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
                <h3 class="mb-0">Reservar Cita</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-success">
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
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="location">Local</label>
                <select name="location" id="location" class="form-control" required>
                    <option value="">Seleccione un local</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location', $barber->location_id) == $location->id ? 'selected' : '' }}>{{ "$location->name ($location->address)" }}</option>
                    @endforeach
                </select>
            </div>
            <div class="from-group">
                <label for="service">Servicio</label>
                <select name="service" id="service" class="form-control" required>
                    <option value="">Seleccione un servicio</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ old('service') == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="from-group">
                <label for="barber">Barbero</label>
                <select name="barber" id="barber" class="form-control" required>
                    <option value="">Seleccione un barbero</option>
                    @foreach ($barbers as $barber)
                        <option value="{{ $barber->id }}" {{ old('barber') == $barber->id ? 'selected' : '' }}>{{ $barber->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="from-group">
                <label for="date">Fecha</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" name="date" id="date" class="form-control datepicker"
                        value="{{ old('date', date('Y-m-d')) }}" data-date-format="yyyy-mm-dd"
                        data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+30d"
                        placeholder="Seleccionar fecha" required>
                </div>
            </div>
            <div class="from-group">
                <label for="time">Hora de atención</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                    <input type="text" name="time" id="time" class="form-control timepicker"
                        value="{{ old('time', '08:00') }}" data-date-format="hh:ii"
                        data-date-start-date="08:00" data-date-end-date="18:00"
                        placeholder="Seleccionar hora" required>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src=" {{ asset('assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }} "></script>
@endsection
