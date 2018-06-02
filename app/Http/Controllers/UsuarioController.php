<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


use App\User;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioEditRequest;
use Illuminate\Validation\Rule;


use App\Rol;

use App\TADLista\Nodo;
use App\TADLista\ListaEnlazada;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::where('state',1)->orderBy('id')->paginate(6);
       

        return View('administration.usuarios.index',compact('usuarios'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $roles = Rol::where('state',1)->get();
       

        
        return View('administration.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
       
        User::create([
            'dni' => $request['dni'],
            'abreviatura' => $request['abreviatura'],
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'rol_id'=>$request['rol_id'],
           
        ]);
        return Redirect::to('administracion/usuarios/create')->with('mensaje-registro', 'Usuario Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Rol::where('state',1)->get();
        
       
        return view('administration.usuarios.edit',compact('usuario','roles'));

    }

    /**
     * Update the specified resource in storage.
     *  "Fill" significa literalmente "llenar". Cuando se utiliza el método fill() en un modelo, establece los atributos del modelo a los que le pasemos como argumento en un array. Un ejemplo y quedará claro:
    *   $user = new User();

    *   $user->fill([
    *   'username' => 'IsraelOrtuno',
    *   'email' => 'laraveles@mail.com'
    *   ]);
    *   Esto sería el equivalente a hacer:
    *   $user = new User();

    *   $user->username = 'IsraelOrtuno';
    *   $user->email = 'laraveles@mail.com';
    *   Puede usarse tanto en una instancia nueva de un modelo, como con una existente, simplemente establece atributos de forma masiva.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request; 
        $password = $data['password'];
        $usuario = User::find($id);
        $this->validate($request, [
                         'dni'   => [ 'required', 'max:10', Rule::unique('users')->ignore($usuario->id), ],
                          'abreviatura'   => [ 'required', 'max:255' ],
                        'name'   => [ 'required', 'max:255' ],
                        'last_name' => [ 'required', 'max:255' ],  
                        'address' => [ 'required', 'max:255' ],  
                                             
                        'email'     => [ 'required', Rule::unique('users')->ignore($usuario->id), ],
                        
                    ]);
        
       
            
            if($password==null){ // que no me sobreescriba el password  con un valor null

                 $usuario->fill([
                    'dni' => $request['dni'],
                     'abreviatura' => $request['abreviatura'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'rol_id'=>$request['rol_id'],
                   
                ]);

            }else{ // caso contrario que me actualize la nueva contraseña
            $usuario->fill([ 

                    'dni' => $request['dni'],
                   'abreviatura' => $request['abreviatura'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'rol_id'=>$request['rol_id'],
                ]);
                
            }
     
        if($usuario->save()){
            return Redirect::to('administracion/usuarios')->with('mensaje-registro', 'Usuario Actualizado Correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $usuario = User::find($id);
        $usuario->state = 0;
        $usuario->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $usuario->id,
                'message' => $message
            ]);
        }
    }

     public function insertarLista(UsuarioRequest $request){

        InsertarPrimero($request);
        return view ('administration.usuarios.store');

    }

    public function eliminarElementoLista($id){

        $registro= EliminarElemLista($id);
         if($registro->save()){
            return Redirect::to('administracion/usuarios')->with('mensaje-registro', 'elemento eliminado Correctamente');
        }

    }
}
