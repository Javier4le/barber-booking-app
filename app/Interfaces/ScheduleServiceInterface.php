<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface ScheduleServiceInterface
{
    public function isAvailableInterval($date, $barberId, Carbon $start);
    public function getAvailableIntervals($date, $barberId);
}
