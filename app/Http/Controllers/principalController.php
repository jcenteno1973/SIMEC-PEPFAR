<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\evento_epi;
use App\Models\archivo_fuente;
use App\Models\indicador;

class principalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function fnc_show_principal(){       
        return view('principal');
    }
     public function fnc_show_configuracion(){
       
        return view('configuracion_inicio');
    }
    public function fnc_show_catalogos(){
       
        return view('catalogos_inicio');
    }
    public function fnc_show_carga(){
        return view ('carga_inicio');
    }
    
    public function fnc_show_reportes(){
       //Formulario de parametro de reportes
        $obj_evento_epi=  evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_archivo_fuente= archivo_fuente::fnc_archivo_fuentes(0);
        $codigo_archivo=$obj_archivo_fuente->lists('codigo_archivo_fuente','id_archivo_fuente');
        $codigo_archivo[0]='Seleccionar';
        $obj_evento_epi[0]='Seleccionar';
        $descripcion_archivo=  archivo_fuente::all();
        return view('reportes_inicio', 
                compact('obj_evento_epi','codigo_archivo','descripcion_archivo'));
    }
    public function fnc_ver_reportes(Request $request){
    //Visualizar reportes
    if($request->codigos==0){
        flash()->warning('Seleccionar el indicador');
        return redirect('reportes'); 
    }else{
       $obj_archivo_fuente=  archivo_fuente::find($request->codigos);
       $obj_indicador= indicador::codigo($obj_archivo_fuente->codigo_archivo_fuente)->get();
       $reporte_generado=env('APP_REP').$obj_indicador[0]->url_reporte.'?userid='.env('PENTAHO_USER').'&password='.env('PENTAHO_PASS');
                
       return view('reportes/reportes', 
                compact('reporte_generado'));
    }
    
    }

    public function fnc_show_administracion() {
       
        return view('administracion_inicio'); 
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
        //
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
