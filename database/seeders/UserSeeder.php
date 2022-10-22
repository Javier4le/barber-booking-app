<?php

namespace Database\Seeders;

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
        // User::create([
        //     'first_name' => 'Administrador',
        //     'username' => 'Admin',
        //     'email' => 'admin@email.com',
        //     'password' => bcrypt('password'),
        // ]);

        if (config('admin.admin_name')) {
            User::firstOrCreate(
                [
                    'email' => config('admin.admin_email'),
                    'username' => config('admin.admin_username'),
                ],
                [
                    'first_name' => config('admin.admin_name'),
                    'email_verified_at' => now(),
                    'password' => bcrypt(config('admin.admin_password')),
                    'remember_token' => Str::random(10),
                ]
            );
        }

        User::factory()->count(10)->create();
    }
}
