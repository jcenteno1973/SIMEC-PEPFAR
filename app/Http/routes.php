<?php
/**
     * Fecha de modificación:20/12/2016
     * Creado por: Juan Carlos Centeno Borja
     *
     * Modificado por: Karla Barrera 
     * Fecha modificación: 2/12/2016, 20/12/2016
     * Descripción: Ruta para: cambio de contraseña, buscar catálogo
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
Route::get('principal',['as' => 'principal','uses' => 'principalController@fnc_show_principal']);
Route::get('fichas',['as' => 'fichas','uses' => 'principalController@fnc_show_fichas']);
Route::get('ficha/nueva_ficha_inmueble',['as' => 'ficha/nueva_ficha_inmueble', 'uses' => 'fichaController@fnc_create_inmueble'] );
Route::post('ficha/nueva_ficha_inmueble',['as' => 'ficha/nueva_ficha_inmueble', 'uses' => 'fichaController@fnc_store_inmueble'] );
Route::get('ficha/nueva_ficha_vehiculo',['as' => 'ficha/nueva_ficha_vehiculo', 'uses' => 'fichaController@fnc_create_vehiculo'] );
Route::post('ficha/nueva_ficha_vehiculo',['as' => 'ficha/nueva_ficha_vehiculo', 'uses' => 'fichaController@fnc_store_vehiculo'] );
//falta seguridad
Route::get('ficha/nueva_ficha_mueble',['as' => 'ficha/nueva_ficha_mueble', 'uses' => 'fichaController@fnc_create_mueble'] );
Route::post('ficha/nueva_ficha_mueble',['as' => 'ficha/nueva_ficha_mueble', 'uses' => 'fichaController@fnc_store_mueble'] );
Route::get('municipios/{id}','municipioController@fnc_get_municipios');
Route::get('ficha/buscar_ficha',['as' => 'ficha/buscar_ficha', 'uses' => 'fichaController@show']);
Route::post('ficha/buscar_ficha',['as' => 'ficha/buscar_ficha', 'uses' => 'fichaController@fnc_buscar_filtro']);
Route::get('ficha/editar',['as' => 'ficha/editar', 'uses' => 'fichaController@update']);
Route::post('ficha/editar_mueble',['as' => 'ficha/editar_mueble', 'uses' => 'fichaController@fnc_update_mueble']);
Route::post('ficha/editar_inmueble',['as' => 'ficha/editar_inmueble', 'uses' => 'fichaController@fnc_update_inmueble']);
Route::post('ficha/editar_vehiculo',['as' => 'ficha/editar_vehiculo', 'uses' => 'fichaController@fnc_update_vehiculo']);
Route::get('ficha/seleccionar',['as' => 'ficha/seleccionar', 'uses' => 'fichaController@fnc_seleccionar']);
Route::get('ficha/ver',['as' => 'ficha/ver', 'uses' => 'fichaController@fnc_ver_ficha']);
Route::get('ficha/nueva_mejora',['as' => 'ficha/nueva_mejora', 'uses' => 'fichaController@fnc_create_mejora']);
Route::post('ficha/nueva_mejora',['as' => 'ficha/nueva_mejora', 'uses' => 'fichaController@fnc_store_mejora']);
Route::get('ficha/nuevo_revaluo',['as' => 'ficha/nuevo_revaluo', 'uses' => 'fichaController@fnc_create_revaluo']);
Route::post('ficha/nuevo_revaluo',['as' => 'ficha/nuevo_revaluo', 'uses' => 'fichaController@fnc_store_revaluo']);
Route::post('ficha/reporte_fichas',['as' => 'ficha/reporte_fichas', 'uses' => 'fichaController@fnc_reporte_fichas']);
Route::post('ficha/reporte_ficha_inmueble',['as' => 'ficha/reporte_ficha_inmueble', 'uses' => 'fichaController@fnc_rep_ficha_inmueble']);
Route::post('ficha/reporte_ficha_mueble',['as' => 'ficha/reporte_ficha_mueble', 'uses' => 'fichaController@fnc_rep_ficha_mueble']);
Route::post('ficha/reporte_ficha_vehiculo',['as' => 'ficha/reporte_ficha_vehiculo', 'uses' => 'fichaController@fnc_rep_ficha_vehiculo']);
Route::get('inventario',['as' => 'inventario','uses' => 'principalController@fnc_show_inventario']);
Route::get('solicitudes',['as' => 'solicitudes','uses' => 'principalController@fnc_show_solicitudes']);
Route::get('procesos',['as' => 'procesos','uses' => 'principalController@fnc_show_procesos']);
Route::get('reportes',['as' => 'reportes','uses' => 'principalController@fnc_show_reportes']);
Route::get('administracion',['as' => 'administracion', 'uses' => 'principalController@fnc_show_administracion','middleware' => ['permission:administracion']] );
Route::get('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@show','middleware' => ['permission:buscar_usuario']] );
Route::post('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_filtro_buscar_usuario','middleware' => ['permission:buscar_usuario']] );
//Agregar un nuevo usuario
Route::get('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@fnc_show_create','middleware' => ['permission:nuevo_usuario']] );
Route::post('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@create'] );
//Editar un usuario
//Route::post('administracion/editar_usuario',['as' => 'administracion/editar_usuario', 'uses' => 'usuario_appController@store'] );
Route::get('administracion/guardar_usuario',['as' => 'administracion/guardar_usuario', 'uses' => 'usuario_appController@edit','middleware' => ['permission:guardar_usuario']] );
Route::post('administracion/guardar_usuario',['as' => 'administracion/guardar_usuario', 'uses' => 'usuario_appController@fnc_guardar_modificacion'] );

Route::get('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_parametros'] );
Route::post('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_consultar_bitacora'] );
//***  catalogos
Route::get('administracion/catalogos',['as' => 'administracion/catalogos', 'uses' => 'principalController@fnc_show_catalogos','middleware' => ['permission:catalogos']] );
//ruta para ubicacion organizacional
Route::resource('administracion/buscar_ubicacion','ubicacion_orgController');
//ruta para cuentas contables
Route::resource('administracion/contable','cuenta_contaController');
Route::resource('administracion/color','coloresController');


Route::get('administracion/buscar_unidad_depart',['as' => 'administracion/buscar_unidad_depart', 'uses' => 'ubicacion_orgController@index']);
Route::post('administracion/buscar_unidad_depart',['as' => 'administracion/buscar_unidad_depart', 'uses' => 'ubicacion_orgController@fnc_busqueda_filtro']);

Route::get('administracion/nueva_unidad_depart',['as' => 'administracion/nueva_unidad_depart', 'uses' => 'ubicacion_orgController@create']);
Route::post('administracion/nueva_unidad_depart',['as' => 'administracion/nueva_unidad_depart', 'uses' => 'ubicacion_orgController@store']);

Route::get('administracion/guardar_unidad_depart',['as' => 'administracion/guardar_unidad_depart', 'uses' => 'ubicacion_orgController@update']);
Route::post('administracion/guardar_unidad_depart',['as' => 'administracion/guardar_unidad_depart', 'uses' => 'ubicacion_orgController@fnc_guardar_modificacion']);

Route::get('administracion/cambiar_contrasenia',['as' => 'administracion/cambiar_contrasenia', 'uses' => 'usuario_appController@fnc_cambiar_contrasenia'] );
Route::post('administracion/cambiar_contrasenia',['as' => 'administracion/cambiar_contrasenia', 'uses' => 'usuario_appController@fnc_guardar_contrasenia'] );

Route::get('administracion/cambiar_estado',['as' => 'administracion/cambiar_estado', 'uses' => 'usuario_appController@fnc_cambiar_estado'] );

Route::get('administracion/nuevo_rol',['as' => 'administracion/nuevo_rol', 'uses' => 'rol_usuarioController@create','middleware' => ['permission:nuevo_rol']]);
Route::post('administracion/nuevo_rol',['as' => 'administracion/nuevo_rol', 'uses' => 'rol_usuarioController@store']);

Route::get('administracion/editar_rol',['as' => 'administracion/editar_rol', 'uses' => 'rol_usuarioController@edit','middleware' => ['permission:editar_rol']]);
Route::post('administracion/editar_rol',['as' => 'administracion/editar_rol', 'uses' => 'rol_usuarioController@update']);

Route::get('administracion/asignar_permiso',['as' => 'administracion/asignar_permiso', 'uses' => 'permisos_appController@index','middleware' => ['permission:asignar_permiso']]);
Route::post('administracion/asignar_permiso',['as' => 'administracion/asignar_permiso', 'uses' => 'permisos_appController@store']);

// Password reset link request routes...
Route::get('password/email', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);

//inventario
Route::resource('administracion/verificacion_fisica','verif_fisicaController');
