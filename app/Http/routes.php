<?php
/**
     * Fecha de modificación:20/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use App\Http\Controllers\ubicacion_orgController;
use Carbon\Carbon;
Route::get('/','ingresarController@index');
Route::post('usuario_app/ingresar', ['as' => 'usuario_app/ingresar', 'uses' => 'Auth\AuthController@fnc_ingresar']);
Route::get('usuario_app/salir', ['as' => 'usuario_app/salir', 'uses' => 'Auth\AuthController@fnc_salir']);
Route::get('principal',['as' => '/principal','uses' => 'principalController@fnc_principal']);
Route::get('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_show_buscar_usuario'] );
//Agregar un nuevo usuario
Route::get('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@fnc_show_create'] );
Route::post('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@create'] );

Route::get('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_consultar_bitacora'] );
//Route::get('/principal', function () {    return view('principal');});

Route::get('/prueba',function(){
    $fecha = Carbon::now();
    $obj=new \App\Models\bitacora();
    $obj->id_usuario_app=1;
    $obj->fecha_hora_transaccion= $fecha;
    $obj->transaccion_realizada="{$_SERVER['REQUEST_URI']}";
    $obj->save();
    echo $obj;
//obtenemos al usuario al que queremos asignar roles
//$user = User::find(1);
//mediante la function attachRole() que es propia del componente, 
//podemos asignar el rol al usuario
//$user->attachRole($administrador);
//Como sabemos que un usuario puede tener varios roles, facilmente hacemos algo como esto
//$roles = Role::all();
//el resultado de esa consulta devolverá todos los roles en un array y luego los asignamos
//a un usuario
});
//*Ruta para solicitud de credenciales
Route::get('usuario_app/solicitar_credenciales', function () {
    return view('usuario_app/solicitar_credenciales');
    //return view('test.index');
});

/**********Ruta para prefix de rutas Administracion
//******************************************************/
Route::group(['prefix'=>'admin'], function(){
    Route::resource('usuario','usuario_appController' );
    Route::resource('rol','rol_usuarioController' );
 

});    
//*******************************************************