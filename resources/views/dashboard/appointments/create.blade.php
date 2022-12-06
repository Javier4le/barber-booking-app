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
        <form action="{{ url('clients') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="location">Local</label>
                <select name="location" id="location" class="form-control" required>
                    <option value="">Seleccione un local</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ "$location->name ($location->address)" }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service">Servicio</label>
                <select name="service_id" id="service" class="form-control" required>
                    <option value="">Seleccione un servicio</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="barber">Barbero</label>
                <select name="barber_id" id="barber" class="form-control" required>
                    <!-- <option value="">Seleccione un barbero</option> -->
                </select>
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
    <script>
        let $barber;

        // cargar barberos por local y servicio
        $('#location').on('change', function() {
            let location_id = $(this).val();
            let service_id = $('#service').val();

            if (location_id && service_id) {
                $.get(`/api/locations/${location_id}/services/${service_id}/barbers`, function(data) {
                    let htmlOptions = '<option value="">Seleccione un barbero</option>';
                    data.forEach(barber => {
                        htmlOptions +=  `<option value="${barber.id}">${barber.first_name} ${barber.last_name ?? ''}</option>`;
                    });
                    $barber.html(htmlOptions);
                });
            }
        });



        // // cargar barberos por servicio y local
        // $('#service').on('change', function() {
        //     let service_id = $(this).val();
        //     let local_id = $('#local').val();

        //     if (service_id && local_id) {
        //         $.get('/api/locations/' + local_id + '/services/' + service_id + '/barbers', function(data) {
        //             let htmlOptions = '<option value="">Seleccione un barbero</option>';
        //             data.forEach(barber => {
        //                 htmlOptions +=  `<option value="${barber.id}">${barber.first_name} ${barber.last_name ?? ''}</option>`;
        //             });
        //             $barber.html(htmlOptions);
        //         });
        //     }
        // });


        // $(function() {
        //     const $service = $('#service');
        //     const $location = $('#location');
        //     $barber = $('#barber');

        //     $service.change(() => {
        //         const serviceId = $service.val();
        //         const locationId = $location.val();
        //         // const url = `/dashboard/client/${serviceId}/barbers`;
        //         const url = `/api/services/${serviceId}/barbers`;
        //         $.getJSON(url, onBarbersLoaded);
        //     });

        // })

        // function onBarbersLoaded(barbers) {
        //     let htmlOptions = '';

        //     barbers.forEach(barber => {
        //         htmlOptions += `<option value="${barber.id}">${barber.first_name} ${barber.last_name ?? ''}</option>`;
        //     });

        //     $barber.html(htmlOptions);
        // }
    </script>
@endsection
