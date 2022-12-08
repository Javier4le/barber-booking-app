<div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Local</th>
                    <th scope="col">Fecha</th>
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
