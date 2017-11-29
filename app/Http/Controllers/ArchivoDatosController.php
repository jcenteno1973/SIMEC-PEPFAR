<?php
/*
 * Nombre del archivo: ArchivoDatosController.php
 * Descripción: Controlador para la tabla archivo_datos
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
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
use App\Http\Requests;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\RegionSicaController;
use Excel;

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
    public function fnc_show_create(){
        /*
         * Formulario para nueva carga de archivo de datos
         */
        $obj_region_sica=  region_sica::all();
        $obj_anio = anio_notificacion::all();
        $obj_evento_epi=  evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_archivo_fuente= archivo_fuente::fnc_archivo_fuentes(1);
        $codigo_archivo=$obj_archivo_fuente->lists('codigo_archivo_fuente','id_archivo_fuente');
        return view('carga_datos/nueva_carga_archivo',
                compact('obj_region_sica','obj_anio','obj_evento_epi','codigo_archivo'));
    }
    public function fnc_filtro_buscar_carga(){
        $obj_archivo_datos= archivo_datos::all();
        $obj_region_sica=  region_sica::all();
        $obj_anio = anio_notificacion::all();
        $obj_evento_epi_total=  evento_epi::all();
        $obj_archivo_fuente_total=  archivo_fuente::all();
        $obj_evento_epi=  evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_archivo_fuente= archivo_fuente::fnc_archivo_fuentes(1);
        $codigo_archivo=$obj_archivo_fuente->lists('codigo_archivo_fuente','id_archivo_fuente');
        return view('carga_datos/buscar_carga',
                compact('obj_region_sica','obj_anio','obj_evento_epi','codigo_archivo','obj_archivo_datos','obj_evento_epi_total','obj_archivo_fuente_total'));
    }
    public function fnc_show_store(Request $request){
        //Guarda en la base de datos y en el servidor el archivo
        //dd($request);
        $obj_controller_bitacora=new bitacoraController();
        $date = Carbon::now();
        $obj_archivo_datos= new archivo_datos();
        $obj_region_sica = new RegionSicaController();
        $id_regio_sica=$obj_region_sica->fnc_obtener_id($request->region_sica);
        $archivo_datos= new archivo_datos();
        if($_FILES['file']['error']==1){
         $obj_controller_bitacora->create_mensaje('No se puede cargar el archivo: '.$_FILES['file']['name']);           
         $errors='No se puede cargar el archivo: '.$_FILES['file']['name'];
          return redirect()->back()->withInput()->withErrors($errors);
       } 
       else
       {
         //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       //$ext = end((explode(".", $nombre)));
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
       $obj_archivo_datos->url_documento='storage/archivo_datos';
       $obj_archivo_datos->datos_cargados=0;
       $obj_archivo_datos->save();
       $obj_controller_bitacora->create_mensaje('Archivo cargado: '.$_FILES['file']['name']);           
       flash()->success('Archivo cargado exitosamente');
       return redirect()->back(); 
       }
    }
    public function fnc_cargar_datos($id){
       $obj_archivo_datos=  archivo_datos::fnc_archivo_datos($id);
       $url=$obj_archivo_datos[0]->url_documento;
       $nombre=$obj_archivo_datos[0]->nombre_archivo;
       Excel::selectSheetsByIndex(0)->load($url.'/'.$nombre, function($sheet) use($id){
       $obj_controller_bitacora=new bitacoraController();
       $fecha= new Carbon();
       $sheet->noHeading();
       $results = $sheet->toArray();
       $fuente=$results[4][1];
       $fecha=$results[5][1];
       $obj_archivo_datos= archivo_datos::fnc_archivo_datos($id);
       $obj_componente=  asignar_componente::fnc_fila($obj_archivo_datos[0]->id_archivo_fuente);
       $obj_desglose=  asignar_desglose::fnc_columnas($obj_archivo_datos[0]->id_archivo_fuente);
       //Almacena los datos
       foreach($obj_componente as $componente){
           foreach ($obj_desglose as $desglose){
           $obj_vigilancia = new vigilancia();
           $obj_vigilancia->id_anio_notificacion=$obj_archivo_datos[0]->id_anio_notificacion;
           $obj_vigilancia->id_archivo_datos=$id;
           $obj_vigilancia->id_catalogo=$desglose->id_catalogo;
           $obj_vigilancia->id_region_sica=$obj_archivo_datos[0]->id_region_sica;
           $obj_vigilancia->id_componente=$componente->id_componente;
           $obj_vigilancia->cat_id_catalogo=$desglose->cat_id_catalogo;
           $obj_vigilancia->valor_vigilancia_epi=$results[$componente->fila_archivo_fuente][$desglose->columna_archivo_fuente];
           $obj_vigilancia->save();
           }
       }
       //Calcular el indicador
       
       dd($obj_componente);
       $obj_archivo_datos[0]->fuente_datos=$fuente;
       $obj_archivo_datos[0]->fecha_datos=$fecha;
       $obj_archivo_datos[0]->datos_cargados=1;
       $obj_archivo_datos[0]->save();
       
       $obj_controller_bitacora->create_mensaje('Datos cargados');
       flash()->success('Datos cargados exítosamente');
       //dd($obj_archivo_datos); 
        });
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
