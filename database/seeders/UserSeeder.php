<?php

namespace Database\Seeders;

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

        User::factory()
            ->count(20)
            ->create();
    }
}
