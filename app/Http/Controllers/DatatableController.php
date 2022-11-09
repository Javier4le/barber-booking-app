<?php

namespace App\Http\Controllers;

use App\Models\AppointmentServiceBarber;
use App\Models\Premise;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
  public function users()
  {
    $users = User::all();
    return datatables()->of($users)->toJson();
  }

  public function appointments()
  {
    $appointments = AppointmentServiceBarber::all();
    $appointments->load('appointment', 'appointment.user' , 'appointment.premise' , 'service' , 'barber');

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
