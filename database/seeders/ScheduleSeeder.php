<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea horarios para el usuario con id 2 (Barber), para los 7 días de la semana
        for ($i = 0; $i < 7; ++$i) {
            $schedule = Schedule::create([
                'day' => $i,
                'morning_start' => ($i == 0 ? '08:00:00' : '09:00:00'),
                'morning_end' => ($i == 0 ? '12:00:00' : '11:00:00'),
                'afternoon_start' => ($i == 0 ? '14:00:00' : '15:00:00'),
                'afternoon_end' => ($i == 0 ? '20:00:00' : '19:00:00'),
                'user_id' => 2,
            ]);
        }
    }
}
