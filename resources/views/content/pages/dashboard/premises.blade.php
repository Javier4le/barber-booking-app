@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@extends('layouts/sections/scriptsDataTables')

@section('page-script')
    <script src="{{ asset('assets/js/datatables/premises.js') }}"></script>
@endsection

@section('title', 'Locales')

@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        Locales
    </h4>

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered" id="premises-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
