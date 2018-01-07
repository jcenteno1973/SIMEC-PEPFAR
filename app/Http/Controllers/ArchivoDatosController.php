<?php
/*
 * Nombre del archivo: ArchivoDatosController.php
 * Descripción: Controlador para la tabla archivo_datos
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno Borja
 */
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\region_sica;
use App\Models\anio_notificacion;
use App\Models\evento_epi;
use App\Models\archivo_fuente;
use App\Models\archivo_datos;
use App\Models\asignar_componente;
use App\Models\asignar_desglose;
use App\Models\vigilancia;
use App\Models\indicador;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\RegionSicaController;
use App\Http\Controllers\ArchivoFuenteController;
use Excel;
use JasperPHP\JasperPHP;

class ArchivoDatosController extends Controller
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
    public function fnc_show_parametros(){
        //Abre el formulario de parametros
        return view('carga_datos/reporte_archivo_datos');
    }
    public function fnc_show_consultar_archivos(Request $request){
    //Generar reporte de archivos cargados
    $obj_controller_bitacora=new bitacoraController();
    $fecha_inicio=Carbon::createFromFormat('d/m/Y', $request->fecha_inicio);
    $fecha_fin=Carbon::createFromFormat('d/m/Y', $request->fecha_fin);
    //$fecha_fin->addDay();    
    $reporte_generado='/reportes_jasper/'.time().'_archivo_datos';//time le aggrega un número generado por la hora
    $obj_controller_bitacora->create_mensaje('Generar reporte: Archivo datos');
    $output = public_path() .$reporte_generado; 
    $report = new JasperPHP;
    $report->process(
    public_path() . '/reportes_jasper/archivo_datos.jrxml', 
    $output, 
    array('pdf'),//, 'rtf', 'html'),
    array('fecha_inicio' =>$fecha_inicio->toDateString(),'fecha_fin'=>$fecha_fin->toDateString()),
    config('conexion_report.conexion')
    )->execute();
    $reporte_generado='..'.$reporte_generado.'.pdf';    
    return view('carga_datos/consultar_archivo_datos',compact('reporte_generado'));
    }

    public function fnc_show_create(){
        /*
         * Formulario para nueva carga de archivo de datos
         */
        $obj_region_sica=  region_sica::all();
        $obj_anio = anio_notificacion::all();
        $obj_evento_epi=  evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_archivo_fuente= archivo_fuente::fnc_archivo_fuentes(0);
        $codigo_archivo=$obj_archivo_fuente->lists('codigo_archivo_fuente','id_archivo_fuente');
        $codigo_archivo[0]='Seleccionar';
        $obj_evento_epi[0]='Seleccionar';
        return view('carga_datos/nueva_carga_archivo',
                compact('obj_region_sica','obj_anio','obj_evento_epi','codigo_archivo'));
    }
    public function fnc_show_edit($id){
        /*
         * Formulario para editar carga de archivo de datos
         */
        $obj_archivo_datos= archivo_datos::find($id);
        $obj_region_sica=  region_sica::all();
        $obj_anio = anio_notificacion::all();
        $obj_evento_epi=  evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_archivo_fuente= archivo_fuente::fnc_archivo_fuentes(1);
        $codigo_archivo=$obj_archivo_fuente->lists('codigo_archivo_fuente','id_archivo_fuente');
        return view('carga_datos/editar_carga_archivo',
                compact('obj_region_sica','obj_anio','obj_evento_epi','codigo_archivo','obj_archivo_datos'));
    }
    public function fnc_show_update(Request $request){
        //Realiza la modificación en la base de datos
        $obj_controller_bitacora=new bitacoraController();
        $error = null;
        $date = Carbon::now();
        $obj_archivo_datos= archivo_datos::find($request->id_archivo_datos);
        $obj_region_sica = new RegionSicaController();
        $id_regio_sica=$obj_region_sica->fnc_obtener_id($request->region_sica);
        //Validar que no se repita el archivo
        $obj_archivo= archivo_datos::where("id_region_sica","=",$id_regio_sica)
                                     ->where("id_archivo_fuente","=",$request->codigos)
                                     ->where("id_anio_notificacion","=",$request->anio_notificacion)
                                     ->where("id_evento_epi","=",$request->eventos)
                                     ->get();
       foreach($obj_archivo as $archivos){
        $mensaje="Ya existe el archivo, no se puede modificar";
        flash()->error($mensaje);
        return redirect()->back(); 
       }
       
        DB::beginTransaction();
        try {
       $file = $request->file;
       $obj_archivo_datos->id_region_sica=$id_regio_sica;
       $obj_archivo_datos->id_archivo_fuente=$request->codigos;
       $obj_archivo_datos->id_anio_notificacion=$request->anio_notificacion;
       $obj_archivo_datos->id_usuario_app=Auth::user()->id_usuario_app;
       $obj_archivo_datos->id_evento_epi=$request->eventos;
       $obj_archivo_datos->save(); 
       $obj_controller_bitacora->create_mensaje('Datos modificados: '.$file); 
       DB::commit();
       $success = true;
       }catch (\Exception $e) {
	$success = false;
	$error = $e->getMessage();
	DB::rollback();
    }
     if ($success) {
    flash()->success('Datos modificados exítosamente');
    return redirect()->back();
    } 
    //error
    flash()->error('Error al modificar los datos'.$error);
    return redirect()->back();   
    }
    
     public function fnc_filtros_buscar_carga(Request $request){
        //Busqueda con filtros de archivos de datos
        $obj_region_sica = new RegionSicaController();
        if($request->region_sica==null){
          $request->anio_notificacion=2015;
          $request->eventos=0;
          $request->codigos=0;
        if(Auth::user()->role_id==1){
         $id_region_sica=1;
        }else{
         $id_region_sica=Auth::user()->id_region_sica;
          }  
        }else{
          $id_region_sica=$obj_region_sica->fnc_obtener_id($request->region_sica);  
        }
        if($request->codigos==0){
            if(Auth::user()->role_id==1){
              $obj_archivo_datos= archivo_datos::id_region_sica($id_region_sica)->id_anio_notificacion($request->anio_notificacion)->orderBy('id_archivo_datos','desc')->paginate(10);
            }else{
              $obj_archivo_datos= archivo_datos::id_region_sica(Auth::user()->id_region_sica)->id_anio_notificacion($request->anio_notificacion)->orderBy('id_archivo_datos','desc')->paginate(10);   
            }
        }else{
          if(Auth::user()->role_id==1){
           $obj_archivo_datos= archivo_datos::id_region_sica($id_region_sica)->id_anio_notificacion($request->anio_notificacion)->id_archivo_fuente($request->codigos)->orderBy('id_archivo_datos','desc')->paginate(10);
          }else{
            $obj_archivo_datos= archivo_datos::id_region_sica(Auth::user()->id_region_sica)->id_anio_notificacion($request->anio_notificacion)->id_archivo_fuente($request->codigos)->orderBy('id_archivo_datos','desc')->paginate(10);   
          }  
        }
        $obj_region_sica=  region_sica::all();
        $obj_anio = anio_notificacion::all();
        $obj_evento_epi_total=  evento_epi::all();
        $obj_archivo_fuente_total=  archivo_fuente::all();
        $obj_evento_epi= evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_evento_epi[0]="Seleccionar"; 
        $obj_archivo_fuente= archivo_fuente::fnc_archivo_fuentes($request->eventos);
        $codigo_archivo=$obj_archivo_fuente->lists('descripcion_archivo_fuente','id_archivo_fuente');
        $codigo_archivo[0]="Seleccionar";
        return view('carga_datos/buscar_carga_filtro',
                compact('obj_region_sica','obj_anio','obj_evento_epi','codigo_archivo','obj_archivo_datos','obj_evento_epi_total','obj_archivo_fuente_total','request','id_region_sica'));
    }
    public function fnc_show_store(Request $request){
        //Guarda en la base de datos y el archivo de datos
        $file = $request->file('file');
        $obj_controller_bitacora=new bitacoraController();
        $ext=strtolower($file->getClientOriginalExtension());
        if($_FILES['file']['error']==1){
         $obj_controller_bitacora->create_mensaje('No se puede cargar el archivo: '.$_FILES['file']['name']);           
         $errors='No se puede cargar el archivo: '.$_FILES['file']['name'];
         flash()->error($errors);
         return redirect()->back();
       } else{
        if($ext!="xls" && $ext!="xlsx"){ 
         $obj_controller_bitacora->create_mensaje('Tipo archivo erroneo: '.$_FILES['file']['name']);           
         $errors='Tipo archivo erroneo: '.$_FILES['file']['name'];
         flash()->error($errors);
         return redirect()->back();  
        }
        $error = null;
        $paso=0;
        if($request->anio_notificacion=="Seleccionar"||$request->eventos==0||$request->codigos==0){
          if($request->anio_notificacion=="Seleccionar"){
            $mensaje="Seleccionar el año";
            $paso=1;
            }  
          if($request->eventos==0){
           if($paso==1){
             $mensaje=$mensaje.", seleccionar el evento y el código archivo";  
           }else{
               $mensaje="Seleccionar el evento y el código archivo"; 
           }
          }
          flash()->warning($mensaje);
          return redirect()->back();    
        }
        $date = Carbon::now();
        $obj_archivo_datos= new archivo_datos();
        $obj_region_sica = new RegionSicaController();
        $id_regio_sica=$obj_region_sica->fnc_obtener_id($request->region_sica);
        //Validar que no se repita el archivo
        $obj_archivo= archivo_datos::where("id_region_sica","=",$id_regio_sica)
                                     ->where("id_archivo_fuente","=",$request->codigos)
                                     ->where("id_anio_notificacion","=",$request->anio_notificacion)
                                     ->where("id_evento_epi","=",$request->eventos)
                                     ->get();
       foreach($obj_archivo as $archivos){
        $mensaje="Ya existe el archivo, no se puede cargar";
        flash()->error($mensaje);
        return redirect()->back(); 
       }
       
        DB::beginTransaction();
        try {
       $archivo_datos= new archivo_datos();
         //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       $ext=strtolower($file->getClientOriginalExtension());
       $nombre_archivo=time().'.'.$ext; 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('archivo_datos/'.$nombre_archivo,  \File::get($file));
       $obj_archivo_datos->id_region_sica=$id_regio_sica;
       $obj_archivo_datos->id_archivo_fuente=$request->codigos;
       $obj_archivo_datos->id_anio_notificacion=$request->anio_notificacion;
       $obj_archivo_datos->id_usuario_app=Auth::user()->id_usuario_app;
       $obj_archivo_datos->id_evento_epi=$request->eventos;
       $obj_archivo_datos->nombre_archivo=$nombre_archivo;
       $obj_archivo_datos->nombre_carga=$_FILES['file']['name'];
       $obj_archivo_datos->url_documento='storage/archivo_datos';
       $obj_archivo_datos->datos_cargados=0;
       $obj_archivo_datos->save(); 
       $obj_controller_bitacora->create_mensaje('Archivo cargado: '.$_FILES['file']['name']); 
       DB::commit();
       $success = true;
       }catch (\Exception $e) {
	$success = false;
	$error = $e->getMessage();
	DB::rollback();
    }
    if ($success) {
    flash()->success('Archivo cargado exitosamente');
    return redirect()->back();
    } 
    //error
    flash()->error('Error al cargar el archivo '.$error);
    return redirect()->back(); 
    }
    
    }
    public function fnc_descargar_archivo($id){
        $obj_archivo_datos=  archivo_datos::fnc_archivo_datos($id);
        $pathtoFile = public_path().'/storage/archivo_datos/'.$obj_archivo_datos[0]->nombre_archivo;
      return response()->download($pathtoFile);
    }
    public function fnc_cargar_datos($id){
       //Extrae los datos del archivo y se guarda en la base de datos
       $obj_archivo_datos=  archivo_datos::fnc_archivo_datos($id);
       $url=$obj_archivo_datos[0]->url_documento;
       $nombre=$obj_archivo_datos[0]->nombre_archivo;
       Excel::selectSheetsByIndex(0)->load($url.'/'.$nombre, function($sheet) use($id){
       $obj_controller_bitacora=new bitacoraController();
       $fecha= new Carbon();
       $sheet->noHeading();
       $results = $sheet->toArray();
       $success = true;
       $error = null;
       $id_indicador=0;
       $pais=$results[0][1];
       if($pais==null){
          $success = false;
       }
       $anio=$results[1][1];
       if($anio==null){
          $success = false;
       }
       $evento=$results[2][1];
       if($evento==null){
          $success = false;
       }
       $codigo=$results[3][1];
       if($codigo==null){
          $success = false;
       }
       $fuente=$results[4][1];
       if($fuente==null){
          $success = false;
       }
       $fecha=$results[5][1];
       if($fecha==null){
          $success = false;
       }
       $id_archivo_fuente=0;
       $id_regio_sica=0;
       $id_evento=0;
       
       if($success){
          $obj_region_sica = new RegionSicaController();
          $id_regio_sica=$obj_region_sica->fnc_obtener_id($pais);
          $objeto= new ArchivoFuenteController();
          $obj_codigo_archivo=archivo_fuente::fnc_archivo_fuente_c($codigo);
          if($obj_codigo_archivo->count()>0){
             $id_archivo_fuente=$obj_codigo_archivo[0]->id_archivo_fuente;
             $id_indicador=$obj_codigo_archivo[0]->id_indicador;
          }else{
              $success = false;
              $error="El archivo no tiene el formato requerido";
          }
          $obj_evento= evento_epi::fnc_evento($evento);
          if($obj_evento->count()>0){
          $id_evento=$obj_evento[0]->id_evento_epi;    
          }else{
              $success = false;
              $error="El archivo no tiene el formato requerido";
          }
          
       }
       $obj_archivo_datos= archivo_datos::fnc_archivo_datos($id);
       //validar los datos de identificación del archivo
       if($obj_archivo_datos[0]->id_archivo_fuente==$id_archivo_fuente &&
          $obj_archivo_datos[0]->id_region_sica==$id_regio_sica &&
          $obj_archivo_datos[0]->id_anio_notificacion==$anio &&
          $obj_archivo_datos[0]->id_evento_epi==$id_evento){
          $success = true;
       }else{
         $success = false;
         if($error==null){
           $error="Los datos del encabezado no coinciden";    
         }else{
           $error=$error.", Los datos del encabezado no coinciden";    
         }  
         
       }
       $obj_componente=  asignar_componente::fnc_fila($obj_archivo_datos[0]->id_archivo_fuente);
       if($obj_componente->count()==0){
        $success = false;
         if($error==null){
           $error="Asignar los componentes al archivo fuente";    
         }else{
           $error=$error.", Asignar los componentes al archivo fuente";    
         }   
       }
       $obj_desglose=  asignar_desglose::fnc_columnas($obj_archivo_datos[0]->id_archivo_fuente);
       if($obj_desglose->count()==0){
        $success = false;
         if($error==null){
           $error="Asignar los desgloses al archivo fuente";    
         }else{
             $error=$error.", Asignar los desgloses al archivo fuente";  
         }
         
       }
       //Almacena los datos
        if ($success){
           //Obtener los datos del indicador
           foreach($obj_componente as $componente){
           $obj_indicador= indicador::find($id_indicador);
           }
           foreach($obj_componente as $componente){
           foreach ($obj_desglose as $desglose){
           $obj_vigilancia = new vigilancia();
           $obj_vigilancia->id_anio_notificacion=$obj_archivo_datos[0]->id_anio_notificacion;
           $obj_vigilancia->id_archivo_datos=$id;
           $obj_vigilancia->id_catalogo=$desglose->id_catalogo;
           $obj_vigilancia->id_region_sica=$obj_archivo_datos[0]->id_region_sica;
           $obj_vigilancia->id_componente=$componente->id_componente;
           $obj_vigilancia->cat_id_catalogo=$desglose->cat_id_catalogo;
           $valor_vigilancia=$results[$componente->fila_archivo_fuente][$desglose->columna_archivo_fuente];
           $obj_vigilancia->valor_vigilancia_epi=$valor_vigilancia;
           if($componente->id_componente==$obj_indicador->com_id_componente){
               $valor_minimo=1;//cuando es el denominador no puede ser igual a cero
           }else{
               $valor_minimo=0;
           }
           if ($valor_vigilancia==null || $valor_vigilancia<$valor_minimo){
             $success = false;
             $error ="Datos incorrectos";
           }
           $obj_vigilancia->save();
           }
       }
            
        }
       
       //Calcular el indicador
       $denominador=0;
       $numerador=0;
       $obj_vigilancia= vigilancia::fnc_vigilancia($id);
       if ($success){
         foreach ($obj_vigilancia as $vigilancia){
         if($obj_indicador->id_tipo_indicador==4){
                $vigilancia->valor_indicador=$vigilancia->valor_vigilancia_epi;
                $vigilancia->id_indicador=$obj_indicador->id_indicador;
                $vigilancia->save();
              }else{
                 if($vigilancia->id_componente == $obj_indicador->id_componente){
                  $numerador=$vigilancia->valor_vigilancia_epi;
                  $obj_vigilancia2= vigilancia::fnc_vigilancia($id);
                  foreach ($obj_vigilancia2 as $vigilancia2){
                   if($vigilancia2->id_componente==$obj_indicador->com_id_componente && 
                    $vigilancia2->id_catalogo == $vigilancia->id_catalogo && 
                    $vigilancia2->cat_id_catalogo == $vigilancia->cat_id_catalogo){                 
                    $denominador=$vigilancia2->valor_vigilancia_epi;
                    $vigilancia2->valor_indicador=($numerador/$denominador)*$obj_indicador->multiplicador; 
                    $vigilancia2->id_indicador=$obj_indicador->id_indicador;
                    $vigilancia2->save();
             }
           }
         } 
        } 
       } 
       
       $obj_archivo_datos[0]->fuente_datos=$fuente;
       $obj_archivo_datos[0]->fecha_datos=$fecha;
       $obj_archivo_datos[0]->datos_cargados=1;
       $obj_archivo_datos[0]->save();
       $obj_controller_bitacora->create_mensaje('Datos cargados de '.$fuente);
       $success = true;
       flash()->success('Datos cargados de '.$fuente);
       }
       else
       {  
       DB::table("vigilancia_epidemiologica")->where("id_archivo_datos",$id)->delete(); 
       $obj_controller_bitacora->create_mensaje('Datos no cargados '.$error);
       $success = false;
       flash()->error('Error al cargar los datos: '.$error);
       }
     });//Fin de la función de lectura de archivo excell.
     return redirect()->back(); 
    }
    public function fnc_eliminar_archivo($id){
        $obj_archivo_datos=  archivo_datos::find($id);
        $pathtoFile = '/archivo_datos/'.$obj_archivo_datos->nombre_archivo;
        $obj_controller_bitacora=new bitacoraController();
         DB::beginTransaction();
        try {
            //eliminar datos de la tabla vigilancia_epidemiologica
            DB::table("vigilancia_epidemiologica")->where("id_archivo_datos",$id)->delete();
            //eliminar datos de la tabla archivo_datos
            DB::table("archivo_datos")->where("id_archivo_datos",$id)->delete();
            
            $success = true;
        } catch (Exception $ex) {
        $success = false;
	$error = $e->getMessage();
	DB::rollback();
        }
    if ($success) {
    //eliminar archivo 
    Storage::delete($pathtoFile);
    $obj_controller_bitacora->create_mensaje('Archivo eliminado:'.$pathtoFile);
    flash()->success('Archivo eliminado exitosamente');
    return redirect()->back();
    } 
    //error
    flash()->error('Error al eliminar el archivo '.$error);
    return redirect()->back();
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
