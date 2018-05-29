<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Calendario;
use App\Asignatura;
use App\AsignaturaCalendario;
use App\Http\Requests\AsignaturaCalendarioRequest2;

class CalendarioDetalleController extends Controller
{
    public function calendario($id){
        
        $calendario = Calendario::find($id);
        $asignaturas_calendarios = AsignaturaCalendario::where('calendario_id',$calendario->id)->where('state',1)->orderBy('dia_semana')->paginate(6);
        return view('administration.calendarios.listado',compact('calendario', 'asignaturas_calendarios'));
     
    }

    public function nuevo_calendario($id){
        
        $calendario = Calendario::find($id);
        $asignaturas= Asignatura::where('state',1)->get();
        
        return view('administration.calendarios.nuevo',compact('calendario', 'asignaturas'));
     
    }

    public function store(AsignaturaCalendarioRequest2 $request, $id){
        $hora_inicio= (int)$request['hora_inicio'];
        $hora_fin= (int)$request['hora_fin'];
        $hora = $hora_fin - $hora_inicio;

        $dia_de_la_semana= $request['dia_semana'];
        $calendario_id= $id;

        $asignatura_id= $request['asignatura_id'];

         $id_calendario=$id;
         $calendario = Calendario::find($id_calendario);
         
         $bandera=false;
         $materia_repetida=false;

         
        $horario_repetido= AsignaturaCalendario::where('dia_semana',$dia_de_la_semana)->where('calendario_id',$calendario_id)->where('state',1)->get();
        if($hora_inicio==$hora_fin){
            return Redirect::to('administracion/calendarioAgregar/'.$id)->with('mensaje-error', 'La hora de inicio no puede ser el mismo que la hora final, por favor escoga un horario válido');

            
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
            return Redirect::to('administracion/calendarioAgregar/'.$id)->with('mensaje-error', 'La asignatura seleccionada ya se encuentra registrada en el mismo Día y Calendario, por favor seleccione otra asignatura');


        }else{

             if($bandera){

             return Redirect::to('administracion/calendarioAgregar/'.$id)->with('mensaje-error', 'Ya se encuentra un registro dentro del mismo Horario, Calendario y Día de Semana, por favor seleccione otro horario');


         }else{


            if($calendario->tamanio<=0){

            return Redirect::to('administracion/calendarios')->with('mensaje-error', 'Este Calendario ya esta lleno');


             }else{

             if($calendario->tamanio<$hora){
                 return Redirect::to('administracion/calendarioAgregar/'.$id)->with('mensaje-error', 'Horas insuficientes');

             }else{

                    $nuevo_tamanio= $calendario->tamanio -$hora; 
                    

                   

                      $calendario->fill([
                           

                      'tamanio' =>  $nuevo_tamanio,
                   
                   
                    ]);

                    $calendario->save();

                   
                     
                     AsignaturaCalendario::create([
                        'dia_semana' => $request['dia_semana'],
                        'hora_inicio' => $request['hora_inicio'],
                        'hora_fin' => $request['hora_fin'],
                        'calendario_id' => $calendario_id,
                        'asignatura_id' => $request['asignatura_id'],
                       
                    
                    ]);

                   
                    

                   
                    return Redirect::to('administracion/calendarios')->with('mensaje-registro', 'Calendario Registrado Correctamente');
                    



             }

        }




             
         }


        }
        

           }
      

        
    }


}
