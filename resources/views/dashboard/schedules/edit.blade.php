@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<form action="{{ url('/dashboard/barber/schedules') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Gestionar Horario</h3>
                </div>
                <div class="col text-right">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i> Guardar
                    </button>
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

            @if (session('errors'))
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                <strong> ATENCIÓN:</strong>
                <ul>
                    @foreach (session('errors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Día</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Turno Mañana</th>
                        <th scope="col">Turno Tarde</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $key => $schedule)
                        <tr>
                            <!-- Day -->
                            <th>{{ $days[$key] }}</th>

                            <!-- Active Checkbox -->
                            <td>
                                <label class="custom-toggle">
                                    <input type="checkbox" name="active[]" value="{{ $key }}" @if ($schedule->active) checked @endif>
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </td>

                            <!-- Morning -->
                            <td>
                                <div class="row">


                                    <div class="col">
                                        <select class="form-control" name="morning_start[]">
                                            @for ($i = 8; $i <= 12; $i++)
                                                @if ($i < 12)
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:00" {{ $schedule->morning_start == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:30" {{ $schedule->morning_start == $i . ':30' ? 'selected' : '' }}>
                                                        {{ $i }}:30 hrs.
                                                    </option>
                                                @else
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:00" {{ $schedule->morning_start == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select class="form-control" name="morning_end[]">
                                            @for ($i = 12; $i >= 8; $i--)
                                                @if ($i < 12)
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:30" {{ $schedule->morning_end == $i . ':30' ? 'selected' : '' }}>
                                                        {{ $i }}:30 hrs.
                                                    </option>
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:00" {{ $schedule->morning_end == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                @else
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:00" {{ $schedule->morning_end == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>


                                </div>
                            </td>

                            <!-- Afternoon -->
                            <td>
                                <div class="row">


                                    <div class="col">
                                        <select class="form-control" name="afternoon_start[]">
                                            @for ($i = 14; $i <= 20; $i++)
                                                @if ($i < 20)
                                                    <option value="{{ $i }}:00" {{ $schedule->afternoon_start == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                    <option value="{{ $i }}:30" {{ $schedule->afternoon_start == $i . ':30' ? 'selected' : '' }}>
                                                        {{ $i }}:30 hrs.
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}:00" {{ $schedule->afternoon_start == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select class="form-control" name="afternoon_end[]">
                                            @for ($i = 20; $i >= 14; $i--)
                                                @if ($i < 20)
                                                    <option value="{{ $i }}:30" {{ $schedule->afternoon_end == $i . ':30' ? 'selected' : '' }}>
                                                        {{ $i }}:30 hrs.
                                                    </option>
                                                    <option value="{{ $i }}:00" {{ $schedule->afternoon_end == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                @else
                                                    <option value="{{ $i }}:00" {{ $schedule->afternoon_end == $i . ':00' ? 'selected' : '' }}>
                                                        {{ $i }}:00 hrs.
                                                    </option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection
