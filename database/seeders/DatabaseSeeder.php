<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            RoleSeeder::class,
            UserSeeder::class,
            // ServiceSeeder::class,
            // AppointmentSeeder::class,
        ]);

        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('Client');
        });

        Barber::factory(9)->create()->each(function ($barber) {
            $barber->assignRole('Barber');
        });
    }
}
