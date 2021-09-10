<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.show']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.destroy']);

        //Admin
        $superadministrador = Role::create(['name' => 'superadministrador']);

        $superadministrador->givePermissionTo([
            'categories.index',
            'categories.edit',
            'categories.show',
            'categories.create',
            'categories.destroy'
        ]);
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([
            'categories.index',
            'categories.show'
        ]);

        //User Admin
        $user = \App\Models\User::find(1);
        $user->assignRole('superadministrador');
    }
}
