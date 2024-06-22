<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Voer de database seeds uit.
     */
    public function run()
    {
        Permission::create(['name' => 'Rol bekijken']);
        Permission::create(['name' => 'Rol bewerken']);
        Permission::create(['name' => 'Rol aanmaken']);
        Permission::create(['name' => 'Rol verwijderen']);

        Permission::create(['name' => 'Gebruiker bekijken']);
        Permission::create(['name' => 'Gebruiker bewerken']);
        Permission::create(['name' => 'Gebruiker aanmaken']);
        Permission::create(['name' => 'Gebruiker verwijderen']);

        Permission::create(['name' => 'Recht bekijken']);
        Permission::create(['name' => 'Recht bewerken']);
        Permission::create(['name' => 'Recht aanmaken']);
        Permission::create(['name' => 'Recht verwijderen']);

        Permission::create(['name' => 'Rooster bekijken']);
        Permission::create(['name' => 'Rooster bewerken']);
        Permission::create(['name' => 'Rooster aanmaken']);
        Permission::create(['name' => 'Rooster verwijderen']);

        Permission::create(['name' => 'Patiënt bekijken']);
        Permission::create(['name' => 'Patiënt bewerken']);
        Permission::create(['name' => 'Patiënt aanmaken']);
        Permission::create(['name' => 'Patiënt verwijderen']);




    }
}
