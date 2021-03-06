<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


use App\User;
use App\Http\Requests\AsignaturaRequest;
use Illuminate\Validation\Rule;


use App\Asignatura;
use App\Semestre;
use App\AsignaturaSemestre;
use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;

class AsignaturaController extends Controller
{
    public function index(Request $request){
       

         $asignaturas = Asignatura::where('state',1)->orderBy('id')->paginate(6);

          return view('administration.asignaturas.index',compact('asignaturas'));

    }

     public function create(){

        $usuarios= User::where('state',1)->get();
        $semestres = Semestre::where('state',1)->get();
         
        return view ('administration.asignaturas.create',compact('semestres','usuarios'));
    }

    public function store(AsignaturaRequest $request){
        $asignatura =Asignatura::create($request->all());
        $total_semestres = $request->semestres;
        foreach($total_semestres as $semestre){
            AsignaturaSemestre::create([
                'asignatura_id'=>$asignatura->id,
                'semestre_id'=>$semestre,
            ]);
        }
        if($asignatura->save()){
            return Redirect::to('administracion/asignaturas/create')->with('mensaje-registro', 'Registrado Correctamente');
        }
    }

    public function show ($id){
      

    }

    public function edit($id){
        $asignatura = Asignatura::find($id);
        $usuarios= User::where('state',1)->get();
        $semestres = Semestre::where('state',1)->get();
     


        return view('administration.asignaturas.edit',compact('asignatura', 'usuarios', 'semestres'));


    }

    public function update(AsignaturaRequest $request, $id){
        $asignatura = Asignatura::find($id);

    
        $asignatura->fill($request->all());

        $asignatura->semestres()->sync($request->get('semestres'));

        if($asignatura->save()){
            return Redirect::to('administracion/asignaturas')->with('mensaje-registro', 'Registro Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $asignaturas = Asignatura::find($id);
        $asignaturas->state = 0;
        $asignaturas->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $asignaturas->id,
                'message' => $message
            ]);
        }
    }

    public function insertarLista(AsignaturaRequest $request){

        InsertarPrimero($request);
        return view ('administration.asignaturas.store');

    }

     public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/asignaturas')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }
}
