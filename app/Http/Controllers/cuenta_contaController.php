<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\cuenta_contable;
use Carbon\Carbon;
use App\User;
use Auth;

class cuenta_contaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //dd($request->get('codigo'));
        $cuenta= cuenta_contable::_codigo($request->get('codigo'))->orderBy('id_cuenta_contable', 'Asc')->paginate(10);
        return view('catalogos/cuentas_contables/buscar_cuentas',compact('cuenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalogos/cuentas_contables/nueva_cuenta');        
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
        $date = Carbon::now();
        $cuenta= new cuenta_contable();       
        $cuenta->cta_contable_activo_fijo=$request->cta_contable_activo_fijo;
        $cuenta->cta_contable_depreciacion=$request->cta_contable_depreciacion; 
        $cuenta->estado_registro=$request->estado_registro;
        $cuenta->id_usuario_crea=Auth::user()->id_usuario_app;
        $cuenta->fecha_hora_creacion=  $date;
        $cuenta->ip_dispositivo=$request->ip();
        $cuenta->save();
        return redirect()->route('administracion.contable.index');
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
        $cuenta= cuenta_contable::find($id);
         //dd($ubicacion);
         return view('catalogos/cuentas_contables/editar_cuenta')->with('cuenta',$cuenta);
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
        $date = Carbon::now();
        $cuenta= cuenta_contable::find($id);      
        $cuenta->cta_contable_activo_fijo=$request->cta_contable_activo_fijo;
        $cuenta->cta_contable_depreciacion=$request->cta_contable_depreciacion; 
        $cuenta->estado_registro=$request->estado_registro;
        $cuenta->id_usuario_modifica=Auth::user()->id_usuario_app;
        $cuenta->fecha_hora_modificacion= $date;
        $cuenta->ip_dispositivo=$request->ip();
        $cuenta->save();
        return redirect()->route('administracion.contable.index');
        
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
