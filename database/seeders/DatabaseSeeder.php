<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

         $admin = \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'rathnakhen@gmail.com',
             'email_verified_at' => now(),
             'role_id' => '1',
             'password' => Hash::make('password')
         ]);
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'role_id' => '3',
            'password' => Hash::make('password')
        ]);

       $this->call([
             CategorySeeder::class,
             BrandSeeder::class,
             ProductSeeder::class,
             PermissionSeeder::class,
             RoleSeeder::class
       ]);
        $role = Role::find(1);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole($role);
        // User default viewer role
        $role = Role::find(4);
        $user->assignRole($role);
    }
}
