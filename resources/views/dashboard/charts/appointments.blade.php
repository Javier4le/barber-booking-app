@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Reporte: Frecuencia de citas</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
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

    <script>
        Highcharts.chart('myChart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Citas registradas mensualmente'
            },
            xAxis: {
                categories: [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de citas'
                }
            },
            plotOptions: {
                // column: {
                //     pointPadding: 0.2,
                //     borderWidth: 0
                // }

                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Citas registradas',
                data: @json($counts)
            }]
        });
    </script>
@endsection
