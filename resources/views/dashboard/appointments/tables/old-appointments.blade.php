<div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Local</th>
                    <th scope="col">Fecha</th>
                    @if ($role == 'barber' || $role == 'admin')
                      <th scope="col">Cliente</th>
                    @endif
                    @if ($role == 'client' || $role == 'admin')
                      <th scope="col">Barbero</th>
                    @endif
                    <th scope="col">Servicio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($oldAppointments as $appointment)
                <tr>
                    <th scope="row">{{ $appointment->location_id }}</th>
                    <td>{{ $appointment->scheduled_date }}</td>
                    @if ($role == 'barber' || $role == 'admin')
                      <td>{{ $appointment->client->first_name }} {{ $appointment->client->last_name }}</td>
                    @endif
                    @if ($role == 'client' || $role == 'admin')
                      <td>{{ $appointment->barber->first_name }} {{ $appointment->barber->last_name }}</td>
                    @endif
                    <td>{{ $appointment->service->name }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
