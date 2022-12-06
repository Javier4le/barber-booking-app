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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
});


Route::middleware(['auth', 'barber'])->group(function () {
    // Rutas para horas de Barberos
    Route::get('/dashboard/barber/schedules', [App\Http\Controllers\Barber\ScheduleController::class, 'edit']);
    Route::post('/dashboard/barber/schedules', [App\Http\Controllers\Barber\ScheduleController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    // Rutas para reservar citas
    Route::get('/dashboard/client/appointments', [App\Http\Controllers\AppointmentController::class, 'create']);
    Route::post('/dashboard/client/appointments', [App\Http\Controllers\AppointmentController::class, 'store']);

    // JSON para obtener los barberos de un local y servicio seleccionado
    // Route::get('/dashboard/client/{service}/barbers', [\App\Http\Controllers\Api\ServiceController::class, 'barbers']);
    // Route::get('/api/services/{service}/barbers', [App\Http\Controllers\Api\ServiceController::class, 'barbers']);
    // Route::get('/api/location/{location}/services', [App\Http\Controllers\Api\LocationController::class, 'services']);

    // JSON para obtener los barberos de un local y servicio seleccionado







});

