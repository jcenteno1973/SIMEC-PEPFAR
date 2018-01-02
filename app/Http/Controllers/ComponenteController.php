<?php
/*
 * Nombre del archivo: ComponenteController.php
 * Descripción: Controlador para la tabla componente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\bitacoraController;
use App\Models\componente;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ComponenteController extends Controller
{
    public function fnc_show_create(){
        return view('catalogos/nuevo_componente');
    }
    public function fnc_buscar_componente(Request $request){
        if($request->codigo==null){
          $obj_componente= componente::orderby('id_componente')->paginate(10);   
        }else{
          $obj_componente= componente::codigo_componente($request->codigo)->orderby('id_componente')->paginate(10);     
        }
        return view('catalogos/buscar_componente',
                compact('obj_componente','request','request'));
    }
    public function fnc_show_store(Request $request){
        $obj_controller_bitacora=new bitacoraController(); 
       $obj_componente = new componente();
       $error = null;
        DB::beginTransaction();
        try {
            $obj_componente->codigo_componente=$request->codigo;
            $obj_componente->descripcion_componente=$request->descripcion;
            $obj_componente->save();
            $obj_controller_bitacora->create_mensaje('Componente creado:'.$request->codigo);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Componente creado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al crear componente, '.$error);
          return redirect()->back();  
        }
    }
    public function fnc_show_edit($id){
         $obj_componente= componente::find($id);
        return view('catalogos/editar_componente',
                compact('obj_componente'));
    }
    public function fnc_show_update(Request $request){
        //
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_componente =  componente::find($request->id);
       $error = null;
        DB::beginTransaction();
        try {
            $obj_componente->codigo_componente=$request->codigo;
            $obj_componente->descripcion_componente=$request->descripcion;
            $obj_componente->save();
            $obj_controller_bitacora->create_mensaje('Componente modificado:'.$request->codigo);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Componente modificado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al modificar componente, '.$error);
          return redirect()->back();  
        }
    }
     public function fnc_eliminar_componente($id){
        //Eliminar componente
        $obj_controller_bitacora=new bitacoraController(); 
        $obj_componente=  componente::find($id);
        $nombre=$obj_componente->codigo_componente;
        $obj_componente->delete();
        $obj_controller_bitacora->create_mensaje('Componente eliminado:'.$nombre);
        flash()->success('Componente eliminado');
        return redirect('catalogos/buscar_componente');    
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
