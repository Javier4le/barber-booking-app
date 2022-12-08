@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Cancelar Cita</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-chevron-left"></i> Regresar
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


        @if ($role == 'client')
        <p>
            Se cancelará la cita reservada con el barbero <strong>{{ $appointment->barber->first_name }} {{ $appointment->barber->last_name }}</strong>
            (servicio <strong>{{ $appointment->service->name }}</strong>)
            para el día <strong>{{ $appointment->scheduled_date }}</strong>
             a las <strong>{{ $appointment->formatted_time }}</strong>.
        </p>
        @elseif ($role == 'barber')
        <p>
            Se cancelará la cita reservada por el cliente <strong>{{ $appointment->client->first_name }} {{ $appointment->client->last_name }}</strong>
            (servicio <strong>{{ $appointment->service->name }}</strong>)
            para el día <strong>{{ $appointment->scheduled_date }}</strong>
             a las <strong>{{ $appointment->formatted_time }}</strong>.
        </p>
        @else
        <p>
            Se cancelará la cita reservada por el cliente <strong>{{ $appointment->client->first_name }} {{ $appointment->client->last_name }}</strong>,
            que será atendido por el barbero <strong>{{ $appointment->barber->first_name }} {{ $appointment->barber->last_name }}</strong>
            (servicio <strong>{{ $appointment->service->name }}</strong>)
            para el día <strong>{{ $appointment->scheduled_date }}</strong>
             a las <strong>{{ $appointment->formatted_time }}</strong>.
        </p>
        @endif

        <form action="{{ url('/dashboard/appointments/'.$appointment->id.'/cancel') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="reason">Puede indicar la razón de la cancelación de la cita (Opcional): </label>
                <textarea name="reason" id="reason" rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-danger">
                <i class="fas fa-times"></i>
                Cancelar cita
            </button>
        </form>
    </div>
</div>
@endsection
