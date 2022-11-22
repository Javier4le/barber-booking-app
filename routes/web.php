<?php

use Illuminate\Http\Request;
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

$controller_path = 'App\Http\Controllers';

// Route::get('/', function(Request $request){
//   echo("Esto es el home");
// });

Route::get('/', $controller_path . '\pages\HomePage@index')->name('home');

Route::get('/test', function () {
    return view('example-content.apps.app-user-list');
    // return view('example-content.user-interface.ui-navbar');
    // return view('example-content.layouts-example.layouts-content-navbar');
    // return view('example-content.layouts-example.layouts-without-menu');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';
    // Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    Route::get('/dashboard', $controller_path . '\pages\DashboardPage@index')->name('dashboard');


    Route::get('datatable/roles', $controller_path . '\DatatableController@roles')->name('datatable.roles');

    // Route::get('/users/admin', $controller_path . '\pages\users\UsersAdmin@index')->name('users-admin');
    // Route::get('/users', $controller_path . '\UserController@index')->name('users');
    Route::resource('users', $controller_path . '\UserController');
    Route::get('datatable/users', $controller_path . '\DatatableController@users')->name('datatable.users');

    Route::get('/users/barber', $controller_path . '\pages\users\UsersBarber@index')->name('users-barber');
    Route::get('/users/client', $controller_path . '\pages\users\UsersClient@index')->name('users-client');

    Route::get('/appointments', $controller_path . '\AppointmentController@index')->name('appointments');
    Route::get('datatable/appointments', $controller_path . '\DatatableController@appointments')->name('datatable.appointments');


    Route::get('/services', $controller_path . '\ServiceController@index')->name('services');
    Route::get('datatable/services', $controller_path . '\DatatableController@services')->name('datatable.services');

    Route::get('/premises', $controller_path . '\PremiseController@index')->name('premises');
    Route::get('datatable/premises', $controller_path . '\DatatableController@premises')->name('datatable.premises');

});



    // Separar rutas entre dashboard (para admin y barber) y home (para client)

    // Route::get('/dashboard', [App\Http\Controllers\pages\DashboardPage::class, 'index'])->name('dashboard');

    // Rutas para el Admin y el Barber segun spaite/permission

    // Route::middleware(['role:Admin|Barber'])->group(function () {

    //     Route::get('/dashboard', function () {
    //         return view('content.pages.dashboard.dashboard');
    //     })->name('dashboard');

    //     // Usuarios
    //     Route::resource('users', UserController::class);
    //     Route::get('datatable/users', [DatatableController::class], 'users')->name('datatable.users');

    //     // Barberos
    //     Route::resource('barbers', BarberController::class);
    //     Route::get('datatable/barbers', [DatatableController::class], 'barbers')->name('datatable.barbers');

    //     // Citas
    //     Route::resource('appointments', AppointmentController::class);
    //     Route::get('datatable/appointments', [DatatableController::class], 'appointments')->name('datatable.appointments');

    //     // Servicios
    //     Route::resource('services', ServiceController::class);
    //     Route::get('datatable/services', [DatatableController::class], 'services')->name('datatable.services');
    // // });





    /*
    // Grupo de rutas para el Dashboard
        // Usuarios
        Route::resource('users', UserController::class);
        Route::get('datatable/users', [DatatableController::class], 'users')->name('datatable.users');

        // Barberos
        Route::resource('barbers', BarberController::class);
        Route::get('datatable/barbers', [DatatableController::class], 'barbers')->name('datatable.barbers');

        // Citas
        Route::resource('appointments', AppointmentController::class);
        Route::get('datatable/appointments', [DatatableController::class], 'appointments')->name('datatable.appointments');

        // Servicios
        Route::resource('services', ServiceController::class);
        Route::get('datatable/services', [DatatableController::class], 'services')->name('datatable.services');
    */

// });
