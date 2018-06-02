<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolRequest;
use Illuminate\Http\Request;
use App\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;

class RolController extends Controller
{
    public function index(Request $request){
       

         $roles = Rol::where('state',1)->orderBy('id')->paginate(6);
       
         
        
          return view('administration.roles.index',compact('roles'));

    }

    public function create(){
         
        return view ('administration.roles.create');
    }

    public function store(RolRequest $request){
        $rol= new Rol;
        $rol->rol=$request['rol'];
        $rol->description=$request['description'];
        $rol->state ='1';
        $rol->save();
        if($rol->save()){
            return Redirect::to('administracion/roles/create')->with('mensaje-registro', 'Rol Registrado Correctamente');
        }
    }

    public function show ($id){
      

    }

    public function edit($id){
        $rol = Rol::find($id);
     


        return view('administration.roles.edit',compact('rol'));


    }

    public function update(RolRequest $request, $id){
        $rol = Rol::find($id);
        $rol->fill($request->all());

        if($rol->save()){
            return Redirect::to('administracion/roles')->with('mensaje-registro', 'Rol Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $rol = Rol::find($id);
        $rol->state = 0;
        $rol->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $rol->id,
                'message' => $message
            ]);
        }
    }

    public function insertarLista(RolRequest $request){

        InsertarPrimero($request);
        return view ('administration.roles.store');

    }

     public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/roles')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }    

    
}
