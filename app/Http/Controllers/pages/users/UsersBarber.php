<?php

namespace App\Http\Controllers\pages\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersBarber extends Controller
{
  public function index()
  {

    return view('content.pages.users.users-barber');
  }
}
