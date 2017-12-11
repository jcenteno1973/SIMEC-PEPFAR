<?php
/*
 * Nombre del archivo: EventoEpiController.php
 * Descripción: Controlador para la tabla evento_epi
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\bitacoraController;
use App\Models\evento_epi;
use Illuminate\Support\Facades\DB;

class EventoEpiController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fnc_show_create() {
        return view('catalogos/nuevo_evento');
        
    }
    public function fnc_show_store(Request $request) {
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_evento_epi = new evento_epi();
       $error = null;
        DB::beginTransaction();
        try {
            $obj_evento_epi->codigo_evento=$request->codigo;
            $obj_evento_epi->nombre_evento=$request->nombre;
            $obj_evento_epi->descripcion_evento=$request->descripcion;
            $obj_evento_epi->save();
            $obj_controller_bitacora->create_mensaje('Evento creado:'.$request->nombre);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $e->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Evento creado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al crear evento, '.$error);
          return redirect()->back();  
        }
    }
    public function fnc_buscar_evento(){
        //
        $obj_evento_epi= evento_epi::paginate(10);
        return view('catalogos/buscar_evento',
                compact('obj_evento_epi'));
    }
    public function fnc_eliminar_evento($id){
        //Eliminar registro
        $obj_controller_bitacora=new bitacoraController(); 
        $obj_evento_epi=  evento_epi::find($id);
        $nombre=$obj_evento_epi->nombre_evento;
        $obj_evento_epi->delete();
        $obj_controller_bitacora->create_mensaje('Evento eliminado:'.$nombre);
        flash()->success('Evento eliminado');
        return redirect()->back();    
    }
    public function fnc_show_edit($id){
       $obj_evento_epi=  evento_epi::find($id);
        return view('catalogos/editar_evento',
                compact('obj_evento_epi'));
    }
    public function fnc_show_update(Request $request){
        //
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_evento_epi =evento_epi::find($request->id);
       $error = null;
        DB::beginTransaction();
        try {
            $obj_evento_epi->codigo_evento=$request->codigo;
            $obj_evento_epi->nombre_evento=$request->nombre;
            $obj_evento_epi->descripcion_evento=$request->descripcion;
            $obj_evento_epi->save();
            $obj_controller_bitacora->create_mensaje('Evento modificado:'.$request->nombre);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $e->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Evento modificado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al modificar evento, '.$error);
          return redirect()->back();  
        }
    }

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
