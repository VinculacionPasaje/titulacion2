<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use Session;

use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;


class UserController extends Controller
{
     /**
      * guarda un usuario en la BD
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
      public function register(UserRequest $request)
      {
           
            
        User::create([
            'dni' => $request['dni'],
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'rol_id'=>'2',
           
        ]);
       
            return Redirect::to('login')->with('mensaje-registro', 'Usuario Registrado Correctamente, ahora proceda a logearse');
      }
}
