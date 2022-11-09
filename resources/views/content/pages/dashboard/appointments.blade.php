@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@extends('layouts/sections/scriptsDataTables')

@section('page-script')
    <script src="{{asset('assets/js/datatables/appointments.js')}}"></script>
@endsection

@section('title', 'Citas')

@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        Citas
    </h4>

    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table table-bordered" id="appointments-table">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Id</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Cliente</th>
              <th>Servicio</th>
              <th>Barbero</th>
              <th>Local</th>
              <th>Fecha de creación</th>
              <th>Acciones</th>
            </tr>
          </thead>
          {{-- <tbody class="table-border-bottom-0">
            @foreach ($appointments as $appointment)
              <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->time }}</td>
                <td>{{ $appointment->created_at->diffForHumans() }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('appointments.edit', $appointment->id) }}"><i class="bx bx-edit-alt me-2"></i> Editar</a>
                      <a class="dropdown-item" href="{{ route('appointments.destroy', $appointment->id) }}"><i class="bx bx-trash me-2"></i> Eliminar</a>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody> --}}
        </table>
      </div>
    </div>
@endsection

