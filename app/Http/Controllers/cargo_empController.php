<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:25/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cargo_emp;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class cargo_empController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fnc_obtener_id($param) {
      $id_cargo_emp=0;
      $obj_cargo_emp=  cargo_emp::all();
      foreach ($obj_cargo_emp as $obj_cargos_emp){
          if($obj_cargos_emp->nombre_cargo==$param){
           $id_cargo_emp=$obj_cargos_emp->id_cargo_emp;   
          }
      }
     return $id_cargo_emp;   
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
