<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLES
        $adminRole = Role::create(['name' => 'Admin']);
        $barberRole = Role::create(['name' => 'Barber']);
        $clientRole = Role::create(['name' => 'Client']);


        // PERMISOS

        // Dashboard
        Permission::create(['name' => 'dashboard'])->syncRoles([$adminRole, $barberRole]);

        // Usuarios
        Permission::create(['name' => 'users.index'])->syncRoles([$adminRole, $barberRole]);
        Permission::create(['name' => 'users.show'])->syncRoles([$adminRole, $barberRole]);
        Permission::create(['name' => 'users.create'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$adminRole]);

        // Barberos
        Permission::create(['name' => 'appointments'])->syncRoles([$adminRole, $barberRole]);

        // Citas
        Permission::create(['name' => 'services.index'])->syncRoles([$adminRole, $barberRole]);
        Permission::create(['name' => 'services.show'])->syncRoles([$adminRole, $barberRole]);
        Permission::create(['name' => 'services.create'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'services.edit'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'services.destroy'])->syncRoles([$adminRole]);

        // Servicios
        Permission::create(['name' => 'premises.index'])->syncRoles([$adminRole, $barberRole]);
        Permission::create(['name' => 'premises.show'])->syncRoles([$adminRole, $barberRole]);
        Permission::create(['name' => 'premises.create'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'premises.edit'])->syncRoles([$adminRole]);
        Permission::create(['name' => 'premises.destroy'])->syncRoles([$adminRole]);
    }
}
