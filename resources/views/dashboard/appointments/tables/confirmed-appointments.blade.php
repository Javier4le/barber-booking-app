<div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Local</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    @if ($role == 'barber')
                      <th scope="col">Cliente</th>
                    @elseif ($role == 'client')
                      <th scope="col">Barbero</th>
                    @endif
                    <th scope="col">Servicio</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($confirmedAppointments as $appointment)
                <tr>
                    <th scope="row">{{ $appointment->location_id }}</th>
                    <td>{{ $appointment->scheduled_date }}</td>
                    <td>{{ $appointment->formatted_time }}</td>
                    @if ($role == 'barber')
                      <td>{{ $appointment->client->first_name }} {{ $appointment->client->last_name }}</td>
                    @elseif ($role == 'client')
                      <td>{{ $appointment->barber->first_name }} {{ $appointment->barber->last_name }}</td>
                    @endif
                    <td>{{ $appointment->service->name }}</td>
                    <td>{{ $appointment->comments }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        @if ($role == 'admin')
                        <a href="{{ url('/dashboard/appointments/'.$appointment->id) }}" class="btn btn-sm btn-info" title="Ver cita">
                            Ver
                        </a>
                        @endif

                        <a href="{{ url('/dashboard/appointments/'.$appointment->id.'/cancel') }}" class="btn btn-sm btn-danger" title="Cancelar cita">
                            Cancelar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
