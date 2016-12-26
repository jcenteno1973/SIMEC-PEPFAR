<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ficha;
use App\Models\departamento;
use App\Models\municipio;
use App\Models\ubicacion_organizacional;
use App\Models\clase_bien;
use App\Models\fuente_financiamiento;
use App\Models\tipo_bien_mueble;
use App\Models\cuenta_contable;
use App\Models\estado_af;

class fichaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function fnc_create_mueble() {
    /**
    * Crea formulario para crear nueva ficha de mueble
     */  
     $departamentos=  departamento::lists('nombre_departamento','id_departamento');
     $ubicacion_org=  ubicacion_organizacional::lists('nombre_unidad_dep','id_ubicacion_org');
     $clase_bien=  clase_bien::lists('nombre_clase_bien','id_clase_bien');
     $fuente_financiamiento=  fuente_financiamiento::lists('nombre_fuente_financ','id_fuente_financiamiento');
     $tipo_bien=  tipo_bien_mueble::lists('nombre_tipo_bien_mueble','id_tipo_bien_mueble');
     $cuenta_contable=  cuenta_contable::all();
     $cuenta_contable2=  cuenta_contable::lists('cta_contable_depreciacion','id_cuenta_contable');
     $estado_af=  estado_af::lists('nombre_estado','id_estado');
     $obj_municipios= municipio::fnc_municipios(6);
     $municipios=$obj_municipios->lists('nombre_municipio','id_municipio');
     
     return view('ficha/nueva_ficha_mueble',  compact('departamentos',
             'municipios',
             'clase_bien',
             'fuente_financiamiento',
             'tipo_bien',
             'cuenta_contable',
             'cuenta_contable2',
             'estado_af',
             'ubicacion_org'));   
        
    }
    public function fnc_create_inmueble() {
        /**
    * Crea formulario para crear nueva ficha de inmueble
     */
     return view('ficha/nueva_ficha_inmueble');   
        
    }
    public function fnc_create_vehiculo() {
    /**
    * Crea formulario para crear nueva ficha de vehiculo
    */    
     return view('ficha/nueva_ficha_vehiculo');   
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Primero crear el codigo de inventario
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
        
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
