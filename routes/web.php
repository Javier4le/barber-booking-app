<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('dashboard.profile.test');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



Route::middleware(['auth', 'admin'])->group(function () {
    // Rutas para el CRUD de Locations
    Route::resource('dashboard/locations', App\Http\Controllers\Admin\LocationController::class);

    // Rutas para el CRUD de Services
    Route::resource('dashboard/services', App\Http\Controllers\Admin\ServiceController::class);

    // Rutas para el CRUD de Barberos
    Route::resource('dashboard/barbers', App\Http\Controllers\Admin\BarberController::class);

    // Rutas para el CRUD de Clientes
    Route::resource('dashboard/clients', App\Http\Controllers\Admin\ClientController::class);

    // Rutas para Reportes
    Route::get('/dashboard/reports/appointments/line', [App\Http\Controllers\Admin\ChartController::class, 'appointments']);
    Route::get('/dashboard/reports/barbers/column', [App\Http\Controllers\Admin\ChartController::class, 'barbers']);

    Route::get('/dashboard/reports/barbers/column/data', [App\Http\Controllers\Admin\ChartController::class, 'barbersJson']);
});


Route::middleware(['auth', 'barber'])->group(function () {
    // Rutas para horas de Barberos
    Route::get('/dashboard/barber/schedules', [App\Http\Controllers\Barber\ScheduleController::class, 'edit']);
    Route::post('/dashboard/barber/schedules', [App\Http\Controllers\Barber\ScheduleController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    // Rutas para reservar citas
    // Route::get('/dashboard/client/appointments', [App\Http\Controllers\AppointmentController::class, 'create']);
    // Route::post('/dashboard/client/appointments', [App\Http\Controllers\AppointmentController::class, 'store']);
    // Route::get('/dashboard/client/appointments', [App\Http\Controllers\AppointmentController::class, 'index']);

    Route::post('/dashboard/appointments/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class, 'confirm']);
    Route::post('/dashboard/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel']);
    Route::get('/dashboard/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'formCancel']);
    Route::resource('dashboard/appointments', App\Http\Controllers\AppointmentController::class);




    // JSON para obtener los barberos de un local y servicio seleccionado
    // Route::get('/dashboard/client/{service}/barbers', [\App\Http\Controllers\Api\ServiceController::class, 'barbers']);
    // Route::get('/api/services/{service}/barbers', [App\Http\Controllers\Api\ServiceController::class, 'barbers']);
    // Route::get('/api/location/{location}/services', [App\Http\Controllers\Api\LocationController::class, 'services']);

    // JSON para obtener los barberos de un local y servicio seleccionado
    Route::get('/api/services/{service}/barbers', [App\Http\Controllers\Api\ServiceController::class, 'barbers']);
    // Route::get('/api/locations/{location}/services/{service}/barbers', [App\Http\Controllers\Api\LocationController::class, 'barbers']);

    Route::get('/api/schedule/hours', [App\Http\Controllers\Api\ScheduleController::class, 'hours']);


    // Rutas para el CRUD de Perfil
    Route::resource('dashboard/profile', App\Http\Controllers\ProfileController::class);

});

