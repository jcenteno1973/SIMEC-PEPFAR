<?php
/*
 * Nombre del archivo: IndicadorController.php
 * Descripción: Controlador para la tabla indicador
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\bitacoraController;
use App\Models\indicador;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\evento_epi;
use App\Models\componente;
use App\Models\tipo_indicador;
use App\Models\archivo_fuente;
use App\Models\vigilancia;
use App\Models\asignar_componente;
use App\Models\archivo_datos;
use App\Http\Controllers\ArchivoDatosController;
use Illuminate\Support\Facades\Storage;

class IndicadorController extends Controller
{
    public function fnc_show_create(){
       //Crea formularia para un nuevo indicador 
       $obj_evento_epi= evento_epi::lists('nombre_evento','id_evento_epi');
       $obj_evento_epi[0]='Seleccionar';
       $obj_componente= componente::lists('codigo_componente','id_componente');
       $obj_componente[0]='Seleccionar';
       $obj_tipo_indicador= tipo_indicador::lists('nombre_tipo_indicador','id_tipo_indicador');
       $obj_tipo_indicador[0]='Seleccionar';
       return view('configuracion/nuevo_indicador',
               compact('obj_tipo_indicador','obj_componente','obj_evento_epi'));
    }
    public function fnc_show_store(Request $request){
        //Almacena un nuevo indicador
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_indicador = new indicador();
       $error ="Seleccionar";
       $success = true;
       if($request->eventos==0){
          $success = false;
          $error=$error.", evento";
       }
       if($request->numerador==0){
          $success = false;
          $error=$error.", numerador";
       }
        if($request->tipo==0){
          $success = false;
          $error=$error.", tipo indicador";
       }
       
        if($success){
            DB::beginTransaction();
        try {
            $obj_indicador->id_tipo_indicador=$request->tipo;
            $obj_indicador->id_evento_epi=$request->eventos;
            $obj_indicador->codigo_indicador=$request->codigo;
            $obj_indicador->descripcion_indicador=$request->descripcion;
            $obj_indicador->id_componente=$request->numerador;
            if($request->tipo==4){
                $obj_indicador->com_id_componente=null;
            }else{
                $obj_indicador->com_id_componente=$request->denominador;
            }
            $obj_indicador->multiplicador=$request->multiplicador;
            $obj_indicador->save();
            $obj_controller_bitacora->create_mensaje('Indicador creado:'.$request->codigo);
            //Crear el archivo fuente
            $obj_archivo_fuente = new archivo_fuente();
            $obj_archivo_fuente->id_indicador=$obj_indicador->id_indicador;
            $obj_archivo_fuente->id_evento_epi=$obj_indicador->id_evento_epi;
            $obj_archivo_fuente->codigo_archivo_fuente=$obj_indicador->codigo_indicador;
            $obj_archivo_fuente->descripcion_archivo_fuente=$obj_indicador->descripcion_indicador;
            $obj_archivo_fuente->save();
            $obj_controller_bitacora->create_mensaje('Archivo fuente creado:'.$request->codigo);
            //Asignar componentes
            if($request->tipo==4){
               $obj_numerador=  new asignar_componente();
               $obj_numerador->id_archivo_fuente=$obj_archivo_fuente->id_archivo_fuente;
               $obj_numerador->id_componente=$obj_indicador->id_componente;
               $obj_numerador->fila_archivo_fuente=0;
               $obj_numerador->save();
            }else{
               $obj_numerador=  new asignar_componente();
               $obj_numerador->id_archivo_fuente=$obj_archivo_fuente->id_archivo_fuente;
               $obj_numerador->id_componente=$obj_indicador->id_componente;
               $obj_numerador->fila_archivo_fuente=0;
               $obj_numerador->save();
               $obj_denominador=  new asignar_componente();
               $obj_denominador->id_archivo_fuente=$obj_archivo_fuente->id_archivo_fuente;
               $obj_denominador->id_componente=$obj_indicador->com_id_componente;
               $obj_denominador->fila_archivo_fuente=0;
               $obj_denominador->save();
            }
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Indicador creado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al crear indicador, '.$error);
          return redirect()->back();  
        }
        }else{
          flash()->warning($error);
          return redirect()->back();    
        }
    }

    public function fnc_buscar_indicador(){
        $obj_indicador= indicador::paginate(10);
        return view('configuracion/buscar_indicador',
                compact('obj_indicador'));
    }
    public function fnc_show_edit($id){
       $obj_indicador= indicador::find($id);
       $obj_evento_epi= evento_epi::lists('nombre_evento','id_evento_epi');
       $obj_componente= componente::lists('codigo_componente','id_componente');
       $obj_componente[0]='Seleccionar';
       $obj_tipo_indicador= tipo_indicador::lists('nombre_tipo_indicador','id_tipo_indicador');
       return view('configuracion/editar_indicador',
               compact('obj_tipo_indicador','obj_componente','obj_evento_epi','obj_indicador'));
    }
    public function fnc_eliminar_indicador($id){
        $obj_archivo_datos=  archivo_datos::fnc_archivo_fuente($id);
        if($obj_archivo_datos->count()>0){
           flash()->warning('Indicador no puede ser eliminado, tiene archivo de datos asociados');
           return redirect('configuracion/buscar_indicador'); 
        }else{
          $obj_archivo_fuente=  archivo_fuente::fnc_id_archivo($id);
          $obj_indicador= indicador::find($id);
          $nombre=$obj_indicador->codigo_indicador;
          foreach($obj_archivo_fuente as $obj_archivo_fuentes){
             $obj_archivo_fuentes->delete();
           }
          $obj_indicador->delete();
          $obj_controller_bitacora=new bitacoraController();
          $obj_controller_bitacora->create_mensaje('Indicador eliminado exítosamente: '.$nombre);
          flash()->success('Indicador eliminado exítosamente');
          return redirect('configuracion/buscar_indicador');   
        }
    }
    public function fnc_show_update(Request $request){
        //Almacena un nuevo indicador
       $obj_controller_bitacora=new bitacoraController(); 
       $obj_indicador = indicador::find($request->id);
       $error ="Seleccionar";
       $eliminar=0;
       $success = true;
       if($request->eventos==0){
          $success = false;
          $error=$error.", evento";
       }
       if($request->numerador==0){
          $success = false;
          $error=$error.", numerador";
       }
        if($request->tipo==0){
          $success = false;
          $error=$error.", tipo indicador";
       }
       
        if($success){
            DB::beginTransaction();
        try {
            if($obj_indicador->id_tipo_indicador!=$request->tipo){
             $eliminar=1;    
            }
            $obj_indicador->id_tipo_indicador=$request->tipo;
            $obj_indicador->id_evento_epi=$request->eventos;
            $obj_indicador->codigo_indicador=$request->codigo;
            $obj_indicador->descripcion_indicador=$request->descripcion;
            if($obj_indicador->id_componente!=$request->numerador){
               $eliminar=1; 
            }
            $obj_indicador->id_componente=$request->numerador;
            if($obj_indicador->com_id_componente!=$request->denominador){
                if($request->tipo==4){
                   $obj_indicador->com_id_componente=null;
                }else{
                   $obj_indicador->com_id_componente=$request->denominador;
                   $eliminar=1;
                     }
            }
            $obj_indicador->multiplicador=$request->multiplicador;
            $obj_indicador->save();
            //eliminar los componente asignados, los archivos cargados y los indicadores calculados
            if($eliminar==1){
               $obj_archivo_fuente=archivo_fuente::fnc_id_archivo($request->id);
               $col_archivo_fuente=archivo_fuente::fnc_id_archivo($request->id);
               $obj_archivo_fuente=  archivo_fuente::find($col_archivo_fuente[0]->id_archivo_fuente);
               $obj_archivo_fuente->codigo_archivo_fuente=$obj_indicador->codigo_indicador;
               $obj_archivo_fuente->descripcion_archivo_fuente=$obj_indicador->descripcion_indicador;
               $obj_archivo_fuente->save();
               foreach($obj_archivo_fuente as $obj_archivo_fuentes){
                  $obj_archivo_dato=  archivo_datos::fnc_archivo_fuente($obj_archivo_fuentes->id_archivo_fuente);
                  $obj_asignar_componente=  asignar_componente::fnc_fila($obj_archivo_fuentes->id_archivo_fuente);
                  //Eliminar componentes asignados
                  if($obj_asignar_componente->count()>0){
                    DB::table("asignar_componente")->where("id_archivo_fuente",$obj_archivo_fuentes->id_archivo_fuente)->delete();
                  }
                  foreach($obj_archivo_dato as $obj_archivo_datos){
                    //eliminar datos de la tabla vigilancia_epidemiologica
                    DB::table("vigilancia_epidemiologica")->where("id_archivo_datos",$obj_archivo_datos->id_archivo_datos)->delete();
                    //eliminar datos de la tabla archivo_datos
                    //DB::table("archivo_datos")->where("id_archivo_datos",$obj_archivo_datos->id_archivo_datos)->delete();
                    $obj_archivo=  archivo_datos::find($obj_archivo_datos->id_archivo_datos);
                    $obj_archivo->datos_cargados=0;
                    $obj_datos->save();
                  }
                  //Asignar componentes
                  if($request->tipo==4){
                   $obj_numerador=  new asignar_componente();
                   $obj_numerador->id_archivo_fuente=$obj_archivo_fuentes->id_archivo_fuente;
                   $obj_numerador->id_componente=$obj_indicador->id_componente;
                   $obj_numerador->fila_archivo_fuente=0;
                   $obj_numerador->save();
                   }else{
                     $obj_numerador=  new asignar_componente();
                     $obj_numerador->id_archivo_fuente=$obj_archivo_fuentes->id_archivo_fuente;
                     $obj_numerador->id_componente=$obj_indicador->id_componente;
                     $obj_numerador->fila_archivo_fuente=0;
                     $obj_numerador->save();
                     $obj_denominador=  new asignar_componente();
                     $obj_denominador->id_archivo_fuente=$obj_archivo_fuentes->id_archivo_fuente;
                     $obj_denominador->id_componente=$obj_indicador->com_id_componente;
                     $obj_denominador->fila_archivo_fuente=0;
                     $obj_denominador->save();
            }
            } 
            }else{
               $col_archivo_fuente=archivo_fuente::fnc_id_archivo($request->id);
               $obj_archivo_fuente=  archivo_fuente::find($col_archivo_fuente[0]->id_archivo_fuente);
               $obj_archivo_fuente->codigo_archivo_fuente=$obj_indicador->codigo_indicador;
               $obj_archivo_fuente->descripcion_archivo_fuente=$obj_indicador->descripcion_indicador;
               $obj_archivo_fuente->save();
            }
            $obj_controller_bitacora->create_mensaje('Indicador modificado:'.$request->codigo);
            $success = true;
        } catch (Exception $ex) {
            $success = false;
	    $error = $ex->getMessage();
	    DB::rollback();
        }
        if($success){
           flash()->success('Indicador modificado exítosamente');
           return redirect()->back();    
        }else{
          flash()->error('Error al modificar indicador, '.$error);
          return redirect()->back();  
        }
        }else{
          flash()->warning($error);
          return redirect()->back();    
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
