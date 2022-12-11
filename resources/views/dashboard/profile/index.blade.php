@extends('layouts.panel')

@section('title', 'Panel de Control')

@section('content')
<div class="container-fluid mt--9">
    <div class="row justify-content-center">
        <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset('assets/img/theme/team-4-800x800.jpg') }}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-sm btn-info float-right">Editar</a>
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-2">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                @if ( $user->hasRoles(['barber']) )
                                    <div>
                                        <span class="heading">{{ $user->asBarberAppointments()->count() }}</span>
                                        <span class="description">Citas</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $user->services()->count() }}</span>
                                        <span class="description">Servicios</span>
                                    </div>
                                @elseif ( $user->hasRoles(['client']))
                                    <div>
                                        <span class="heading">{{ $user->asClientAppointments()->count() }}</span>
                                        <span class="description">Citas</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </h3>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>
                            @if( $user->hasRoles(['admin']) )
                                <span class="badge badge-pill badge-danger">Administrador</span>
                            @elseif( $user->hasRoles(['barber']) )
                                <span class="badge badge-pill badge-warning">Barbero</span>
                            @elseif( $user->hasRoles(['client']) )
                                <span class="badge badge-pill badge-info">Cliente</span>
                            @endif
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $user->phone }}
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>{{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
