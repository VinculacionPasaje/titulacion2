<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnioRequest;
use Illuminate\Http\Request;
use App\Anio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;


class AnioController extends Controller
{
    public function index(Request $request){
       

         $anios =   Anio::where('state',1)->orderBy('id')->paginate(6);
       
         
        
          return view('administration.anios.index',compact('anios'));

    }

    public function create(){
         
        return view ('administration.anios.create');
    }

    public function store(AnioRequest $request){
        $anio= new Anio;
        $anio->anio=$request['anio'];
        $anio->descripcion=$request['descripcion'];
        $anio->state ='1';
        $anio->save();
        if($anio->save()){
            return Redirect::to('administracion/anios/create')->with('mensaje-registro', 'Registrado Correctamente');
        }
    }

    public function show ($id){
      

    }

    public function edit($id){
        $anio = Anio::find($id);
     


        return view('administration.anios.edit',compact('anio'));


    }

    public function update(AnioRequest $request, $id){
        $anio = Anio::find($id);
        $anio->fill($request->all());

        if($anio->save()){
            return Redirect::to('administracion/anios')->with('mensaje-registro', 'Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $anio = Anio::find($id);
        $anio->state = 0;
        $anio->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $anio->id,
                'message' => $message
            ]);
        }
    }

    public function insertarLista(AnioRequest $request){

        InsertarPrimero($request);
        return view ('administration.anios.store');

    }

     public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/anios')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }


}
