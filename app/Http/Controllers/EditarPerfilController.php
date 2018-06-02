<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsuarioEditRequest2;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;


use App\Rol;

class EditarPerfilController extends Controller
{
     public function edit($id)
    {
        $usuario = User::find($id);
       
        
       
        return view('administration.docente.edit',compact('usuario'));

    }

    public function update(Request $request, $id)
    {

        $data = $request; 
        $password = $data['password'];
        $usuario = User::find($id);
        $this->validate($request, [
                         'dni'   => [ 'required', 'max:10', Rule::unique('users')->ignore($usuario->id), ],
                          'abreviatura'   => [ 'required', 'max:255' ],
                        'name'   => [ 'required', 'max:255' ],
                        'last_name' => [ 'required', 'max:255' ],  
                        'address' => [ 'required', 'max:255' ],  
                                             
                        'email'     => [ 'required', Rule::unique('users')->ignore($usuario->id), ],
                        
                    ]);
        
       
            
            if($password==null){ // que no me sobreescriba el password  con un valor null

                 $usuario->fill([
                    'dni' => $request['dni'],
                     'abreviatura' => $request['abreviatura'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                   
                   
                   
                ]);

            }else{ // caso contrario que me actualize la nueva contraseña
            $usuario->fill([ 

                    'dni' => $request['dni'],
                   'abreviatura' => $request['abreviatura'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    
                ]);
                
            }
     
        if($usuario->save()){
            return Redirect::to('docente/MiPerfil')->with('mensaje-registro', 'Usuario Actualizado Correctamente');
        }
    }
}
