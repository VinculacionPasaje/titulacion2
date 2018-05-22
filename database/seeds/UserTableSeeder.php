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
            'name'=>'Super',
            'last_name'=>'Admin',
            'email'=> 'jfnando_cas_30_@hotmail.com',
            'password'=> bcrypt('123456'),
            'address'=> 'Gonzales Rubio',
            'rol_id'=>'1',


        ]);
       
    }
}
