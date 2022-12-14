<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LocationSeeder::class,
            ServiceSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ScheduleSeeder::class,
            AppointmentSeeder::class,
        ]);
    }
}
