<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
          'role-list',
          'role-create',
          'role-edit',
          'role-delete',
          'product-list',
          'product-create',
          'product-edit',
          'product-delete'
        ];
        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

    }
}
