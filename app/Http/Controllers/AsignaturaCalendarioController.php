<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


use App\AsignaturaCalendario;
use App\Http\Requests\AsignaturaCalendarioRequest;
use Illuminate\Validation\Rule;


use App\Calendario;
use App\Asignatura;
use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;

class AsignaturaCalendarioController extends Controller
{
      public function index(Request $request){
       

         $asignaturas_calendarios = AsignaturaCalendario::where('state',1)->orderBy('dia_semana')->paginate(6);

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

        $asignatura_id= $request['asignatura_id'];

         $id_calendario= $request['calendario_id'];
         $calendario = Calendario::find($id_calendario);
         
         $bandera=false;
         $materia_repetida=false;

         
        $horario_repetido= AsignaturaCalendario::where('dia_semana',$dia_de_la_semana)->where('calendario_id',$calendario_id)->where('state',1)->get();
        if($hora_inicio==$hora_fin){
            return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-error', 'La hora de inicio no puede ser el mismo que la hora final, por favor escoga un horario válido');

            
        }else{

      
        foreach($horario_repetido as $item){
            if($item->asignatura_id==$asignatura_id ){ //materia repetida en el mismo dia y calendario
                 $materia_repetida=true;
            

            }else{
                 if($hora_inicio>=(int)$item->hora_inicio && $hora_inicio < (int)$item->hora_fin  ){
                        $bandera=true;


                    }

            }
           

        }
        if($materia_repetida){
            return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-error', 'La asignatura seleccionada ya se encuentra registrada en el mismo Día y Calendario, por favor seleccione otra asignatura');


        }else{

             if($bandera){

             return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-error', 'Ya se encuentra un registro dentro del mismo Horario, Calendario y Día de Semana, por favor seleccione otro horario');


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

        $hora_inicio= (int)$request['hora_inicio'];
        $hora_fin= (int)$request['hora_fin'];
        $hora = $hora_fin - $hora_inicio;

        $dia_de_la_semana= $request['dia_semana'];
        $calendario_id= $request['calendario_id'];

         
         $calendario = Calendario::find($calendario_id);
         
         $bandera=false;

         
         $horario_repetido= AsignaturaCalendario::where('dia_semana',$dia_de_la_semana)->where('calendario_id',$calendario_id)->where('state',1)->get();

        foreach($horario_repetido as $item){
            
            if($hora_inicio>=(int)$item->hora_inicio && $hora_inicio < (int)$item->hora_fin  ){
                if($item->id==$id){ // es el mismo registro a editar
                    $bandera=false;
                   

                }else{
                    $bandera=true;

                }
                


            }

        }
         if($bandera){
            
            // return redirect()->to('administracion/asignaturas_calendarios/'.$id.'/edit')->with('mensaje-error', 'Ya se encuentra un registro dentro del mismo Horario, Calendario y Día de Semana, por favor seleccione otro horario');
             //return redirect()->route('administration.asignaturas_calendarios.edit', ['id' => $id])->with('mensaje-error', 'Ya se encuentra un registro dentro del mismo Horario, Calendario y Día de Semana, por favor seleccione otro horario');

             return Redirect::to('administracion/asignaturas_calendarios/'.$id.'/edit')->with('mensaje-error', 'Ya se encuentra un registro dentro del mismo Horario, Calendario y Día de Semana, por favor seleccione otro horario');


         }else{


            if($calendario->tamanio<=0){

              return Redirect::to('administracion/asignaturas_calendarios')->with('mensaje-error', 'Este Calendario ya esta lleno');


        }else{

             if($calendario->tamanio<$hora){

                  return Redirect::to('administracion/asignaturas_calendarios/'.$id.'/edit')->with('mensaje-error', 'Horas insuficientes');
                 
                // return Redirect::to('administracion/asignaturas_calendarios/create')->with('mensaje-error', 'Horas insuficientes');

             }else{

                    //Inicio de actualizar tamanio de calendario
                    $calendario2 = AsignaturaCalendario::find($id);
                    $id_calendario= $calendario2->calendario_id;

                    $asignaturas_calendarios = Calendario::find($id_calendario); //obtengo el calendario con el tamaño actual
                   
                    $resta_anterior= (int)$calendario2->hora_fin - (int)$calendario2->hora_inicio;
                  
                
                    $asignaturas_calendarios->tamanio= $asignaturas_calendarios->tamanio+$resta_anterior; 

                    $suma= (int)$request->hora_fin - (int)$request->hora_inicio; // obtengo las nuevas horas del request  

                    $asignaturas_calendarios->tamanio= $asignaturas_calendarios->tamanio - $suma;
                    $asignaturas_calendarios->save();
                    //fin de actualizar tamanio de calendario

                   

                     
                    
                     $calendario2->fill($request->all());

                        if($calendario2->save()){
                            return Redirect::to('administracion/asignaturas_calendarios')->with('mensaje-registro', 'Registro Actualizado Correctamente');
                        }



             }

        }




             
         }

        

      



    }
    
    public function destroy($id, Request $request)
    {
        $asignaturas_calendarios = AsignaturaCalendario::find($id);
        $suma= (int)$asignaturas_calendarios->hora_fin - (int)$asignaturas_calendarios->hora_inicio;


        $id_calendario= $asignaturas_calendarios->calendario_id;
        $calendario = Calendario::find($id_calendario);
        $calendario->tamanio= $calendario->tamanio+$suma;
        $calendario->save();

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

    public function insertarLista(AsignaturaCalendarioRequest $request){

        InsertarPrimero($request);
        return view ('administration.asignaturas_calendarios.store');

    }

     public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/asignaturas_calendarios')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }
}
