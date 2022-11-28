<?php

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



// Rutas para el CRUD de Locations

Route::resource('dashboard/locations', App\Http\Controllers\LocationController::class);

// Route::get('/dashboard/locations', [App\Http\Controllers\LocationController::class, 'index']);

// Route::get('/dashboard/locations/create', [App\Http\Controllers\LocationController::class, 'create']);
// Route::get('/dashboard/locations/{location}/edit', [App\Http\Controllers\LocationController::class, 'edit']);
// Route::post('/dashboard/locations', [App\Http\Controllers\LocationController::class, 'store']);
// Route::put('/dashboard/locations/{location}', [App\Http\Controllers\LocationController::class, 'update']);
// Route::delete('/dashboard/locations/{location}', [App\Http\Controllers\LocationController::class, 'destroy']);
