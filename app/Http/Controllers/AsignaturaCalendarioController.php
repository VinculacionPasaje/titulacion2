<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


use App\AsignaturaCalendario;
use App\Http\Requests\AsignaturaCalendarioRequest;
use Illuminate\Validation\Rule;


use App\Calendario;
use App\Asignatura;

class AsignaturaCalendarioController extends Controller
{
      public function index(Request $request){
       

         $asignaturas_calendarios = AsignaturaCalendario::where('state',1)->orderBy('id')->paginate(6);

          return view('administration.asignaturas_calendarios.index',compact('asignaturas_calendarios'));

    }

     public function create(){

        $asignaturas= Asignatura::where('state',1)->get();
        $calendarios = Calendario::where('state',1)->get();
         
        return view ('administration.asignaturas_calendarios.create',compact('asignaturas','calendarios'));
    }

    public function store(AsignaturaCalendarioRequest $request){
        $hora_inicio= (int)$request['hora_inicio'];
        $hora_fin= (int)$request['hora_fin'];
        $hora = $hora_fin - $hora_inicio;

        $dia_de_la_semana= $request['dia_semana'];
        $calendario_id= $request['calendario_id'];

         $id_calendario= $request['calendario_id'];
         $calendario = Calendario::find($id_calendario);

         $registro_repetido= AsignaturaCalendario::where('dia_semana',$dia_de_la_semana)->where('calendario_id',$calendario_id)->where('hora_inicio',$hora_inicio)->where('hora_fin',$hora_fin)->get();

         $horario_repetido= AsignaturaCalendario::where('hora_inicio',$hora_inicio)->where('hora_fin',$hora_fin)->get();



         if($registro_repetido->count()){

             return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-error', 'Ya se encuentra un registro con el mismo Horario, Calendario y Día de Semana');


         }else{


            if($calendario->tamanio<=0){

            return Redirect::to('administracion/asignaturas_calendarios')->with('mensaje-error', 'Este Calendario ya esta lleno');


        }else{

             if($calendario->tamanio<$hora){
                 return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-error', 'Horas insuficientes');

             }else{

                    $nuevo_tamanio= $calendario->tamanio -$hora; 
                    

                   

                      $calendario->fill([
                           

                      'tamanio' =>  $nuevo_tamanio,
                   
                   
                    ]);

                    $calendario->save();

                   

                     
                    
                    $asignatura_calendario =AsignaturaCalendario::create($request->all());
                    //$asignatura_calendario->id;
                

                    if($asignatura_calendario->save()){
                        return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-registro', 'Registrado Correctamente');
                    }



             }

        }




             
         }
      

        
    }

    public function show ($id){
      

    }

    public function edit($id){
        $asignatura_calendario = AsignaturaCalendario::find($id);
        $asignaturas= Asignatura::where('state',1)->get();
        $calendarios = Calendario::where('state',1)->get();
     


        return view('administration.asignaturas_calendarios.edit',compact('asignatura_calendario', 'asignaturas', 'calendarios'));


    }

    public function update(AsignaturaCalendarioRequest $request, $id){
        $calendario = AsignaturaCalendario::find($id);
        $calendario->fill($request->all());

        if($calendario->save()){
            return Redirect::to('administracion/asignaturas_calendarios')->with('mensaje-registro', 'Registro Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $asignaturas_calendarios = AsignaturaCalendario::find($id);
        $asignaturas_calendarios->state = 0;
        $asignaturas_calendarios->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $asignaturas_calendarios->id,
                'message' => $message
            ]);
        }
    }
}
