<?php

namespace App\Http\Controllers;

use App\Models\AppointmentServiceBarber;
use App\Models\Barber;
use App\Models\Premise;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DatatableController extends Controller
{
  public function roles()
  {
    $roles = Role::all();
    $roles_has_models = [];


    foreach ($roles as $role) {
      $roles_has_models[$role->name] = [];

      dd($role->all());
      dd($role->users());

      // foreach ($role->users as $user) {
      //   $roles_has_models[$role->name][] = $user;
      // }

      // foreach ($role->barbers as $barber) {
      //   $roles_has_models[$role->name][] = $barber;
      // }
    }

    // foreach ($roles as $role) {
    //   $roles_has_models[$role->name] = [];
    //   foreach ($role->barbers as $barber) {
    //     $roles_has_models[$role->name][] = $barber;
    //   }
    // }


    // return datatables()->of($roles_has_models)->toJson();
  }


  public function users()
  {
    $users = User::all();
    return datatables()->of($users)->toJson();
  }


  public function appointments()
  {
    $appointments = AppointmentServiceBarber::all();
    $appointments->load('appointment', 'appointment.user', 'appointment.premise', 'service', 'barber');

    // $appointments->load('user', 'service', 'premise');

    return datatables()->of($appointments)->toJson();
  }


  public function services()
  {
    $services = Service::all();
    return datatables()->of($services)->toJson();
  }


  public function premises()
  {
    $premises = Premise::all();
    return datatables()->of($premises)->toJson();
  }
}
