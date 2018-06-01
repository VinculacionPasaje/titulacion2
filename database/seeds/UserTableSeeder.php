<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni'=>'0706829116',
            'abreviatura'=>'Ing.',
            'name'=>'Super',
            'last_name'=>'Admin',
            'email'=> 'jfnando_cas_30_@hotmail.com',
            'password'=> bcrypt('123456'),
            'address'=> 'Gonzales Rubio',
            'rol_id'=>'1',


        ]);

        User::create([
            'dni'=>'0701489577',
            'abreviatura'=>'Ing.',
            'name'=>'Jimmy',
            'last_name'=>'Castillo',
            'email'=> 'jfnando@hotmail.com',
            'password'=> bcrypt('123456'),
            'address'=> 'Gonzales Rubio',
            'rol_id'=>'2',


        ]);
       
    }
}
