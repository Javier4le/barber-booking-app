<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Corte de cabello',
                'price' => 12000,
                'duration' => 45,
                'description' => 'Corte de cabello para caballeros',
            ],
            [
                'name' => 'Lavado de cabello',
                'price' => 8000,
                'duration' => 20,
                'description' => 'Lavado de cabello para caballeros',
            ],
            [
                'name' => 'Corte de barba',
                'price' => 8000,
                'duration' => 20,
                'description' => 'Corte de barba para caballeros',
            ],
            [
                'name' => 'Corte de cabello y barba',
                'price' => 18000,
                'duration' => 60,
                'description' => 'Corte de cabello y barba para caballeros',
            ],
            [
                'name' => 'Corte de cabello y lavado',
                'price' => 18000,
                'duration' => 60,
                'description' => 'Corte de cabello y lavado para caballeros',
            ],
            [
                'name' => 'Corte de cabello, barba y lavado',
                'price' => 24000,
                'duration' => 75,
                'description' => 'Corte de cabello, barba y lavado para caballeros',
            ],
        ];

        foreach ($services as $serviceName) {
            $service = Service::create($serviceName);

            $service->users()->saveMany(
                User::factory(rand(1, 4))->state(['role_id' => 2])->make()
            );

            User::find(2)->services()->save($service);
        }
    }
}
