<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Asignatura;
use App\Semestre;
use App\AsignaturaCalendario;
use App\Asistencia;




class FrontendController extends Controller
{
    public function index(){
         
     
     
       return view('auth.login');
   }

   

   public function admin(){
    
       return view('administration.index');
   }

    public function docente(){
    
       return view('administration.index_user');
   }

   public function mi_perfil()
    {
        return view('administration.docente.mi_perfil');
    }

     public function materias()
    {
        $id = Auth::user()->id;
        $asignatura = Asignatura::where('state',1)->where('user_id', $id)->get();
      
        foreach($asignatura as $item){

            $asignaturas_calendarios= AsignaturaCalendario::where('asignatura_id',$item->id)->where('state',1)->orderBy('dia_semana')->paginate(6);

        }

         
      
       
        return view('administration.docente.materias', compact('asignaturas_calendarios'));
    }

      public function asistencias()
    {
        $id = Auth::user()->id;
        $asignatura = Asignatura::where('state',1)->where('user_id', $id)->get();

         $asistencias = Asistencia::where('state',1)->orderBy('fecha')->paginate(50);

          $asignatura2 = Asignatura::where('state',1)->where('user_id', $id)->get();
        
      
        foreach($asignatura2 as $item){

            $asignaturas_calendarios= AsignaturaCalendario::where('asignatura_id',$item->id)->where('state',1)->get();

        }
      
       
        return view('administration.docente.asistencias', compact('asignaturas_calendarios', 'asistencias'));
    }

    
   
}
