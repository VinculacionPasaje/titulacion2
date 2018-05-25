<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalonRequest;
use Illuminate\Http\Request;
use App\Salon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SalonController extends Controller
{
     public function index(Request $request){
       

         $salones = Salon::where('state',1)->orderBy('id')->paginate(6);

          return view('administration.salones.index',compact('salones'));

    }

    public function create(){
         
        return view ('administration.salones.create');
    }

    public function store(SalonRequest $request){
        $salon= new Salon;
        $salon->salon_clase=$request['salon_clase'];
        $salon->ubicacion=$request['ubicacion'];
        $salon->descripcion=$request['descripcion'];
        $salon->save();
        if($salon->save()){
            return Redirect::to('administracion/salones/create')->with('mensaje-registro', 'Registrado Correctamente');
        }
    }

    public function show ($id){
      

    }

    public function edit($id){
        $salon = Salon::find($id);
     


        return view('administration.salones.edit',compact('salon'));


    }

    public function update(SalonRequest $request, $id){
        $salon = Salon::find($id);
        $salon->fill($request->all());

        if($salon->save()){
            return Redirect::to('administracion/salones')->with('mensaje-registro', 'Registro Actualizado Correctamente');
        }



    }
    
    public function destroy($id, Request $request)
    {
        $salon = Salon::find($id);
        $salon->state = 0;
        $salon->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $salon->id,
                'message' => $message
            ]);
        }
    }
}
