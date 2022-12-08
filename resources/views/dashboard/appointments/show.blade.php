@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Cita #{{ $appointment->id }}</h3>
            </div>
            <div class="col text-right">
                <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-chevron-left"></i> Regresar
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul>
            <dd>
                <strong>Fecha:</strong> {{ $appointment->scheduled_date }}
            </dd>
            <dd>
                <strong>Hora:</strong> {{ $appointment->formatted_time }}
            </dd>
            @if ($role == 'barber' || $role == 'admin')
                <dd>
                    <strong>Cliente:</strong> {{ $appointment->client->first_name }} {{ $appointment->client->last_name }}
                </dd>
            @endif
            @if ($role == 'client' || $role == 'admin')
                <dd>
                    <strong>Barbero:</strong> {{ $appointment->barber->first_name }} {{ $appointment->barber->last_name }}
                </dd>
            @endif
            <dd>
                <strong>Servicio:</strong> {{ $appointment->service->name }}
            </dd>
            <dd>
                <strong>Local:</strong> {{ $appointment->location_id }}
            </dd>
            <dd>
                <strong>Estado:</strong>
                @if( $appointment->status == 'Cancelada' )
                    <span class="badge badge-danger">Cancelada</span>
                @else
                    <span class="badge badge-primary">{{ $appointment->status }}</span>
                @endif
            </dd>
            <dd>
                <strong>Comentarios</strong> {{ $appointment->comments }}
            </dd>
        </ul>

        @if ($appointment->status == 'Cancelada')
        <div class="alert bg-light text-primary">
            <h3>Detalles de la cancelación</h3>
            @if ($appointment->cancellation)

            <ul>
                <li>
                    <strong>Fecha de cancelación:</strong>
                    {{ $appointment->cancellation->created_at }}
                </li>
                <li>
                    <strong>La cita fue cancelada por:</strong>
                    {{ $appointment->cancellation->cancelled_by->first_name }} {{ $appointment->cancellation->cancelled_by->last_name }}
                </li>
                <li>
                    <strong>Motivo de la cancelación:</strong>
                    {{ $appointment->cancellation->reason }}
                </li>
            </ul>

            @else
            <ul>
                <li>
                    La cita fue cacelada antes de su confirmación.
                </li>
            </ul>

            @endif
        </div>
        @endif
    </div>
</div>
@endsection
