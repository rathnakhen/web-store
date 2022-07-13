<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

         $userRole = Role::create(['name' => 'user']);
         $adminRole = Role::create(['name' => 'admin']);

         $admin = \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'rathnakhen@gmail.com',
             'email_verified_at' => now(),
             'role_id' => $adminRole->id,
             'password' => Hash::make('password')
         ]);
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'role_id' => $userRole->id,
            'password' => Hash::make('password')
        ]);

       $this->call([
             CategorySeeder::class,
             BrandSeeder::class,
             ProductSeeder::class
       ]);
    }
}
