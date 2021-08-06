<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $admin->givePermissionTo('create');
        $admin->givePermissionTo('update');
        $admin->givePermissionTo('delete');

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        $user->givePermissionTo('update');
    }
}
