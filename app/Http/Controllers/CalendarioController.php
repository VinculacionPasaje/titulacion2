<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


use App\Salon;
use App\Http\Requests\CalendarioRequest;
use Illuminate\Validation\Rule;


use App\Calendario;
use App\Anio;

class CalendarioController extends Controller
{
    public function index(Request $request){
       

         $calendarios = Calendario::where('state',1)->orderBy('id')->paginate(6);

          return view('administration.calendarios.index',compact('calendarios'));

    }

     public function create(){

        $anios= Anio::where('state',1)->get();
        $salones = Salon::where('state',1)->get();
         
        return view ('administration.calendarios.create',compact('anios','salones'));
    }

    public function store(CalendarioRequest $request){
        $laboratorio= $request['salon_id'];
        $anio= $request['anio_id'];
        $hemisemestre= $request['hemisemestres'];

        $repetido= Calendario::where('salon_id',$laboratorio)->where('anio_id',$anio)->where('hemisemestres',$hemisemestre)->where('state',1)->get();
        
        if($repetido->count()){ //calendario repetido

         return Redirect::to('administracion/calendarios/create')->with('mensaje-error', 'Ya existe un Calendario con el mismo Laboratorio, Año y Hemisemestre, por favor seleccione otras opciones');


        }else{

             $calendario =Calendario::create($request->all());
            if($calendario->save()){
                return Redirect::to('administracion/calendarios/create')->with('mensaje-registro', 'Registrado Correctamente');
            }

        }
        


       
    }

    public function show ($id){
      

    }

    public function edit($id){
        $calendario = Calendario::find($id);
        $anios= Anio::where('state',1)->get();
        $salones = Salon::where('state',1)->get();
     


        return view('administration.calendarios.edit',compact('calendario', 'anios', 'salones'));


    }

    public function update(CalendarioRequest $request, $id){
        $calendario = Calendario::find($id);
        $calendario->fill($request->all());

        if($calendario->save()){
            return Redirect::to('administracion/calendarios')->with('mensaje-registro', 'Registro Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $calendarios = Calendario::find($id);
        $calendarios->state = 0;
        $calendarios->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $calendarios->id,
                'message' => $message
            ]);
        }
    }

     public function crearPilaCalendario(){
         $pila= new Pila(30);

         return $pila;

    }
}
