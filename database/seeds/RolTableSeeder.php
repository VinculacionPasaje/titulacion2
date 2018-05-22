<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'rol'=>'Admin',
            'description'=>'rol para el usuario administrador',
            'state'=>'1',

        ]);

         
    }
}
