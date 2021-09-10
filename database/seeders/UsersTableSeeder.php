<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        Role::create(['name' => 'cliente']);
        $superadministrador = Role::create(['name' => 'superadministrador']);
        $user = \App\Models\User::create([
                'name' => 'Administrador',
                'apellidoP' =>'***',
                'apellidoM' =>'***',
                'direccion' =>'***',
                'telefono' =>'*********',
                'tipo' =>'superadministrador',
                'email' => 'sevillanasuper@mail.com',
                'created_at'=>$date->format('Y-m-d'),
                'password' => bcrypt('sevillana2021')
            ]);

        $user->assignRole($superadministrador);
    }
}
