<?php

/**
     * Nombre del archivo: RegionSicaController.php
     * Descripción:Contiene las funciones del controlador
     * Fecha de creación:18/11/2017
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\region_sica;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegionSicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fnc_obtener_id($param){
        $id_region_sica=0;
        $obj_region_sica= region_sica::all();
        foreach ($obj_region_sica as $paises){
            if($paises->codigo_pais==$param){
              $id_region_sica=$paises->id_region_sica; 
            }
        }
        return $id_region_sica;  
    }
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
