<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;



use App\Http\Requests\ReporteRequest;
use Illuminate\Validation\Rule;


use App\Asistencia;
use App\AsignaturaCalendario;
use App\Calendario;
use DB;
use PDO;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{
    public function index(Request $request){
       

       
         $calendarios= Calendario::where('state',1)->get();

          return view('administration.reportes.index',compact('calendarios'));

    }

     public function pdf(ReporteRequest $request)
    { 
        $fecha_inicio= $request['fecha_inicial'];
        $fecha_fin= $request['fecha_final'];
        $id_calendario= $request['calendario_id'];

         $calendario = Calendario::find( $id_calendario);

           
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/

        
        $asistencias =Asistencia::where('state',1)->whereBetween('fecha', [$fecha_inicio, $fecha_fin])->get(); 
      

        $pdf = PDF::loadView('administration.reportes.listado', compact('asistencias', 'id_calendario', 'calendario'))->setPaper('a4', 'landscape');

        return $pdf->download('reporte.pdf');
    }
}
