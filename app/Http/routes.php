<?php
/**
     * Fecha de modificación:20/12/2016
     * Creado por: Juan Carlos Centeno Borja
     * Descripción: Rutas de recursos
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
Route::get('configuracion',['as' => 'configuracion','uses' => 'principalController@fnc_show_configuracion']);
Route::get('catalogos',['as' => 'catalogos','uses' => 'principalController@fnc_show_catalogos']);
//Carga de datos
Route::get('codigo/{id}','ArchivoFuenteController@fnc_get_codigo');
Route::get('carga/codigo/{id}','ArchivoFuenteController@fnc_get_codigo');
Route::get ('carga',['as'=>'carga','uses'=> 'principalController@fnc_show_carga']);
Route::get ('carga/buscar_carga',['as'=>'carga/buscar_carga','uses'=> 'ArchivoDatosController@fnc_filtro_buscar_carga']);
Route::post ('carga/buscar_carga',['as'=>'carga/buscar_carga','uses'=> 'ArchivoDatosController@fnc_filtros_buscar_carga']);
Route::get ('carga/nueva_carga',['as'=>'carga/nueva_carga','uses'=> 'ArchivoDatosController@fnc_show_create']);
Route::post ('carga/nueva_carga',['as'=>'carga/nueva_carga','uses'=> 'ArchivoDatosController@fnc_show_store']);
Route::get ('carga/editar_carga/{id}',['as'=>'carga/editar_carga','uses'=> 'ArchivoDatosController@fnc_show_edit']);
Route::post ('carga/update_carga',['as'=>'carga/update_carga','uses'=> 'ArchivoDatosController@fnc_show_update']);
Route::get('cargar_datos/{id}',['as'=>'cargar_datos','uses'=>'ArchivoDatosController@fnc_cargar_datos']);
Route::get('descargar/{id}',['as'=>'descargar','uses'=>'ArchivoDatosController@fnc_descargar_archivo']);
Route::get('carga/eliminar/{id}',['as'=>'carga/eliminar','uses'=>'ArchivoDatosController@fnc_eliminar_archivo']);
//Catalogos
Route::get ('catalogos/nuevo_componente',['as'=>'catalogos/nuevo_componente','uses'=> 'ComponenteController@fnc_show_create']);
Route::post ('catalogos/nuevo_componente',['as'=>'catalogos/nuevo_componente','uses'=> 'ComponenteController@fnc_show_store']);
Route::get ('catalogos/buscar_componente',['as'=>'catalogos/buscar_componente','uses'=> 'ComponenteController@fnc_buscar_componente']);
Route::get ('catalogos/editar_componente/{id}',['as'=>'catalogos/editar_componente','uses'=> 'ComponenteController@fnc_show_edit']);
Route::post ('catalogos/update_componente',['as'=>'catalogos/update_componente','uses'=> 'ComponenteController@fnc_show_update']);
Route::get('catalogos/eliminar_componente/{id}',['as'=>'catalogos/eliminar_componente','uses'=>'ComponenteController@fnc_eliminar_componente']);
Route::get ('catalogos/nuevo_evento',['as'=>'catalogos/nuevo_evento','uses'=> 'EventoEpiController@fnc_show_create']);
Route::post ('catalogos/nuevo_evento',['as'=>'catalogos/nuevo_evento','uses'=> 'EventoEpiController@fnc_show_store']);
Route::get ('catalogos/buscar_evento',['as'=>'catalogos/buscar_evento','uses'=> 'EventoEpiController@fnc_buscar_evento']);
Route::get ('catalogos/editar_evento/{id}',['as'=>'catalogos/editar_evento','uses'=> 'EventoEpiController@fnc_show_edit']);
Route::post ('catalogos/update_evento',['as'=>'catalogos/update_evento','uses'=> 'EventoEpiController@fnc_show_update']);
Route::get('catalogos/eliminar/{id}',['as'=>'catalogos/eliminar','uses'=>'EventoEpiController@fnc_eliminar_evento']);
Route::get('catalogos/eliminar_desglose/{id}',['as'=>'catalogos/eliminar_desglose','uses'=>'CatalogoController@fnc_eliminar_desglose']);
Route::get ('catalogos/editar_desglose/{id}',['as'=>'catalogos/editar_desglose','uses'=> 'CatalogoController@fnc_show_edit_desg']);
Route::post ('catalogos/update_desglose',['as'=>'catalogos/update_desglose','uses'=> 'CatalogoController@fnc_show_update_desg']);
Route::get ('catalogos/buscar_desglose/{id}',['as'=>'catalogos/buscar_desglose','uses'=> 'CatalogoController@fnc_buscar_desglose']);
Route::get ('catalogos/nuevo_desglose/{id}',['as'=>'catalogos/nuevo_desglose','uses'=> 'CatalogoController@fnc_show_create_desg']);
Route::post ('catalogos/nuevo_desglose_guardar',['as'=>'catalogos/nuevo_desglose_guardar','uses'=> 'CatalogoController@fnc_show_store_desg']);
Route::get ('catalogos/nuevo_catalogo',['as'=>'catalogos/nuevo_catalogo','uses'=> 'CatalogoController@fnc_show_create']);
Route::post ('catalogos/nuevo_catalogo',['as'=>'catalogos/nuevo_catalogo','uses'=> 'CatalogoController@fnc_show_store']);
Route::get ('catalogos/buscar_catalogo',['as'=>'catalogos/buscar_catalogo','uses'=> 'CatalogoController@fnc_buscar_catalogo']);
Route::get ('catalogos/editar_catalogo/{id}',['as'=>'catalogos/editar_catalogo','uses'=> 'CatalogoController@fnc_show_edit']);
Route::post ('catalogos/update_catalogo',['as'=>'catalogos/update_catalogo','uses'=> 'CatalogoController@fnc_show_update']);
Route::get('catalogos/eliminar_catalogo/{id}',['as'=>'catalogos/eliminar_catalogo','uses'=>'CatalogoController@fnc_eliminar_catalogo']);
//Configuracion
Route::get ('configuracion/nuevo_indicador',['as'=>'configuracion/nuevo_indicador','uses'=> 'IndicadorController@fnc_show_create']);
Route::post ('configuracion/nuevo_indicador',['as'=>'configuracion/nuevo_indicador','uses'=> 'IndicadorController@fnc_show_store']);
Route::get ('configuracion/buscar_indicador',['as'=>'configuracion/buscar_indicador','uses'=> 'IndicadorController@fnc_buscar_indicador']);
Route::get ('configuracion/editar_indicador/{id}',['as'=>'configuracion/editar_indicador','uses'=> 'IndicadorController@fnc_show_edit']);
Route::post ('configuracion/update_indicador',['as'=>'configuracion/update_indicador','uses'=> 'IndicadorController@fnc_show_update']);
Route::get('configuracion/eliminar_indicador/{id}',['as'=>'configuracion/eliminar_indicador','uses'=>'IndicadorController@fnc_eliminar_indicador']);
Route::get ('configuracion/buscar_af',['as'=>'configuracion/buscar_af','uses'=> 'ArchivoFuenteController@fnc_buscar_af']);
Route::get ('configuracion/buscar_componente/{id}',['as'=>'configuracion/buscar_componente','uses'=> 'AsignarComponenteController@fnc_buscar_componente']);
Route::get ('configuracion/buscar_desglose/{id}',['as'=>'configuracion/buscar_desglose','uses'=> 'AsignarDesgloseController@fnc_buscar_desglose']);
Route::get ('configuracion/nuevo_desglose/{id}',['as'=>'configuracion/nuevo_desglose','uses'=> 'AsignarDesgloseController@fnc_show_create_desg']);
Route::post ('configuracion/nuevo_desglose_guardar',['as'=>'configuracion/nuevo_desglose_guardar','uses'=> 'AsignarDesgloseController@fnc_show_store_desg']);
Route::get ('configuracion/editar_componente/{id}',['as'=>'configuracion/editar_componente','uses'=> 'AsignarComponenteController@fnc_show_edit']);
Route::post ('configuracion/update_componente',['as'=>'configuracion/update_componente','uses'=> 'AsignarComponenteController@fnc_show_update']);

Route::get('ficha/nueva_ficha_inmueble',['as' => 'ficha/nueva_ficha_inmueble', 'uses' => 'fichaController@fnc_create_inmueble'] );
Route::post('ficha/nueva_ficha_inmueble',['as' => 'ficha/nueva_ficha_inmueble', 'uses' => 'fichaController@fnc_store_inmueble'] );
Route::get('ficha/nueva_ficha_vehiculo',['as' => 'ficha/nueva_ficha_vehiculo', 'uses' => 'fichaController@fnc_create_vehiculo'] );
Route::post('ficha/nueva_ficha_vehiculo',['as' => 'ficha/nueva_ficha_vehiculo', 'uses' => 'fichaController@fnc_store_vehiculo'] );
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
//ya cuenta con seguridad
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


