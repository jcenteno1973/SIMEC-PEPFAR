<?php
/**
     * Nombre del archivo:bitacoraController.php
     * Descripción:Controlador de la bitacora
     * Fecha de creación:20/11/2017
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bitacora;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use JasperPHP\JasperPHP;


class bitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        $this->middleware('auth');
    }
    public function fnc_show_parametros() {
      //Carga el formulario de los parametros
      return view('bitacora/get_parametros');  
    }
    public function fnc_show_consultar_bitacora(Request $request) {
    //Genera el reporte de bitacora
    if($request->nombre_usuario=='')
    {
    $fecha_inicio=Carbon::createFromFormat('d/m/Y', $request->fecha_inicio);
    $fecha_fin=Carbon::createFromFormat('d/m/Y', $request->fecha_fin);
    //$fecha_fin->addDay();  
    $reporte_generado=env('APP_REP').'pentaho/api/repos/%3Abitacora.prpt/viewer?userid='.env('PENTAHO_USER').'&password='.env('PENTAHO_PASS').'&fecha_inicio='.$fecha_inicio->toDateString().'&fecha_fin='.$fecha_fin->toDateString().' 23:59:59';      
    $this->create_mensaje('Generar reporte: Bitacora');
    return view('bitacora/consultar_bitacora',compact('reporte_generado'));
    }else
    {
    $fecha_inicio=Carbon::createFromFormat('d/m/Y', $request->fecha_inicio);
    $fecha_fin=Carbon::createFromFormat('d/m/Y', $request->fecha_fin);
    $reporte_generado=env('APP_REP').'pentaho/api/repos/%3Abitacora_usuario.prpt/viewer?userid='.env('PENTAHO_USER').'&password='.env('PENTAHO_PASS').'&fecha_inicio='.$fecha_inicio->toDateString().'&fecha_fin='.$fecha_fin->toDateString().' 23:59:59'.'&usuario_app='.$request->nombre_usuario;      
    $this->create_mensaje('Generar reporte: Bitacora');
    return view('bitacora/consultar_bitacora',compact('reporte_generado'));
    }
    }
    
   
public function create_mensaje($mensajes)
    { 
    //Almacena la transacción en la base de datos
       $fecha_hora= Carbon::now();
       $obj_bitacora= new bitacora();
       $obj_bitacora->id_usuario_app=Auth::user()->id_usuario_app;
       $obj_bitacora->fecha_hora_transaccion=$fecha_hora;
       $obj_bitacora->transaccion_realizada=$mensajes;
       $obj_bitacora->ip_dispositivo=\Request::ip();
       $obj_bitacora->save();
    }
    
}
