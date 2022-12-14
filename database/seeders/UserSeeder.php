<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'phone' => '+56912345678',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        User::create([
            'first_name' => 'Barber',
            'phone' => '+56912345678',
            'username' => 'barber',
            'email' => 'barber@email.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'first_name' => 'Client',
            'phone' => '+56912345678',
            'username' => 'client',
            'email' => 'client@email.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);



        User::factory()
            ->count(20)
            ->state(['role_id' => 3 ])
            ->create();

        User::factory()
            ->count(7)
            ->state(['role_id' => 2 ])
            ->create();



        // Agrega un local por barbero y varios servicios por barbero
        $locations = Location::all();
        $services = Service::all();
        $barbers = User::where('role_id', 2)->get();
        $barbers->each(function ($barber) use ($locations, $services) {
            $barber->locations()->attach(
                $locations->random()->id,
                [
                    'service_id' => $services->random()->id,
                ]
            );
        });
    }
}
