@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Reporte: Desempeño de barberos</h3>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="input-daterange datepicker row align-items-center mb-4" data-date-format="yyyy-mm-dd">
            <div class="col">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="Fecha de inicio" id="start-date" type="text" name="start" value="{{ $start }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="Fecha de fin" id="end-date" type="text" name="end" value="{{ $end }}">
                    </div>
                </div>
            </div>
        </div>

        <div id="myChart">
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src=" {{ asset('assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }} "></script>
    <script src="{{ asset('assets/js/charts/barbers.js') }}"></script>
@endsection
