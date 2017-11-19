<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:20/11/2016
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
      return view('bitacora/get_parametros');  
    }
    public function fnc_show_consultar_bitacora(Request $request) {
        
    if($request->nombre_usuario=='')
    {
    $fecha_inicio=Carbon::createFromFormat('d/m/Y', $request->fecha_inicio);
    $fecha_fin=Carbon::createFromFormat('d/m/Y', $request->fecha_fin);
    $fecha_fin->addDay();    
    $reporte_generado='/reportes_jasper/'.time().'_bitacora';//time le aggrega un número generado por la hora
    $output = public_path() .$reporte_generado; 
    $report = new JasperPHP;
    $report->process(
    public_path() . '/reportes_jasper/bitacora.jrxml', 
    $output, 
    array('pdf'),//, 'rtf', 'html'),
    array('fecha_inicio'=>$fecha_inicio->toDateString(),'fecha_fin'=>$fecha_fin->toDateString()),
    config('conexion_report.conexion')
    )->execute();
    $this->create_mensaje('Generar reporte: Bitacora');
    $reporte_generado='..'.$reporte_generado.'.pdf';    
    return view('bitacora/consultar_bitacora',compact('reporte_generado'));
    }else
    {
    $fecha_inicio=Carbon::createFromFormat('d/m/Y', $request->fecha_inicio);
    $fecha_fin=Carbon::createFromFormat('d/m/Y', $request->fecha_fin);
    $fecha_fin->addDay();    
    $reporte_generado='/reportes_jasper/'.time().'_bitacora';//time le aggrega un número generado por la hora
    $this->create_mensaje('Generar reporte: Bitacora');
    $output = public_path() .$reporte_generado; 
    $report = new JasperPHP;
    $report->process(
    public_path() . '/reportes_jasper/bitacora_parametros.jrxml', 
    $output, 
    array('pdf'),//, 'rtf', 'html'),
    array('usuario_app'=> $request->nombre_usuario,'fecha_inicio' =>$fecha_inicio->toDateString(),'fecha_fin'=>$fecha_fin->toDateString()),
    config('conexion_report.conexion')
    )->execute();
    $reporte_generado='..'.$reporte_generado.'.pdf';    
    return view('bitacora/consultar_bitacora',compact('reporte_generado'));
    }
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       $fecha_hora= Carbon::now();
       $obj_bitacora= new bitacora();
       $obj_bitacora->id_usuario_app=Auth::user()->id_usuario_app;
       $obj_bitacora->fecha_hora_transaccion=$fecha_hora;
       $obj_bitacora->transaccion_realizada="{$_SERVER['REQUEST_URI']}";
       $obj_bitacora->save();
    }
public function create_mensaje($mensajes)
    { 
       $fecha_hora= Carbon::now();
       $obj_bitacora= new bitacora();
       $obj_bitacora->id_usuario_app=Auth::user()->id_usuario_app;
       $obj_bitacora->fecha_hora_transaccion=$fecha_hora;
       $obj_bitacora->transaccion_realizada=$mensajes;
       $obj_bitacora->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
