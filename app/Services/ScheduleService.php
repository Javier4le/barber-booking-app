<?php

namespace App\Services;

use App\Interfaces\ScheduleServiceInterface;
use App\Models\Appointment;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleService implements ScheduleServiceInterface
{
    private function getDayFromDate($date)
    {
        $dateCarbon = new Carbon($date);
        $i = $dateCarbon->dayOfWeek;
        $day = ($i == 0) ? 6 : $i - 1;

        return $day;
    }


    public function isAvailableInterval($date, $barberId, Carbon $start)
    {
        $exists = Appointment::where('barber_id', $barberId)
        ->where('scheduled_date', $date)
        ->where('scheduled_time', $start->format('H:i:s'))
        ->exists();

        return !$exists;
    }


    public function getAvailableIntervals($date, $barberId)
    {
        $schedule = Schedule::where('active', true)
            ->where('day', $this->getDayFromDate($date))
            ->where('user_id', $barberId)
            ->first([
                'morning_start', 'morning_end',
                'afternoon_start', 'afternoon_end'
            ]);

        if (!$schedule) {
            return [];
        }

        $morningInterval = $this->generateInterval($schedule->morning_start, $schedule->morning_end, $barberId, $date);
        $afternoonInterval = $this->generateInterval($schedule->afternoon_start, $schedule->afternoon_end, $barberId, $date);

        // $data = [
        //     'morning' => $morningInterval,
        //     'afternoon' => $afternoonInterval,
        // ];

        $data = [];
        $data['morning'] = $morningInterval;
        $data['afternoon'] = $afternoonInterval;

        return $data;
    }


    private function generateInterval($start, $end, $barberId, $date)
    {
        $start = new Carbon($start);
        $end = new Carbon($end);
        $intervals = [];

        while ($start < $end) {
            $interval = [];
            $interval['start'] = $start->format('g:i A');

            $available = $this->isAvailableInterval($date, $barberId, $start);

            $start->addMinutes(30);
            $interval['end'] = $start->format('g:i A');

            if ($available) {
                $intervals[] = $interval;
            }

        }

        return $intervals;
    }
}
