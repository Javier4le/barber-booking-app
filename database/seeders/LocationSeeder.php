<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'name' => 'Barbería 1',
                'address' => 'Calle 1 # 1 - 1',
                'phone' => '+56912345678',
            ],
            [
                'name' => 'Barbería 2',
                'address' => 'Calle 2 # 2 - 2',
                'phone' => '+56912345678',
            ],
            [
                'name' => 'Barbería 3',
                'address' => 'Calle 3 # 3 - 3',
                'phone' => '+56912345678',
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
