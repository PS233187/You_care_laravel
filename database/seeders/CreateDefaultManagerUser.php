<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateDefaultManagerUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run()
    // {
    //     // Maak de standaard gebruiker aan
    //     $user = User::create([
    //         'name' => 'Admin',
    //         'email' => 'Admin@admin.com',
    //         'password' => bcrypt('Admin'),
    //     ]);

    //     $managerRole = Role::where('name', 'manager')->first();
    //     $user->assignRole($managerRole);
    //     $user->givePermissionTo(Permission::all());

    // }

    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('password')
        ]);



        $admin_role = Role::create(['name' => 'admin']);
        $manager_role = Role::create(['name' => 'manager']);


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

        $admin->assignRole($admin_role);
        $manager->assignRole($manager_role);



        $admin_role->givePermissionTo(Permission::all());
        $this->call(RolesSeeder::class);
    }
}
