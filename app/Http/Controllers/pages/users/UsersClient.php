<?php

namespace App\Http\Controllers\pages\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersClient extends Controller
{
  public function index()
  {

    return view('content.pages.users.users-client');
  }
}
