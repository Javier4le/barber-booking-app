<div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Local</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    @if ($role == 'barber' || $role == 'admin')
                      <th scope="col">Cliente</th>
                    @endif
                    @if ($role == 'client' || $role == 'admin')
                      <th scope="col">Barbero</th>
                    @endif
                    <th scope="col">Servicio</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($confirmedAppointments as $appointment)
                <tr>
                    <th scope="row">{{ $appointment->location->name ?? '' }}</th>
                    <td>{{ $appointment->scheduled_date }}</td>
                    <td>{{ $appointment->formatted_time }}</td>
                    @if ($role == 'barber' || $role == 'admin')
                      <td>{{ $appointment->client->first_name }} {{ $appointment->client->last_name }}</td>
                    @endif
                    @if ($role == 'client' || $role == 'admin')
                      <td>{{ $appointment->barber->first_name }} {{ $appointment->barber->last_name }}</td>
                    @endif
                    <td>{{ $appointment->service->name }}</td>
                    <td>{{ $appointment->formatted_price }}</td>
                    <td>
                        @if( $appointment->status == 'Cancelada' )
                            <span class="badge badge-danger">Cancelada</span>
                        @elseif( $appointment->status == 'Confirmada' )
                            <span class="badge badge-info">Confirmada</span>
                        @elseif( $appointment->status == 'Reservada' )
                            <span class="badge badge-warning">Reservada</span>
                        @elseif( $appointment->status == 'Atendida' )
                            <span class="badge badge-success">Atendida</span>
                        @endif
                    </td>
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
