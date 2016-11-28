<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:24/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class rol_usuarioController extends Controller
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
     * 
     *
     * @return id del rol
     */
     public function fnc_obtener_id($param) {
         $id_rol_usuario=0;
         $obj_rol_usuario=  Role::all();
         foreach ($obj_rol_usuario as $obj_roles_usuarios){
           if($obj_roles_usuarios->nombre_rol==$param){
             $id_rol_usuario=$obj_roles_usuarios->id_rol_usuario;  
           }  
         }
         return $id_rol_usuario;
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
