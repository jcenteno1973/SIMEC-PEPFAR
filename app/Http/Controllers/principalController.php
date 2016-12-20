<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\bitacoraController;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
        return view('principal');
    }
     public function fnc_show_fichas(){
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
        return view('ficha_inicio');
    }
     public function fnc_show_inventario(){
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
        return view('inventario_inicio');
    }
     public function fnc_show_solicitudes(){
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
        return view('solicitudes_inicio');
    }
    public function fnc_show_procesos(){
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
        return view('procesos_inicio');
    }
    public function index()
    {
        
    }
    public function fnc_show_administracion() {
        $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
        return view('administracion_inicio'); 
    }
    public function fnc_show_catalogos() {
        $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
         return view('catalogos/catalogos'); 
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
