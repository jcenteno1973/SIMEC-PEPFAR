<?php
/**
     * Fecha de modificación:20/11/2016
     * Creado por: Juan Carlos Centeno Borja
     *
     * Modificado por: Karla Barrera 
     * Fecha modificación: 2/12/2016
     * Descripción: Ruta para cambio de contraseña 
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
Route::get('/','ingresarController@index');
Route::post('usuario_app/ingresar', ['as' => 'usuario_app/ingresar', 'uses' => 'Auth\AuthController@fnc_ingresar']);
Route::get('usuario_app/salir', ['as' => 'usuario_app/salir', 'uses' => 'Auth\AuthController@fnc_salir']);
Route::get('principal',['as' => '/principal','uses' => 'principalController@fnc_principal']);
Route::get('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_show_buscar_usuario'] );
Route::post('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_filtro_buscar_usuario'] );
//Agregar un nuevo usuario
Route::get('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@fnc_show_create'] );
Route::post('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@create'] );
//Editar un usuario
Route::post('administracion/editar_usuario',['as' => 'administracion/editar_usuario', 'uses' => 'usuario_appController@edit'] );
Route::post('administracion/guardar_usuario',['as' => 'administracion/guardar_usuario', 'uses' => 'usuario_appController@fnc_guardar_modificacion'] );

Route::get('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_consultar_bitacora'] );

Route::get('administracion/catalogos',['as' => 'administracion/catalogos', 'uses' => 'principalController@fnc_show_catalogos'] );
Route::get('administracion/buscar_unidad_depart',['as' => 'administracion/buscar_unidad_depart', 'uses' => 'ubicacion_orgController@index']);
Route::post('administracion/buscar_unidad_depart',['as' => 'administracion/buscar_unidad_depart', 'uses' => 'ubicacion_orgController@fnc_busqueda_filtro']);

Route::get('administracion/nueva_unidad_depart',['as' => 'administracion/nueva_unidad_depart', 'uses' => 'ubicacion_orgController@create']);
Route::post('administracion/nueva_unidad_depart',['as' => 'administracion/nueva_unidad_depart', 'uses' => 'ubicacion_orgController@store']);

Route::post('administracion/editar_unidad_depart',['as' => 'administracion/editar_unidad_depart', 'uses' => 'ubicacion_orgController@update']);
Route::post('administracion/guardar_unidad_depart',['as' => 'administracion/guardar_unidad_depart', 'uses' => 'ubicacion_orgController@fnc_guardar_modificacion']);

//*Ruta para solicitud de credenciales
Route::get('usuario_app/solicitar_credenciales', function () {
    return view('usuario_app/solicitar_credenciales');
    //return view('test.index');
});
Route::get('administracion/cambiar_contrasenia', function () {
    return view('usuario_app/cambiar_contrasenia');
    //return view('test.index');
});

Route::get('administracion/nuevo_rol', function () {
    return view('usuario_app/nuevo_rol');
    //return view('test.index');
});


//ruta catalogos

Route::get('administracion/catalogos', function () {
    return view('catalogos/catalogos');
});

Route::get('administracion/buscar_ubicacion', function () {
    return view('catalogos/ubicacion_organizacional/buscar_ubicacion_org');
    //return view('catalogos/ubicacion_organizacional/ubicacion_orgController@edit');
}); 

Route::get('administracion/editar_ubicacion', function () {
    return view('catalogos/ubicacion_organizacional/editar_ubicacion_org');
    //return view('catalogos/ubicacion_organizacional/ubicacion_orgController@edit');
}); 


Route::get('administracion/nueva_ubicacion', function () {
    return view('catalogos/ubicacion_organizacional/nueva_ubicacion_org');
    //return view('catalogos/ubicacion_organizacional/ubicacion_orgController@edit');
}); 

Route::get('administracion/eliminar_ubicacion', function () {
    return view('catalogos/ubicacion_organizacional/eliminar_ubicacion_org');
    //return view('catalogos/ubicacion_organizacional/ubicacion_orgController@edit');
});