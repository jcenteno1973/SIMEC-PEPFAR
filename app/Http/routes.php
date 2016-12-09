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
use Illuminate\Http\Request;
use App\Http\Controllers\ubicacion_orgController;
use Carbon\Carbon;
use JasperPHP\JasperPHP;
Route::get('/','ingresarController@index');
Route::post('usuario_app/ingresar', ['as' => 'usuario_app/ingresar', 'uses' => 'Auth\AuthController@fnc_ingresar']);
Route::get('usuario_app/salir', ['as' => 'usuario_app/salir', 'uses' => 'Auth\AuthController@fnc_salir']);
Route::get('principal',['as' => '/principal','uses' => 'principalController@fnc_principal']);
Route::get('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_show_buscar_usuario'] );
Route::post('administracion/buscar_usuario',['as' => 'administracion/buscar_usuario', 'uses' => 'usuario_appController@fnc_filtro_buscar_usuario'] );
//Agregar un nuevo usuario
Route::get('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@fnc_show_create'] );
Route::post('administracion/nuevo_usuario',['as' => 'administracion/nuevo_usuario', 'uses' => 'usuario_appController@create'] );

Route::get('administracion/consultar_bitacora',['as' => 'administracion/consultar_bitacora', 'uses' => 'bitacoraController@fnc_show_consultar_bitacora'] );
//Route::get('/principal', function () {    return view('principal');});

Route::get('/prueba',function(){
    $reporte_generado='/reportes/'.time().'_bitacora3';//time le aggrega un número generado por la hora
    $output = public_path() .$reporte_generado; 
    $report = new JasperPHP;
    $report->process(
        public_path() . '/reportes/bitacora3.jrxml', 
        $output, 
        array('pdf'),//, 'rtf', 'html'),
        array(),
            array('driver' => 'mysql',                
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'sicafam',                
                'username' => 'sicafam',
                'password' => 'sicafam123654')
        )->execute();
    $reporte_generado='../public'.$reporte_generado.'.pdf';
    echo $reporte_generado;
    return view('welcome',  compact('reporte_generado'));

    
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
Route::get('administracion/cambiar_contrasenia', function () {
    return view('usuario_app/cambiar_contrasenia');
    //return view('test.index');
});
Route::get('administracion/editar_usuario', function () {
    return view('usuario_app/editar_usuario');
    //return view('test.index');
});
Route::get('administracion/nuevo_rol', function () {
    return view('usuario_app/nuevo_rol');
    //return view('test.index');
});
