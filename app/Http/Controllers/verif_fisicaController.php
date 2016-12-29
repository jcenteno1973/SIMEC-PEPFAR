<?php

/* 
     * Nombre del archivo: verif_fisicaController
     * Descripción: Archivo controlador para verificación física
     * Fecha de creación: 27/12/2016
     * Creado por: Karla Barrera
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\verif_fisica_crea_request;
use App\Http\Requests\verif_fisica_edit_request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\verificacion_fisica;
use App\User;
use Auth;

class verif_fisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $verificacion_fisica = verificacion_fisica::_buscar_verificador($request->get('nombre_verificador'))->orderBy('fecha_verificacion_fisica', 'ASC')->paginate(10);        
        return view('inventario/buscar_verif_fisica', compact('verificacion_fisica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventario/nueva_verif_fisica');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(verif_fisica_crea_request $request)
    {
        //
        $date = Carbon::now();
        $verificacion_fisica= new verificacion_fisica(); 
        $verificacion_fisica->fecha_verificacion_fisica=$date;;
        $verificacion_fisica->nombre_responsable=$request->nombre_responsable;
        $verificacion_fisica->nombre_verificador=$request->nombre_verificador;
        $verificacion_fisica->estado_registro=1;
        $verificacion_fisica->id_usuario_crea=Auth::user()->id_usuario_app;
        $verificacion_fisica->ip_dispositivo=$request->ip();
        $verificacion_fisica->save();
        return redirect()->route('administracion.verificacion_fisica.index');
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
        $verificacion_fisica= verificacion_fisica::find($id); 
        return view('inventario/editar_verif_fisica')->with('verificacion_fisica',$verificacion_fisica);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(verif_fisica_edit_request $request, $id)
    {
        //
        $date = Carbon::now();
        $verificacion_fisica= verificacion_fisica::find($id); 
        $verificacion_fisica->fecha_verificacion_fisica=$date;;
        $verificacion_fisica->nombre_responsable=$request->nombre_responsable;
        $verificacion_fisica->nombre_verificador=$request->nombre_verificador;
        $verificacion_fisica->estado_registro=$request->estado_registro;
        $verificacion_fisica->id_usuario_modifica=Auth::user()->id_usuario_app;
        $verificacion_fisica->ip_dispositivo=$request->ip();
        $verificacion_fisica->save();
        return redirect()->route('administracion.verificacion_fisica.index');
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
