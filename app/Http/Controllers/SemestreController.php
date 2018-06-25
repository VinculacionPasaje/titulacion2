<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemestreRequest;
use Illuminate\Http\Request;
use App\Semestre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;

class SemestreController extends Controller
{
    public function index(Request $request){
       

         $semestres = Semestre::where('state',1)->orderBy('id')->paginate(6);

          return view('administration.semestres.index',compact('semestres'));

    }

    public function create(){
         
        return view ('administration.semestres.create');
    }

    public function store(SemestreRequest $request){
      
        $semestre_repetido = Semestre::where('semestre',$request['semestre'])->where('paralelo',$request['paralelo'])->where('state',1)->get();
        if($semestre_repetido->count()){
             return Redirect::to('administracion/semestres/create')->with('mensaje-error', 'El semestre y paralelo ya se encuentran registrados');
           
        }else{
              $semestre= new Semestre;
            $semestre->semestre=$request['semestre'];
            $semestre->paralelo=$request['paralelo'];
            $semestre->state ='1';
            $semestre->save();
            if($semestre->save()){
                    return Redirect::to('administracion/semestres/create')->with('mensaje-registro', 'Registrado Correctamente');
                }

        }
        
    }

    public function show ($id){
      

    }

    public function edit($id){
        $semestre = Semestre::find($id);
     


        return view('administration.semestres.edit',compact('semestre'));


    }

    public function update(SemestreRequest $request, $id){
        $semestre = Semestre::find($id);
        $semestre->fill($request->all());

        if($semestre->save()){
            return Redirect::to('administracion/semestres')->with('mensaje-registro', 'Registro Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $semestre = Semestre::find($id);
        $semestre->state = 0;
        $semestre->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $semestre->id,
                'message' => $message
            ]);
        }
    }

    public function insertarLista(SemestreRequest $request){

        InsertarPrimero($request);
        return view ('administration.semestres.store');

    }

    public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/semestres')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }
}
