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
                <a href="#" class="btn btn-sm btn-success">
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

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="location">Local</label>
                    <select name="location" id="location" class="form-control" required>
                        <option value="">Seleccione un local</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ old('location') == $location->id ? 'selected' : '' }}>
                                {{ "$location->name ($location->address)" }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="service">Servicio</label>
                    <select name="service_id" id="service" class="form-control" required>
                        <option value="">Seleccione un servicio</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="barber">Barbero</label>
                    <select name="barber_id" id="barber" class="form-control" required>
                        <option value="">Seleccione un barbero</option>
                        @foreach ($barbers as $barber)
                            <option value="{{ $barber->id }}" {{ old('barber_id') == $barber->id ? 'selected' : '' }}>
                                {{ "$barber->first_name $barber->last_name" }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Fecha</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" name="scheduled_date" id="date" class="form-control datepicker"
                        value="{{ old('scheduled_date', date('Y-m-d')) }}" data-date-format="yyyy-mm-dd"
                        data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+30d"
                        placeholder="Seleccionar fecha" required>
                </div>
            </div>
            <div class="form-group">
                <label for="hours">Hora de atención</label>
                <!-- <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                </div> -->
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4 class="m-3" id="title-morning"></h4>
                            <div id="hours-morning">
                                @if ($intervals)
                                    <h4 class="m-3">En la mañana.</h4>
                                    @foreach ($intervals['morning'] as $key => $interval)
                                    <div class="custom-control custom-radio m-3">
                                        <input type="radio" id="interval_morning{{ $key }}" name="scheduled_time" value="${{ $interval['start'] }}" class="custom-control-input">
                                        <label class="custom-control-label" for="interval_morning{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }}</label>
                                    </div>
                                    @endforeach
                                @else
                                    <mark>
                                        <small class="text-warning display-5">
                                            Selecciona un barbero y una fecha para ver las horas disponibles.
                                        </small>
                                    </mark>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="m-3" id="title-afternoon"></h4>
                            <div id="hours-afternoon">
                                @if ($intervals)
                                    <h4 class="m-3">En la tarde.</h4>
                                    @foreach ($intervals['afternoon'] as $key => $interval)
                                    <div class="custom-control custom-radio m-3">
                                        <input type="radio" id="interval_afternoon{{ $key }}" name="scheduled_time" value="${{ $interval['start'] }}" class="custom-control-input">
                                        <label class="custom-control-label" for="interval_afternoon{{ $key }}">{{ $interval['start'] }} - {{ $interval['end'] }}</label>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="comments">Comentarios</label>
                <textarea class="form-control" name="comments" id="comments"
                    rows="5" type="text" placeholder="Comentarios adicionales (opcional)"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src=" {{ asset('assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }} "></script>
    <script src=" {{ asset('assets/js/appointments/create.js') }} "></script>
@endsection
