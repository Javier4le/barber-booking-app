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

// Main Page Route

// pages

// Route::get('/', $controller_path . '\PagesController@home')->name('home');

Route::get('/', function(Request $request){
  echo("Esto es el home");
});

// Route::get('/', function () {
//     return view('home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';
    // Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    Route::get('/dashboard', $controller_path . '\pages\DashboardPage@index')->name('dashboard');

    // Route::get('/users/admin', $controller_path . '\pages\users\UsersAdmin@index')->name('users-admin');
    // Route::get('/users', $controller_path . '\UserController@index')->name('users');
    Route::resource('users', $controller_path . '\UserController');

    Route::get('/users/barber', $controller_path . '\pages\users\UsersBarber@index')->name('users-barber');
    Route::get('/users/client', $controller_path . '\pages\users\UsersClient@index')->name('users-client');

    Route::get('/appointments', $controller_path . '\AppointmentController@index')->name('appointments');
    Route::get('/services', $controller_path . '\ServiceController@index')->name('services');
    Route::get('/premises', $controller_path . '\PremiseController@index')->name('premises');

});
