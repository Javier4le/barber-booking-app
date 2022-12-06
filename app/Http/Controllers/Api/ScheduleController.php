<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function hours(Request $request)
    {
        // dd($request);
        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'barber_id' => 'required|exists:users,id',
        ];

        $this->validate($request, $rules);

        $date = $request['date'];
        $dateCarbon = new Carbon($date);
        $i = $dateCarbon->dayOfWeek;
        $day = ($i == 0) ? 6 : $i - 1;
        $barberId = $request['barber_id'];

        $schedule = Schedule::where('active', true)
            ->where('day', $day)
            ->where('user_id', $barberId)
            ->first([
                'morning_start', 'morning_end',
                'afternoon_start', 'afternoon_end'
            ]);

        if (!$schedule) {
            return [];
        }

        $morningInterval = $this->generateInterval($schedule->morning_start, $schedule->morning_end);
        $afternoonInterval = $this->generateInterval($schedule->afternoon_start, $schedule->afternoon_end);

        // $data = [
        //     'morning' => $morningInterval,
        //     'afternoon' => $afternoonInterval,
        // ];

        $data = [];
        $data['morning'] = $morningInterval;
        $data['afternoon'] = $afternoonInterval;

        return $data;
    }


    private function generateInterval($start, $end)
    {
        $start = new Carbon($start);
        $end = new Carbon($end);
        $intervals = [];

        while ($start < $end) {
            $interval = [];
            $interval['start'] = $start->format('g:i A');
            $start->addMinutes(30);

            $interval['end'] = $start->format('g:i A');
            $intervals[] = $interval;
        }

        return $intervals;
    }
}
