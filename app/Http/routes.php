<?php
/**
     * Fecha de modificación:20/01/2018
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

Route::get('/',['as' => '/', 'uses' => 'ingresarController@index']);
Route::post('usuario_app/ingresar', ['as' => 'usuario_app/ingresar', 'uses' => 'Auth\AuthController@fnc_ingresar']);
Route::get('usuario_app/salir', ['as' => 'usuario_app/salir', 'uses' => 'Auth\AuthController@fnc_salir']);
Route::get('principal',['as' => 'principal','uses' => 'principalController@fnc_show_principal']);
Route::get('configuracion',['as' => 'configuracion','uses' => 'principalController@fnc_show_configuracion','middleware' => ['permission:configuracion']]);
Route::get('catalogos',['as' => 'catalogos','uses' => 'principalController@fnc_show_catalogos','middleware' => ['permission:catalogos']]);
Route::get ('carga',['as'=>'carga','uses'=> 'principalController@fnc_show_carga','middleware' => ['permission:carga']]);
Route::get('reportes',['as' => 'reportes','uses' => 'principalController@fnc_show_reportes','middleware' => ['permission:reportes']]);
Route::get('administracion',['as' => 'administracion', 'uses' => 'principalController@fnc_show_administracion','middleware' => ['permission:administracion']] );

Route::get('ropseguimiento',['as' => 'ropseguimiento', 'uses' => 'principalController@fnc_show_ropseguimiento','middleware' => ['permission:roptrimestre']] );
Route::get('roptrimestre',['as' => 'roptrimestre', 'uses' => 'principalController@fnc_show_roptrimestre','middleware' => ['permission:roptrimestre']] );
Route::get('ropsemestre',['as' => 'ropsemestre', 'uses' => 'principalController@fnc_show_ropsemestre','middleware' => ['permission:ropsemestre']] );
Route::get('ropanual',['as' => 'ropanual', 'uses' => 'principalController@fnc_show_ropanual','middleware' => ['permission:ropanual']] );
Route::get('ropkpif',['as' => 'ropkpif', 'uses' => 'principalController@fnc_show_ropkpif','middleware' => ['permission:ropkpif']] );
Route::get('ropcascada',['as' => 'ropcascada', 'uses' => 'principalController@fnc_show_ropcascada','middleware' => ['permission:ropcascada']] );

// Seguridad - Gestion o Administracion, mantenimiento Generico
Route::get('administracion/index_tablagen/{id}',['as' => 'administracion/index_tablagen', 'uses' => 'tablaGen_Controller@indexAll','middleware' => ['permission:index_tablagen']] );
Route::post('administracion/index_tablagen',['as' => 'administracion/index_tablagen', 'uses' => 'tablaGen_Controller@index'] );
Route::get('administracion/create_tablagen/{id}',['as' => 'administracion/create_tablagen', 'uses' => 'tablaGen_Controller@create','middleware' => ['permission:create_tablagen']] );
Route::post('administracion/create_tablagen',['as' => 'administracion/create_tablagen', 'uses' => 'tablaGen_Controller@store'] );
Route::get('administracion/edit_tablagen/{table}/{id}',['as' => 'administracion/edit_tablagen', 'uses' => 'tablaGen_Controller@edit','middleware' => ['permission:edit_tablagen']] );
Route::post('administracion/edit_tablagen',['as' => 'administracion/edit_tablagen', 'uses' => 'tablaGen_Controller@update'] );
Route::get('administracion/delete_tablagen/{table}/{id}',['as' => 'administracion/delete_tablagen', 'uses' => 'tablaGen_Controller@destroy'] );

//Carga de datos
Route::get('codigo/{id}','ArchivoFuenteController@fnc_get_codigo');
Route::get('carga/codigo/{id}','ArchivoFuenteController@fnc_get_codigo');
Route::get ('carga/buscar_carga',['as'=>'carga/buscar_carga','uses'=> 'ArchivoDatosController@fnc_filtros_buscar_carga','middleware' => ['permission:buscar_carga']]);
Route::post ('carga/buscar_carga',['as'=>'carga/buscar_carga','uses'=> 'ArchivoDatosController@fnc_filtros_buscar_carga']);
Route::get ('carga/nueva_carga',['as'=>'carga/nueva_carga','uses'=> 'ArchivoDatosController@fnc_show_create','middleware' => ['permission:nueva_carga']]);
Route::post ('carga/nueva_carga',['as'=>'carga/nueva_carga','uses'=> 'ArchivoDatosController@fnc_show_store']);
Route::get ('carga/editar_carga/{id}',['as'=>'carga/editar_carga','uses'=> 'ArchivoDatosController@fnc_show_edit','middleware' => ['permission:editar_carga']]);
Route::post ('carga/update_carga',['as'=>'carga/update_carga','uses'=> 'ArchivoDatosController@fnc_show_update']);
Route::get('cargar_datos/{id}',['as'=>'cargar_datos','uses'=>'ArchivoDatosController@fnc_cargar_datos','middleware' => ['permission:cargar_datos']]);
Route::get('descargar/{id}',['as'=>'descargar','uses'=>'ArchivoDatosController@fnc_descargar_archivo','middleware' => ['permission:descargar']]);
Route::get('carga/eliminar/{id}',['as'=>'carga/eliminar','uses'=>'ArchivoDatosController@fnc_eliminar_archivo','middleware' => ['permission:eliminar']]);
//Catalogos
Route::get ('catalogos/nuevo_componente',['as'=>'catalogos/nuevo_componente','uses'=> 'ComponenteController@fnc_show_create','middleware' => ['permission:nuevo_componente']]);
Route::post ('catalogos/nuevo_componente',['as'=>'catalogos/nuevo_componente','uses'=> 'ComponenteController@fnc_show_store']);
Route::get ('catalogos/buscar_componente',['as'=>'catalogos/buscar_componente','uses'=> 'ComponenteController@fnc_buscar_componente','middleware' => ['permission:buscar_componente']]);
Route::post ('catalogos/buscar_componente',['as'=>'catalogos/buscar_componente','uses'=> 'ComponenteController@fnc_buscar_componente']);
Route::get ('catalogos/editar_componente/{id}',['as'=>'catalogos/editar_componente','uses'=> 'ComponenteController@fnc_show_edit']);
Route::post ('catalogos/update_componente',['as'=>'catalogos/update_componente','uses'=> 'ComponenteController@fnc_show_update']);
Route::get('catalogos/eliminar_componente/{id}',['as'=>'catalogos/eliminar_componente','uses'=>'ComponenteController@fnc_eliminar_componente']);
Route::get ('catalogos/nuevo_evento',['as'=>'catalogos/nuevo_evento','uses'=> 'EventoEpiController@fnc_show_create','middleware' => ['permission:nuevo_evento']]);
Route::post ('catalogos/nuevo_evento',['as'=>'catalogos/nuevo_evento','uses'=> 'EventoEpiController@fnc_show_store']);
Route::get ('catalogos/buscar_evento',['as'=>'catalogos/buscar_evento','uses'=> 'EventoEpiController@fnc_buscar_evento','middleware' => ['permission:buscar_evento']]);
Route::post ('catalogos/buscar_evento',['as'=>'catalogos/buscar_evento','uses'=> 'EventoEpiController@fnc_buscar_evento']);
Route::get ('catalogos/editar_evento/{id}',['as'=>'catalogos/editar_evento','uses'=> 'EventoEpiController@fnc_show_edit']);
Route::post ('catalogos/update_evento',['as'=>'catalogos/update_evento','uses'=> 'EventoEpiController@fnc_show_update']);
Route::get('catalogos/eliminar/{id}',['as'=>'catalogos/eliminar','uses'=>'EventoEpiController@fnc_eliminar_evento']);
Route::get('catalogos/eliminar_desglose/{id}',['as'=>'catalogos/eliminar_desglose','uses'=>'CatalogoController@fnc_eliminar_desglose']);
Route::get ('catalogos/editar_desglose/{id}',['as'=>'catalogos/editar_desglose','uses'=> 'CatalogoController@fnc_show_edit_desg']);
Route::post ('catalogos/update_desglose',['as'=>'catalogos/update_desglose','uses'=> 'CatalogoController@fnc_show_update_desg']);
Route::get ('catalogos/buscar_desglose/{id}',['as'=>'catalogos/buscar_desglose','uses'=> 'CatalogoController@fnc_buscar_desglose']);
Route::get ('catalogos/nuevo_desglose/{id}',['as'=>'catalogos/nuevo_desglose','uses'=> 'CatalogoController@fnc_show_create_desg']);
Route::post ('catalogos/nuevo_desglose_guardar',['as'=>'catalogos/nuevo_desglose_guardar','uses'=> 'CatalogoController@fnc_show_store_desg']);
Route::get ('catalogos/nuevo_catalogo',['as'=>'catalogos/nuevo_catalogo','uses'=> 'CatalogoController@fnc_show_create','middleware' => ['permission:nuevo_catalogo']]);
Route::post ('catalogos/nuevo_catalogo',['as'=>'catalogos/nuevo_catalogo','uses'=> 'CatalogoController@fnc_show_store']);
Route::get ('catalogos/buscar_catalogo',['as'=>'catalogos/buscar_catalogo','uses'=> 'CatalogoController@fnc_buscar_catalogo','middleware' => ['permission:buscar_catalogo']]);
Route::post ('catalogos/buscar_catalogo',['as'=>'catalogos/buscar_catalogo','uses'=> 'CatalogoController@fnc_buscar_catalogo']);
Route::get ('catalogos/editar_catalogo/{id}',['as'=>'catalogos/editar_catalogo','uses'=> 'CatalogoController@fnc_show_edit']);
Route::post ('catalogos/update_catalogo',['as'=>'catalogos/update_catalogo','uses'=> 'CatalogoController@fnc_show_update']);
Route::get('catalogos/eliminar_catalogo/{id}',['as'=>'catalogos/eliminar_catalogo','uses'=>'CatalogoController@fnc_eliminar_catalogo']);
//Configuracion
Route::get ('configuracion/nuevo_indicador',['as'=>'configuracion/nuevo_indicador','uses'=> 'IndicadorController@fnc_show_create','middleware' => ['permission:nuevo_indicador']]);
Route::post ('configuracion/nuevo_indicador',['as'=>'configuracion/nuevo_indicador','uses'=> 'IndicadorController@fnc_show_store']);
Route::get ('configuracion/buscar_indicador',['as'=>'configuracion/buscar_indicador','uses'=> 'IndicadorController@fnc_buscar_indicador','middleware' => ['permission:buscar_indicador']]);
Route::post ('configuracion/buscar_indicador',['as'=>'configuracion/buscar_indicador','uses'=> 'IndicadorController@fnc_buscar_indicador']);
Route::get ('configuracion/editar_indicador/{id}',['as'=>'configuracion/editar_indicador','uses'=> 'IndicadorController@fnc_show_edit']);
Route::post ('configuracion/update_indicador',['as'=>'configuracion/update_indicador','uses'=> 'IndicadorController@fnc_show_update']);
Route::get('configuracion/eliminar_indicador/{id}',['as'=>'configuracion/eliminar_indicador','uses'=>'IndicadorController@fnc_eliminar_indicador']);
Route::get ('configuracion/buscar_af',['as'=>'configuracion/buscar_af','uses'=> 'ArchivoFuenteController@fnc_buscar_af','middleware' => ['permission:buscar_af']]);
Route::post ('configuracion/buscar_af',['as'=>'configuracion/buscar_af','uses'=> 'ArchivoFuenteController@fnc_buscar_af']);
Route::get('configuracion/buscar_componente/{id}',['as'=>'configuracion/buscar_componente','uses'=> 'AsignarComponenteController@fnc_buscar_componente']);
Route::get('configuracion/buscar_desglose/{id}',['as'=>'configuracion/buscar_desglose','uses'=> 'AsignarDesgloseController@fnc_buscar_desglose']);
Route::get('configuracion/nuevo_desglose/{id}',['as'=>'configuracion/nuevo_desglose','uses'=> 'AsignarDesgloseController@fnc_show_create_desg']);
Route::post('configuracion/nuevo_desglose_guardar',['as'=>'configuracion/nuevo_desglose_guardar','uses'=> 'AsignarDesgloseController@fnc_show_store_desg']);
Route::get('configuracion/editar_componente/{id}',['as'=>'configuracion/editar_componente','uses'=> 'AsignarComponenteController@fnc_show_edit']);
Route::post('configuracion/update_componente',['as'=>'configuracion/update_componente','uses'=> 'AsignarComponenteController@fnc_show_update']);
Route::post('configuracion/update_desglose',['as'=>'configuracion/update_desglose','uses'=> 'AsignarDesgloseController@fnc_show_update']);
Route::get('configuracion/eliminar_desglose_asig/{id}',['as'=>'configuracion/eliminar_desglose_asig','uses'=>'AsignarDesgloseController@fnc_eliminar_desglose']);
//Módulo de reportes
Route::post('reportes/reportes',['as' => 'reportes/reportes','uses' => 'principalController@fnc_ver_reportes']);
//Módulo de administración
Route::get('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@show','middleware' => ['permission:buscar_usuario']] );
Route::post('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_filtro_buscar_usuario','middleware' => ['permission:buscar_usuario']] );
Route::get('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@fnc_show_create','middleware' => ['permission:nuevo_usuario']] );
Route::post('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@create'] );
Route::get('administracion/guardar_usuario',['as' => 'administracion/guardar_usuario', 'uses' => 'usuario_appController@edit','middleware' => ['permission:guardar_usuario']] );
Route::post('administracion/guardar_usuario',['as' => 'administracion/guardar_usuario', 'uses' => 'usuario_appController@fnc_guardar_modificacion'] );
//Route::get('administracion/consultar_archivo_datos',['as' => 'administracion/consultar_archivo_datos', 'uses' => 'ArchivoDatosController@fnc_show_parametros','middleware' => ['permission:consultar_archivo_datos']] );
//Route::post('administracion/consultar_archivo_datos',['as' => 'administracion/consultar_archivo_datos', 'uses' => 'ArchivoDatosController@fnc_show_consultar_archivos'] );
//Route::get('administracion/reporte_usuario',['as' => 'administracion/reporte_usuario', 'uses' => 'usuario_appController@fnc_reporte_usuarios','middleware' => ['permission:reporte_usuario']] );

Route::get('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_parametros','middleware' => ['permission:consultar_bitacora']] );
Route::post('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_consultar_bitacora'] );
Route::get('administracion/nuevo_bitacora',['as' => 'administracion/nuevo_bitacora', 'uses' => 'bitacoraController@fnc_show_nuevo_bitacora','middleware' => ['permission:nuevo_bitacora']] );
Route::post('administracion/nuevo_bitacora',['as' => 'administracion/nuevo_bitacora', 'uses' => 'bitacoraController@store'] );
Route::get('administracion/editar_bitacora/{id}',['as' => 'administracion/editar_bitacora', 'uses' => 'bitacoraController@fnc_show_editar_bitacora','middleware' => ['permission:editar_bitacora']] );
Route::post('administracion/editar_bitacora',['as' => 'administracion/editar_bitacora', 'uses' => 'bitacoraController@update'] );
Route::get('administracion/borrar_bitacora/{id}',['as' => 'administracion/borrar_bitacora', 'uses' => 'bitacoraController@fnc_delete'] );

Route::get('administracion/cambiar_contrasenia',['as' => 'administracion/cambiar_contrasenia', 'uses' => 'usuario_appController@fnc_cambiar_contrasenia'] );
Route::get('administracion/user_cambiar_contrasenia',['as' => 'administracion/user_cambiar_contrasenia', 'uses' => 'usuario_appController@fnc_user_cambiar_contra'] );
Route::post('administracion/cambiar_contrasenia',['as' => 'administracion/cambiar_contrasenia', 'uses' => 'usuario_appController@fnc_guardar_contrasenia'] );
Route::get('administracion/cambiar_estado',['as' => 'administracion/cambiar_estado', 'uses' => 'usuario_appController@fnc_cambiar_estado'] );
Route::get('administracion/nuevo_rol',['as' => 'administracion/nuevo_rol', 'uses' => 'rol_usuarioController@create','middleware' => ['permission:nuevo_rol']]);
Route::post('administracion/nuevo_rol',['as' => 'administracion/nuevo_rol', 'uses' => 'rol_usuarioController@store']);
Route::get('administracion/editar_rol',['as' => 'administracion/editar_rol', 'uses' => 'rol_usuarioController@edit','middleware' => ['permission:editar_rol']]);
Route::post('administracion/editar_rol',['as' => 'administracion/editar_rol', 'uses' => 'rol_usuarioController@update']);
Route::get('administracion/asignar_permiso',['as' => 'administracion/asignar_permiso', 'uses' => 'permisos_appController@index','middleware' => ['permission:asignar_permiso']]);
Route::post('administracion/asignar_permiso',['as' => 'administracion/asignar_permiso', 'uses' => 'permisos_appController@store']);
Route::get('administracion/copia_seguridad',['as' => 'administracion/copia_seguridad', 'uses' => 'CopiaSeguridadController@fnc_crear_copia']);
Route::get('administracion/lista_copia',['as' => 'administracion/lista_copia', 'uses' => 'CopiaSeguridadController@fnc_listado_copia','middleware' => ['permission:lista_copia']]);
Route::get('administracion/descargar_copia/{file_name}',['as' => 'administracion/descargar_copia', 'uses' => 'CopiaSeguridadController@fnc_descargar_copia']);
Route::get('administracion/borrar_copia/{file_name}',['as' => 'administracion/borrar_copia', 'uses' => 'CopiaSeguridadController@fnc_borrar_copia']);
// Password reset link request routes...
Route::get('password/email', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@postEmail']);
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);


// Rop Anual
Route::get('ropanual/nuevo_mccl',['as' => 'ropanual/nuevo_mccl', 'uses' => 'mccl_appController@fnc_show_create','middleware' => ['permission:nuevo_mccl']] );
Route::post('ropanual/nuevo_mccl',['as' => 'ropanual/nuevo_mccl', 'uses' => 'mccl_appController@create'] );

Route::get('ropanual/buscar_mccl',['as' => 'ropanual/buscar_mccl', 'uses' => 'mccl_appController@show','middleware' => ['permission:buscar_mccl']] );
Route::post('ropanual/buscar_mccl',['as' => 'ropanual/buscar_mccl', 'uses' => 'mccl_appController@fnc_filtro_buscar_mccl','middleware' => ['permission:buscar_mccl']] );

Route::get('ropanual/editar_mccl',['as' => 'ropanual/editar_mccl', 'uses' => 'mccl_appController@edit','middleware' => ['permission:editar_mccl']]);
Route::post('ropanual/editar_mccl',['as' => 'ropanual/editar_mccl', 'uses' => 'mccl_appController@update']);

Route::get('ropanual/guardar_mccl',['as' => 'ropanual/guardar_mccl', 'uses' => 'mccl_appController@edit','middleware' => ['permission:guardar_mccl']] );
Route::post('ropanual/guardar_mccl',['as' => 'ropanual/guardar_mccl', 'uses' => 'mccl_appController@fnc_guardar_modificacion'] );


// ROP Trimestral
// Intervenciones index_testing
Route::get('roptrimestre/index_indextesting',['as' => 'roptrimestre/index_indextesting', 'uses' => 'indextesting_Controller@indexAll','middleware' => ['permission:index_indextesting']] );
Route::post('roptrimestre/index_indextesting',['as' => 'roptrimestre/index_indextesting', 'uses' => 'indextesting_Controller@index'] );
Route::get('roptrimestre/create_indextesting',['as' => 'roptrimestre/create_indextesting', 'uses' => 'indextesting_Controller@create','middleware' => ['permission:create_indextesting']] );
Route::post('roptrimestre/create_indextesting',['as' => 'roptrimestre/create_indextesting', 'uses' => 'indextesting_Controller@store'] );
Route::get('roptrimestre/edit_indextesting/{id}',['as' => 'roptrimestre/edit_indextesting', 'uses' => 'indextesting_Controller@edit','middleware' => ['permission:edit_indextesting']] );
Route::post('roptrimestre/edit_indextesting',['as' => 'roptrimestre/edit_indextesting', 'uses' => 'indextesting_Controller@update'] );
Route::get('roptrimestre/delete_indextesting/{id}',['as' => 'roptrimestre/delete_indextesting', 'uses' => 'indextesting_Controller@destroy'] );

// Telefono index_telefono
Route::get('roptrimestre/index_telefono/{id}',['as' => 'roptrimestre/index_telefono', 'uses' => 'telefono_Controller@indexAll','middleware' => ['permission:index_telefono']] );
Route::post('roptrimestre/index_telefono',['as' => 'roptrimestre/index_telefono', 'uses' => 'telefono_Controller@index'] );
Route::get('roptrimestre/create_telefono/{id}',['as' => 'roptrimestre/create_telefono', 'uses' => 'telefono_Controller@create','middleware' => ['permission:create_telefono']] );
Route::post('roptrimestre/create_telefono',['as' => 'roptrimestre/create_telefono', 'uses' => 'telefono_Controller@store'] );
Route::get('roptrimestre/edit_telefono/{id}',['as' => 'roptrimestre/edit_telefono', 'uses' => 'telefono_Controller@edit','middleware' => ['permission:edit_telefono']] );
Route::post('roptrimestre/edit_telefono',['as' => 'roptrimestre/edit_telefono', 'uses' => 'telefono_Controller@update'] );
Route::get('roptrimestre/delete_telefono/{id}',['as' => 'roptrimestre/delete_telefono', 'uses' => 'telefono_Controller@destroy'] );

// Contactar Pareja index_contactarpareja
Route::get('roptrimestre/index_contactarpareja/{id}',['as' => 'roptrimestre/index_contactarpareja', 'uses' => 'contactarpareja_Controller@indexAll','middleware' => ['permission:index_contactarpareja']] );
Route::post('roptrimestre/index_contactarpareja',['as' => 'roptrimestre/index_contactarpareja', 'uses' => 'contactarpareja_Controller@index'] );
Route::get('roptrimestre/create_contactarpareja/{id}',['as' => 'roptrimestre/create_contactarpareja', 'uses' => 'contactarpareja_Controller@create','middleware' => ['permission:create_contactarpareja']] );
Route::post('roptrimestre/create_contactarpareja',['as' => 'roptrimestre/create_contactarpareja', 'uses' => 'contactarpareja_Controller@store'] );
Route::get('roptrimestre/edit_contactarpareja/{id}',['as' => 'roptrimestre/edit_contactarpareja', 'uses' => 'contactarpareja_Controller@edit','middleware' => ['permission:edit_contactarpareja']] );
Route::post('roptrimestre/edit_contactarpareja',['as' => 'roptrimestre/edit_contactarpareja', 'uses' => 'contactarpareja_Controller@update'] );
Route::get('roptrimestre/delete_contactarpareja/{id}',['as' => 'roptrimestre/delete_contactarpareja', 'uses' => 'contactarpareja_Controller@destroy'] );

// Agenda index_agenda
Route::get('roptrimestre/index_agenda/{id}',['as' => 'roptrimestre/index_agenda', 'uses' => 'agenda_Controller@indexAll','middleware' => ['permission:index_agenda']] );
Route::post('roptrimestre/index_agenda',['as' => 'roptrimestre/index_agenda', 'uses' => 'agenda_Controller@index'] );
Route::get('roptrimestre/create_agenda/{id}',['as' => 'roptrimestre/create_agenda', 'uses' => 'agenda_Controller@create','middleware' => ['permission:create_agenda']] );
Route::post('roptrimestre/create_agenda',['as' => 'roptrimestre/create_agenda', 'uses' => 'agenda_Controller@store'] );
Route::get('roptrimestre/edit_agenda/{id}',['as' => 'roptrimestre/edit_agenda', 'uses' => 'agenda_Controller@edit','middleware' => ['permission:edit_agenda']] );
Route::post('roptrimestre/edit_agenda',['as' => 'roptrimestre/edit_agenda', 'uses' => 'agenda_Controller@update'] );
Route::get('roptrimestre/delete_agenda/{id}',['as' => 'roptrimestre/delete_agenda', 'uses' => 'agenda_Controller@destroy'] );

// Parejas->index_testing index_pareja
Route::get('roptrimestre/index_pareja/{id}',['as' => 'roptrimestre/index_pareja', 'uses' => 'pareja_Controller@indexAll','middleware' => ['permission:index_pareja']] );
Route::post('roptrimestre/index_pareja',['as' => 'roptrimestre/index_pareja', 'uses' => 'pareja_Controller@index'] );
Route::get('roptrimestre/create_pareja/{id}',['as' => 'roptrimestre/create_pareja', 'uses' => 'pareja_Controller@create','middleware' => ['permission:create_pareja']] );
Route::post('roptrimestre/create_pareja',['as' => 'roptrimestre/create_pareja', 'uses' => 'pareja_Controller@store'] );
Route::get('roptrimestre/edit_pareja/{id}',['as' => 'roptrimestre/edit_pareja', 'uses' => 'pareja_Controller@edit','middleware' => ['permission:edit_pareja']] );
Route::post('roptrimestre/edit_pareja',['as' => 'roptrimestre/edit_pareja', 'uses' => 'pareja_Controller@update'] );
Route::get('roptrimestre/delete_pareja/{id}',['as' => 'roptrimestre/delete_pareja', 'uses' => 'pareja_Controller@destroy'] );

Route::get('roptrimestre/edit_pareja_refexit/{id}',['as' => 'roptrimestre/edit_pareja_refexit', 'uses' => 'pareja_Controller@edit_refexit','middleware' => ['permission:edit_pareja']] );
Route::post('roptrimestre/edit_pareja_refexit',['as' => 'roptrimestre/edit_pareja_refexit', 'uses' => 'pareja_Controller@update_refexit'] );
Route::get('roptrimestre/edit_pareja_viorelnap/{id}',['as' => 'roptrimestre/edit_pareja_viorelnap', 'uses' => 'pareja_Controller@edit_viorelnap','middleware' => ['permission:edit_pareja']] );
Route::post('roptrimestre/edit_pareja_viorelnap',['as' => 'roptrimestre/edit_pareja_viorelnap', 'uses' => 'pareja_Controller@update_viorelnap'] );



Route::get('sethospital',['as' => 'setinstitucion','uses' => 'principalController@fnc_show_sethospital']);
Route::post('administracion/sethospital',['as' => 'administracion/sethospital', 'uses' => 'principalController@fnc_sethospital']);
Route::get('setmunicipio',['as' => 'setinstitucion','uses' => 'principalController@fnc_show_setmunicipio']);
Route::post('administracion/setmunicipio',['as' => 'administracion/setmunicipio', 'uses' => 'principalController@fnc_setmunicipio']);





// index_datos
Route::get('roptrimestre/index_datos/{id}',['as' => 'roptrimestre/index_datos', 'uses' => 'datos_Controller@indexAll','middleware' => ['permission:index_datos']] );
Route::post('roptrimestre/index_datos',['as' => 'roptrimestre/index_datos', 'uses' => 'datos_Controller@index'] );
Route::get('roptrimestre/create_datos/{id}',['as' => 'roptrimestre/create_datos', 'uses' => 'datos_Controller@create','middleware' => ['permission:create_datos']] );
Route::post('roptrimestre/create_datos',['as' => 'roptrimestre/create_datos', 'uses' => 'datos_Controller@store'] );
Route::get('roptrimestre/edit_datos/{id}',['as' => 'roptrimestre/edit_datos', 'uses' => 'datos_Controller@edit','middleware' => ['permission:edit_datos']] );
Route::post('roptrimestre/edit_datos',['as' => 'roptrimestre/edit_datos', 'uses' => 'datos_Controller@update'] );
Route::get('roptrimestre/delete_datos/{id}',['as' => 'roptrimestre/delete_datos', 'uses' => 'datos_Controller@destroy'] );


// index_datosAnuales
Route::get('ropanual/index_datosanuales/{id}',['as' => 'ropanual/index_datosanuales', 'uses' => 'datosanuales_Controller@indexAll','middleware' => ['permission:index_datosanuales']] );
Route::post('ropanual/index_datosanuales',['as' => 'ropanual/index_datosanuales', 'uses' => 'datosanuales_Controller@index'] );
Route::get('ropanual/create_datosanuales/{id}',['as' => 'ropanual/create_datosanuales', 'uses' => 'datosanuales_Controller@create','middleware' => ['permission:create_datosanuales']] );
Route::post('ropanual/create_datosanuales',['as' => 'ropanual/create_datosanuales', 'uses' => 'datosanuales_Controller@store'] );
Route::get('ropanual/edit_datosanuales/{id}',['as' => 'ropanual/edit_datosanuales', 'uses' => 'datosanuales_Controller@edit','middleware' => ['permission:edit_datosanuales']] );
Route::post('ropanual/edit_datosanuales',['as' => 'ropanual/edit_datosanuales', 'uses' => 'datosanuales_Controller@update'] );
Route::get('ropanual/delete_datosanuales/{id}',['as' => 'ropanual/delete_datosanuales', 'uses' => 'datosanuales_Controller@destroy'] );

// index_datosKPIF
Route::get('ropkpif/index_datoskpif/{id}',['as' => 'ropkpif/index_datoskpif', 'uses' => 'datoskpif_Controller@indexAll','middleware' => ['permission:index_datoskpif']] );
Route::post('ropkpif/index_datoskpif',['as' => 'ropkpif/index_datoskpif', 'uses' => 'datoskpif_Controller@index'] );
Route::get('ropkpif/create_datoskpif/{id}',['as' => 'ropkpif/create_datoskpif', 'uses' => 'datoskpif_Controller@create','middleware' => ['permission:create_datoskpif']] );
Route::post('ropkpif/create_datoskpif',['as' => 'ropkpif/create_datoskpif', 'uses' => 'datoskpif_Controller@store'] );
Route::get('ropkpif/edit_datoskpif/{id}',['as' => 'ropkpif/edit_datoskpif', 'uses' => 'datoskpif_Controller@edit','middleware' => ['permission:edit_datoskpif']] );
Route::post('ropkpif/edit_datoskpif',['as' => 'ropkpif/edit_datoskpif', 'uses' => 'datoskpif_Controller@update'] );
Route::get('ropkpif/delete_datoskpif/{id}',['as' => 'ropkpif/delete_datoskpif', 'uses' => 'datoskpif_Controller@destroy'] );

