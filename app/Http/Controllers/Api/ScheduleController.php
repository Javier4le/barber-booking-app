<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ScheduleServiceInterface;
use App\Models\Schedule;
use App\Providers\ScheduleServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function hours(Request $request, ScheduleServiceInterface $scheduleServiceInterface)
    {
        // dd($request);
        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'barber_id' => 'required|exists:users,id',
        ];

        $this->validate($request, $rules);

        $date = $request['date'];
        $barberId = $request['barber_id'];

        return $scheduleServiceInterface->getAvailableIntervals($date, $barberId);
    }
}
