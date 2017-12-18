<?php
/*
 * Nombre del archivo: AsignarComponenteController.php
 * Descripción: Controlador para la tabla asignar_componente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\asignar_componente;
use App\Models\componente;
use Illuminate\Support\Facades\DB;
use App\Models\archivo_fuente;

class AsignarComponenteController extends Controller
{
    public function fnc_buscar_componente($id){
        $obj_componente_asig=  asignar_componente::fnc_fila($id);
        $obj_componente= componente::all();
        //dd($obj_componente_asig);
        return view('configuracion/buscar_componente_asig',
                compact('obj_componente_asig','obj_componente'));
    }
    public function fnc_show_edit($id){
        $obj_componente=  asignar_componente::fnc_componente($id);
        dd($obj_componente);
        return view('configuracion/editar_componente_asig',
                compact('obj_componente'));
    }
    public function fnc_show_update(Request $request){
        $obj_controller_bitacora=new bitacoraController(); 
        //Eliminar componentes asignados
        DB::table("asignar_componente")->where("id_archivo_fuente",$request->id_archivo_fuente[0])->delete();
        if(count($request->id_archivo_fuente)==1){
               $obj_numerador=  new asignar_componente();
               $obj_numerador->id_archivo_fuente=$request->id_archivo_fuente[0];
               $obj_numerador->id_componente=$request->id_componente[0];
               $obj_numerador->fila_archivo_fuente=$request->fila[0];
               $obj_numerador->save();
        }else{
               $obj_numerador=  new asignar_componente();
               $obj_numerador->id_archivo_fuente=$request->id_archivo_fuente[0];
               $obj_numerador->id_componente=$request->id_componente[0];
               $obj_numerador->fila_archivo_fuente=$request->fila[0];
               $obj_numerador->save();
               $obj_denominador=  new asignar_componente();
               $obj_denominador->id_archivo_fuente=$request->id_archivo_fuente[1];
               $obj_denominador->id_componente=$request->id_componente[1];
               $obj_denominador->fila_archivo_fuente=$request->fila[1];
               $obj_denominador->save(); 
        }
        $obj_archivo_fuente=archivo_fuente::find($request->id_archivo_fuente[0]);
        $obj_controller_bitacora->create_mensaje('Filas de los componentes asignados fueron modificadas:'.$obj_archivo_fuente->codigo_archivo_fuente);
        flash()->success('Filas de los componentes modificadas');
        return redirect()->back(); 
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
