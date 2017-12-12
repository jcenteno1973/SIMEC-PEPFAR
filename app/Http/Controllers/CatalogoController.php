<?php
/*
 * Nombre del archivo: CatalogoController.php
 * Descripción: Controlador para la tabla catalogo
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\catalogo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\bitacoraController;

class CatalogoController extends Controller
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

     public function fnc_show_create() {
       //Visualiza formula para nuevo catalogo  
        return view('catalogos/nuevo_catalogo');
        
    }
     public function fnc_show_create_desg($id) {
       //
       $obj_catalogo= catalogo::find($id);
        return view('catalogos/nuevo_desglose',
               compact('obj_catalogo'));
        
    }
    public function fnc_show_store(Request $request) {
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_catalogo = new catalogo();
       $error = null;
        DB::beginTransaction();
        try {
            $obj_catalogo->nombre_catalogo=$request->nombre;
            $obj_catalogo->es_desglose=0;
            $obj_catalogo->save();
            $obj_controller_bitacora->create_mensaje('Catálogo creado:'.$request->nombre);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Catálogo creado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al crear catalogo, '.$error);
          return redirect()->back();  
        }
    }
    public function fnc_show_store_desg(Request $request) {
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_catalogo = new catalogo();
       $error = null;
        DB::beginTransaction();
        try {
            $obj_catalogo->cat_id_catalogo=$request->id;
            $obj_catalogo->desglose=$request->desglose;
            $obj_catalogo->es_desglose=1;
            $obj_catalogo->save();
            $obj_controller_bitacora->create_mensaje('Desglose creado:'.$request->desglose);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Desglose creado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al crear desglose, '.$error);
          return redirect()->back();  
        }
    }
     public function fnc_buscar_catalogo(){
        //
        $obj_catalogo= catalogo::where('es_desglose',0)->paginate(10);
        return view('catalogos/buscar_catalogo',
                compact('obj_catalogo'));
    }
    public function fnc_buscar_desglose($id){
        //Pantalla que muestra el desglose de un catálogo
        $obj_catalogo= catalogo::where('cat_id_catalogo',$id)->paginate(10);
        return view('catalogos/buscar_desglose',
                compact('obj_catalogo'));
    }
     public function fnc_show_edit($id){
       $obj_catalogo= catalogo::find($id);
        return view('catalogos/editar_catalogo',
                compact('obj_catalogo'));
    }
     public function fnc_show_edit_desg($id){
       $obj_catalogo= catalogo::find($id);
        return view('catalogos/editar_desglose',
                compact('obj_catalogo'));
    }
    public function fnc_show_update(Request $request) {
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_catalogo = catalogo::find($request->id);
       $error = null;
        DB::beginTransaction();
        try {
            $obj_catalogo->nombre_catalogo=$request->nombre;
            $obj_catalogo->es_desglose=0;
            $obj_catalogo->save();
            $obj_controller_bitacora->create_mensaje('Catálogo modificado:'.$request->nombre);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Catálogo modificado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al modificar el catalogo, '.$error);
          return redirect()->back();  
        }
    }
    public function fnc_show_update_desg(Request $request) {
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_catalogo = catalogo::find($request->id);
       $error = null;
        DB::beginTransaction();
        try {
            $obj_catalogo->desglose=$request->desglose;
            $obj_catalogo->es_desglose=1;
            $obj_catalogo->save();
            $obj_controller_bitacora->create_mensaje('Desglose modificado:'.$request->desglose);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Desglose modificado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al modificar el desglose, '.$error);
          return redirect()->back();  
        }
    }
    public function fnc_eliminar_catalogo($id){
        //Eliminar catalogo
        $obj_controller_bitacora=new bitacoraController(); 
        $obj_catalogo= catalogo::find($id);
        $obj_desglose=catalogo::where('cat_id_catalogo',$id)->get();
        DB::beginTransaction();
        try {
            foreach ($obj_desglose as $obj_desgloses){
            $obj_desgloses->delete();
            }
        $nombre=$obj_catalogo->nombre_catalogo;
        $obj_catalogo->delete();
        $obj_controller_bitacora->create_mensaje('Catálogo eliminado:'.$nombre);
        $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
         if($success){
           flash()->success('Catálogo eliminado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al eliminar catálogo, '.$error);
          return redirect()->back();  
        }
    }
    public function fnc_eliminar_desglose($id){
        //Eliminar desglose
        $obj_controller_bitacora=new bitacoraController(); 
        $obj_catalogo= catalogo::find($id);
        DB::beginTransaction();
        try {
        $nombre=$obj_catalogo->desglose;
        $obj_catalogo->delete();
        $obj_controller_bitacora->create_mensaje('Desglose eliminado:'.$nombre);
        $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
         if($success){
           flash()->success('Desglose eliminado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al eliminar desglose, '.$error);
          return redirect()->back();  
        }
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
