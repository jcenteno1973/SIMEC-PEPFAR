<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:25/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ubicacion_organizacional;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ubicacion_orgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function fnc_busqueda_filtro(Request $request) {
      return view('home');
    }
    /**
     * 
     */
    public function fnc_obtener_id($param) {
        $id_ubicacion_org=0;
        $obj_ubicacion_org= ubicacion_organizacional::all();
        foreach ($obj_ubicacion_org as $obj_ubicaciones_org){
        if($obj_ubicaciones_org->nombre_unidad_dep==$param){
          $id_ubicacion_org=$obj_ubicaciones_org->id_ubicacion_org;  
        }    
        }
       return $id_ubicacion_org; 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('home');
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
    public function fnc_show_catalogos() {
        
         return view('home'); 
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

    public function fnc_guardar_modificacion(Request $request) {
        
        return view('home');
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
        return view('home');
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
