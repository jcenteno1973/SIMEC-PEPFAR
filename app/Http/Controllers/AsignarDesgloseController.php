<?php
/*
 * Nombre del archivo: AsignarDesgloseController.php
 * Descripción: Controlador para la tabla asignar_desglose
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\archivo_fuente;
use App\Models\catalogo;
use App\Models\asignar_desglose;
use App\Models\archivo_datos;
use Illuminate\Support\Facades\DB;

class AsignarDesgloseController extends Controller
{
    public function fnc_buscar_desglose($id){
        $obj_catalogo=  catalogo::all();
        $obj_desglose_asig=  asignar_desglose::fnc_columnas($id);
        return view('configuracion/buscar_desglose_asig',  
                compact('obj_desglose_asig','obj_catalogo'));
    }
    public function fnc_show_create_desg($id){
        $obj_desglose_asig=  asignar_desglose::fnc_columnas($id);
        if($obj_desglose_asig->count()>0){
            flash()->warning('El desglose ya esta asignado');
            return redirect('configuracion/buscar_af');
        }else{
          $obj_archivo_fuente=  archivo_fuente::find($id);
          $obj_catalogo=  catalogo::where('es_desglose',0)->get();
          $lista_catalogo=$obj_catalogo->lists('nombre_catalogo','id_catalogo');
          $lista_catalogo[0]='Seleccionar';
          return view('configuracion/asignar_desglose',
                compact('obj_archivo_fuente','lista_catalogo'));  
        }
        
    }
    public function fnc_eliminar_desglose($id){
        //Borrar el desglose asignado
        $obj_archivo_datos= archivo_datos::fnc_archivo_fuente($id);
        if($obj_archivo_datos->count()>0){
            flash()->warning('El desglose asignado no puede ser borrado, tiene archivo de datos asociados');
            return redirect('configuracion/buscar_af');
        }
        $obj_desglose_asig=  asignar_desglose::fnc_columnas($id);
        if($obj_desglose_asig->count()==0){
            flash()->warning('No tiene desglose asignado');
            return redirect('configuracion/buscar_af');
        }else{
             //Borrar desglose asignado
            DB::table("asignar_desglose")->where("id_archivo_fuente",$id)->delete();
            flash()->success('Borrado el desglose asignado con exíto');
            return redirect('configuracion/buscar_af');
        }   
    }

    public function fnc_show_create($id){
        dd("Asignar desglose");
    }
    public function fnc_show_store_desg(Request $request){
        //Guardar desglose asignado
        $success=true;
        $mensaje=null;
      if($request->primer==0){
        $mensaje="Seleccionar el desglose";
        $success=false;
      }else{
          if($request->primer==$request->segundo){
            $mensaje="Los desglose deben ser diferentes"; 
            $success=false; 
          }  
      }
      if($success){
          $i=1;
          if($request->segundo==0){
             $obj_primer= catalogo::where('cat_id_catalogo',$request->primer)->orderBy('id_catalogo')->get(); 
             foreach ($obj_primer as $obj_primers){
               $obj_asignar_desglose= new asignar_desglose();
               $obj_asignar_desglose->id_catalogo=$obj_primers->id_catalogo;
               $obj_asignar_desglose->id_archivo_fuente=$request->id;
               $obj_asignar_desglose->columna_archivo_fuente=$i;
               $obj_asignar_desglose->save();
               $i=$i+1;
             }
          }else{
           $i=1;
           $obj_primer= catalogo::where('cat_id_catalogo',$request->primer)->orderBy('id_catalogo')->get();
           foreach ($obj_primer as $obj_primers){
               $obj_segundo= catalogo::where('cat_id_catalogo',$request->segundo)->orderBy('id_catalogo')->get(); 
               foreach ($obj_segundo as $obj_segundos){
               $obj_asignar_desglose= new asignar_desglose();
               $obj_asignar_desglose->id_catalogo=$obj_primers->id_catalogo;
               $obj_asignar_desglose->cat_id_catalogo=$obj_segundos->id_catalogo;
               $obj_asignar_desglose->id_archivo_fuente=$request->id;
               $obj_asignar_desglose->columna_archivo_fuente=$i;
               $obj_asignar_desglose->save();
               $i=$i+1;
               }
           }
          }
          
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create_mensaje('Desglose asignado: '.$request->archivo_fuente);
       flash()->success('Desglose asignado');
       //debe regresar a la busqueda de archivo fuente
        return redirect('configuracion/buscar_af');
      }else{
          flash()->warning($mensaje);
          return redirect()->back();
      }
         
    }

    public function fnc_show_update(Request $request){
        $i=0;
        $success=false;
        foreach ($request->id_asignar_desglose as $id){
         $obj_asignar_desglose= asignar_desglose::find($id);
         $obj_asignar_desglose->columna_archivo_fuente=$request->columna[$i];
         $obj_asignar_desglose->save();
         $obj_archivo_fuente=archivo_fuente::find($obj_asignar_desglose->id_archivo_fuente);
         $i=$i+1;
         $success=true;
        }
        if($success){
         $obj_controller_bitacora=new bitacoraController();
         $obj_controller_bitacora->create_mensaje('Desglose asignado modificado: '.$obj_archivo_fuente->codigo_archivo_fuente);
         flash()->success('Desglose asignado modificado');
         return redirect('configuracion/buscar_af');  
        }else{
            flash()->error('Desglose asignado no modificado');
            return redirect('configuracion/buscar_af');
        }
       
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
