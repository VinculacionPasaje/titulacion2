<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Calendario;

     Route::get('/', 'FrontendController@index');

     //rutas para los docentes
     Route::get('docente', 'FrontendController@docente');
     Route::get('docente/MiPerfil', 'FrontendController@mi_perfil')->name('docente.mi_perfil');
     Route::get('docente/materias', 'FrontendController@materias')->name('docente.materias');
     Route::get('docente/asistencias', 'FrontendController@asistencias')->name('docente.asistencias');
      Route::resource('docente/editarPerfil','EditarPerfilController');
      


   // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');
        // Registration Routes...
         Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
          Route::post('register', ['as' => 'register', 'uses' => 'UserController@register'] );
         //Route::post('register', 'Auth\RegisterController@register');
        
        // Password Reset Routes...
       Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
       Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
       Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
       Route::post('password/reset', 'Auth\ResetPasswordController@reset');


        //aqui van todos los url del admin
        Route::group(['middleware' => 'admin'], function () {
        
        Route::get('administracion','FrontendController@admin');
        Route::resource('administracion/roles','RolController');
        Route::resource('administracion/usuarios','UsuarioController');
        Route::resource('administracion/semestres','SemestreController');
        Route::resource('administracion/salones','SalonController');
        Route::resource('administracion/asignaturas','AsignaturaController');
        Route::resource('administracion/anios','AnioController');
        Route::resource('administracion/calendarios','CalendarioController');
        Route::resource('administracion/asistencias','AsistenciaController');
        Route::resource('administracion/asignaturas_calendarios','AsignaturaCalendarioController');
        Route::get('administracion/calendario/{id}', 'CalendarioDetalleController@calendario');
        Route::get('administracion/calendarioAgregar/{id}', 'CalendarioDetalleController@nuevo_calendario');
        Route::resource('administracion/reportes', 'ReporteController');
        Route::get('administracion/generar_reporte', 'ReporteController@pdf')->name('asistencia.pdf');
        
        Route::post('administracion/calendarioAgregar/{id}', ['uses' => 'CalendarioDetalleController@store', 'as'=> 'calendarioAgregar.store']);


        Route::delete('administracion/calendarioEliminar/{id}', function ($id) {

            $calendarios = Calendario::find($id);
            $calendarios->state = 0;
            $calendarios->save();
            return redirect('administracion/calendarios');
            });







        });


        //Si no esta logueado lo mande al Login

        Route::group(['middleware' => 'guest'], function () {
            Route::get('/','FrontendController@index');
        });


      


