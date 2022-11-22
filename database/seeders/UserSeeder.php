<?php

namespace Database\Seeders;

// use App\Models\Barber;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'first_name' => 'Administrador',
            'last_name' => '',
            'phone_number' => '',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ])->assignRole('Admin');


        // Barber::create([
        //     'first_name' => 'Barbero',
        //     'last_name' => '',
        //     'phone_number' => '',
        //     'username' => 'barber',
        //     'email' => 'barber@email.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'remember_token' => Str::random(10),
        //     'created_at' => now(),
        // ])->assignRole('Barber');


        // User::create([
        //     'first_name' => 'Cliente',
        //     'last_name' => '',
        //     'phone_number' => '',
        //     'username' => 'client',
        //     'email' => 'client@email.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'remember_token' => Str::random(10),
        //     'created_at' => now(),
        // ])->assignRole('Client');
    }
}
