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

         Rol::create([
            'rol'=>'Docente',
            'description'=>'rol para el usuario docente',
            'state'=>'1',

        ]);

         
    }
}
