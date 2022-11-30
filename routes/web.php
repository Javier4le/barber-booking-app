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

    // Rutas para el CRUD de Barberos
    Route::resource('dashboard/barbers', App\Http\Controllers\Admin\BarberController::class);

    // Rutas para el CRUD de Clientes
    Route::resource('dashboard/clients', App\Http\Controllers\Admin\ClientController::class);
});

