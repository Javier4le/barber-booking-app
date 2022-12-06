<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function barbers(Service $service)
    {
        // dd($service);

        return $service->users()->get([
            'users.id',
            'users.first_name',
            'users.last_name',
        ]);
    }
}
