<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;



use App\Http\Requests\AsistenciaRequest;
use App\Http\Requests\VerificarAsistenciaRequest;
use Illuminate\Validation\Rule;


use App\Asistencia;
use App\AsignaturaCalendario;
use App\Calendario;
use DB;
use PDO;

class AsistenciaController extends Controller
{
    public function index(Request $request){
       

         $asistencias = Asistencia::where('state',1)->orderBy('fecha')->paginate(15);
         $calendarios= Calendario::where('state',1)->get();

          return view('administration.asistencias.index',compact('asistencias', 'calendarios'));

    }

    public function store(VerificarAsistenciaRequest $request){
        date_default_timezone_set('America/Guayaquil');
        $hora_actual= date('h:i:s');

        $fecha= $request['fecha'];
        $calendario_id= $request['calendario_id'];
        $dia_de_la_semana= $this->get_nombre_dia($fecha);

           
        


        $asistencias= Asistencia::where('fecha',$fecha)->where('state',1)->get();
       
        $calendarios= AsignaturaCalendario::where('dia_semana',$dia_de_la_semana)->where('calendario_id',$calendario_id)->where('state',1)->get();

      
        
        if($asistencias->count()){ // hay datos en la tabla asistencias
             foreach($calendarios as $calendario){

              foreach($asistencias as $asistencia){

                  if($calendario->id==$asistencia->detalle_calendario_id ){ //significa que si asistio a su hora de clase
                    
                       
                    }else{ //no asistio a su hora de clase
                        $asistencias2= Asistencia::where('detalle_calendario_id',$calendario->id)->where('state',1)->get();
                        if($asistencias2->count() )
                        {
                            
                        }else{
                             $registro= new Asistencia;
                                $registro->firma="No Asistio";
                                $registro->fecha=$fecha;
                                $registro->hora=$hora_actual;
                                $registro->justificacion='0'; //no justificado
                                $registro->state ='1';
                                $registro->detalle_calendario_id= $calendario->id;
                                $registro->save();

                        }
                        
                       

                       

                    }


                }
            }

        }else{

            foreach($calendarios as $calendario){

              
                        
                        $registro= new Asistencia;
                        $registro->firma="No Asistio";
                        $registro->fecha=$fecha;
                        $registro->hora=$hora_actual;
                        $registro->justificacion='0'; //no justificado
                        $registro->state ='1';
                        $registro->detalle_calendario_id= $calendario->id;
                        $registro->save();

                       

                    


                
            }

            

        }
        
        


  
      
      
       
        //if($registro->save()){
            return Redirect::to('administracion/asistencias')->with('mensaje-registro', 'Asistencias Verificadas Correctamente');
        //}
    }

   

    public function edit($id){
        $asistencia = Asistencia::find($id);
        $asignaturas_calendarios= AsignaturaCalendario::where('state',1)->get();
        return view('administration.asistencias.edit',compact('asistencia', 'asignaturas_calendarios'));


    }

    public function update(AsistenciaRequest $request, $id){
        $asistencia = Asistencia::find($id);
         $asistencia->fill([ 

                    'justificacion' => $request['justificacion'],
                  
                ]);
                
            
     

        if($asistencia->save()){
            return Redirect::to('administracion/asistencias')->with('mensaje-registro', 'Falta justificada Correctamente');
        }



    }

    
    public function get_nombre_dia($fecha){
            $fechats = strtotime($fecha); //pasamos a timestamp

            //el parametro w en la funcion date indica que queremos el dia de la semana
            //lo devuelve en numero 0 domingo, 1 lunes,....
            switch (date('w', $fechats)){
                case 0: return "Domingo"; break;
                case 1: return "Lunes"; break;
                case 2: return "Martes"; break;
                case 3: return "Miercoles"; break;
                case 4: return "Jueves"; break;
                case 5: return "Viernes"; break;
                case 6: return "Sabado"; break;
            }
    }

    public function insertarLista(AsistenciaRequest $request){

        InsertarPrimero($request);
        return view ('administration.asistencias.store');

    }

     public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/asistencias')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }    
    
   
}
