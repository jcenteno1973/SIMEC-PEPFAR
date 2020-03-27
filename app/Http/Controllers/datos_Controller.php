<?php
    /*
     * indexAll GET         Mostrar Registros
     * index    POST        Mostrar Registros Resultado de Busqueda
     * create   GET         Form Adicion Registro
     * store    POST        Guardar Nuevo Registro
     * show     GET         Mostrar Registro {id}       NO IMPLEMENTADO
     * edit     GET         Mostrar Registro {id} con edicion
     * update   PUT/PATCH   Guardar Cambios a Registro {id}
     * destroy  DELETE      Borrar Registro {id}
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// add
use App\Models\configuracion;
use App\Models\datos;
use App\Http\Controllers\bitacoraController;
use Illuminate\Support\Facades\Input;

use App\Models\anio;
use App\Models\cascada_cv;
use App\Models\cascada;
use App\Models\dispensacion_tar;
use App\Models\embarazo_lactancia;
use App\Models\hospital;
use App\Models\indicador;
use App\Models\inicio_tratamiento;
use App\Models\laboratorios;
use App\Models\meses;
use App\Models\periodo;
use App\Models\periodo_prueba;
use App\Models\poblacion_clave;
use App\Models\prueba;
use App\Models\prueba_diagnostica_tb;
use App\Models\rango_edad;
use App\Models\rango_edad_etario;
use App\Models\resultado_carga_viral;
use App\Models\tipo_diagnostico;
use App\Models\resultado_incidencia;
use App\Models\seguimiento_tar;
use App\Models\sexo;
use App\Models\tipo_prueba_incidencia;
use App\Models\tratamiento;
use App\Models\tratamiento_tb;
use App\Models\unidad_atencion;
use App\Models\anio_semana;

use App\Models\region_sica;
use App\Models\departamento;
use App\Models\municipio;

use Illuminate\Support\Facades\Auth;

class datos_Controller extends Controller
{
    private $obj_config;

    public function __construct() {
        $this->middleware('auth');
        $this->obj_config = new configuracion();
        $this->setTemplate(1);
    }
    
    public function indexAll($id)
    {
        //
        $obj_tabla=datos::
                where('id_hospital','=', Auth::user()->id_hospital )->
                whereIn('id_indicador', $this->get_indicador($id))->
                orderBy('id_datos','ASC')->paginate($this->obj_config->paginate);
        $this->setTemplate($id);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $id;

        return view('roptrimestre/index_datos',compact('obj_tabla','obj_param','obj_filtro'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $l_index = 0;
        $whereData = array();
        
        $whereData[$l_index] = implode(" ", array("id_indicador", "in", "(", implode(",", $this->get_indicador($request->id_template)),")"));
        $l_index++;
        
        if ($request->id_anio != null)
        {
            $whereData[$l_index] = implode(" ", array('id_anio','=', '\''.$request->id_anio.'\''));
            $l_index++;
        }
        
        if ($request->id_periodo != null)
        {
            $whereData[$l_index] = implode(" ", array('id_periodo','=', '\''.$request->id_periodo.'\''));
            $l_index++;
        }
        
        $rawQuery = implode(" AND ", $whereData);
        
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla=datos::
                where('id_hospital','=', Auth::user()->id_hospital )->
                whereRaw($rawQuery)->
                orderBy('id_datos','ASC')->
                paginate($this->obj_config->paginate);
        $this->setTemplate($request->id_template);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $request->id_template;

        return view('roptrimestre/index_datos',compact('obj_tabla','obj_param','obj_filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $this->setTemplate($id);
        $obj_param = $this->obj_config;
        $obj_filtro = $id;
        
        $obj_select_region_sica = region_sica::all();
        $obj_select_departamento = departamento::all();
        $obj_select_municipio = municipio::all();
        
	$obj_select_anio = anio::all();
	$obj_select_cascada_cv = cascada_cv::all();
	$obj_select_cascada = cascada::all();
	$obj_select_dispensacion_tar = dispensacion_tar::all();
	$obj_select_embarazo_lactancia = embarazo_lactancia::all();
	$obj_select_hospital = hospital::all();
	$obj_select_indicador = indicador::all();
	$obj_select_inicio_tratamiento = inicio_tratamiento::all();
	$obj_select_laboratorios = laboratorios::all();
	$obj_select_meses = meses::all();
        
        if ($obj_filtro <= 22)
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 0')->get(); }
        else
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 1')->get(); }
        
	$obj_select_periodo_prueba = periodo_prueba::all();
	$obj_select_poblacion_clave = poblacion_clave::all();
	$obj_select_prueba = prueba::all();
	
        if ($obj_filtro == 26)
        { $obj_select_prueba_diagnostica_tb = prueba_diagnostica_tb::where('diferenciador','=','0')->get(); }
        elseif ($obj_filtro == 29)
        { $obj_select_prueba_diagnostica_tb = prueba_diagnostica_tb::where('diferenciador','=','1')->get(); }
        else
        { $obj_select_prueba_diagnostica_tb = prueba_diagnostica_tb::all(); }
        
	$obj_select_rango_edad = rango_edad::all();
	$obj_select_rango_edad_etario = rango_edad_etario::all();
	$obj_select_resultado_carga_viral = resultado_carga_viral::all();
        
        $obj_filtro_TipoDiagnostico = array(6,7,25,28,29,31,32);
        if (in_array($obj_filtro, $obj_filtro_TipoDiagnostico))
        { $obj_select_tipo_diagnostico = tipo_diagnostico::where('diferenciador','=','1')->get(); }
        else
        { $obj_select_tipo_diagnostico = tipo_diagnostico::all(); }
	
        $obj_select_resultado_incidencia = resultado_incidencia::all();
	$obj_select_seguimiento_tar = seguimiento_tar::all();
	$obj_select_sexo = sexo::all();
	$obj_select_tipo_prueba_incidencia = tipo_prueba_incidencia::all();
	$obj_select_tratamiento = tratamiento::all();
	$obj_select_tratamiento_tb = tratamiento_tb::all();
	$obj_select_unidad_atencion = unidad_atencion::where('id_hospital','=', Auth::user()->id_hospital)->get();
        $obj_select_anio_semana = anio_semana::where('vigente','=','1')->get();

        return view('roptrimestre/create_datos', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_anio',
                        'obj_select_cascada_cv',
                        'obj_select_cascada',
                        'obj_select_dispensacion_tar',
                        'obj_select_embarazo_lactancia',
                        'obj_select_hospital',
                        'obj_select_indicador',
                        'obj_select_inicio_tratamiento',
                        'obj_select_laboratorios',
                        'obj_select_meses',
                        'obj_select_periodo',
                        'obj_select_periodo_prueba',
                        'obj_select_poblacion_clave',
                        'obj_select_prueba',
                        'obj_select_prueba_diagnostica_tb',
                        'obj_select_rango_edad',
                        'obj_select_rango_edad_etario',
                        'obj_select_resultado_carga_viral',
                        'obj_select_tipo_diagnostico',
                        'obj_select_resultado_incidencia',
                        'obj_select_seguimiento_tar',
                        'obj_select_sexo',
                        'obj_select_tipo_prueba_incidencia',
                        'obj_select_tratamiento',
                        'obj_select_tratamiento_tb',
                        'obj_select_unidad_atencion',
                        'obj_select_anio_semana'
                        ));
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
        $obj_tabla = new datos();
        //$date = Carbon::now();

        $this->setTemplate($request->id_template);
        foreach($this->obj_config->def_columns['name_col'] as $obj_idx=>$obj_item)
        {
            if ($this->obj_config->def_columns['include_col'][$obj_idx])
            { $obj_tabla[$obj_item] = $request[$obj_item]; }
        }
        
        if(in_array('col_numdeno', $this->obj_config->def_columns['name_col']))
        {
            if ($request['col_numdeno'] == 'numerador')
            { $obj_tabla['valor_numerador'] = $request['col_numdeno_val']; }
            elseif ($request['col_numdeno'] == 'denominador')
            { $obj_tabla['valor_denominador'] = $request['col_numdeno_val']; }
        }
        
        if (in_array('id_semana', $this->obj_config->def_columns['name_col']))
        {
            $obj_asignar_Periodo = anio_semana::find($request['id_semana']);
            
            if (in_array('id_anio', $this->obj_config->def_columns['name_col']))
            { $obj_tabla["id_anio"] = $obj_asignar_Periodo->id_anio; }
            
            if (in_array('id_periodo', $this->obj_config->def_columns['name_col']))
            { $obj_tabla["id_periodo"] = $obj_asignar_Periodo->id_periodo; }
        }
        
        $obj_tabla['usu_creacion'] = Auth::user()->id_usuario_app;
        $obj_tabla['usu_modificado'] = Auth::user()->id_usuario_app;
        
        switch ($request->id_template) 
        {
            case "1":
                $obj_tabla['id_indicador'] = $request->col_sitesting;
                break;
            
            case "2":
                $obj_tabla['id_indicador'] = 4;
                break;
            
            case "3":
                if ($obj_tabla['id_prueba'] == "1") // RTRI
                {
                    if ($obj_tabla['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla['id_indicador'] = 14; }
                    else
                    { $obj_tabla['id_indicador'] = 15; }
                }
                
                if ($obj_tabla['id_prueba'] == "2") // RITA
                {
                    if ($obj_tabla['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla['id_indicador'] = 16;                    }
                    else
                    {$obj_tabla['id_indicador'] = 17; }
                }
                break;

            case "4":
                if ($obj_tabla['id_prueba'] == "1") // RTRI
                {
                    if ($obj_tabla['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla['id_indicador'] = 10; }
                    else
                    { $obj_tabla['id_indicador'] = 11; }
                }
                
                if ($obj_tabla['id_prueba'] == "2") // RITA
                {
                    if ($obj_tabla['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla['id_indicador'] = 12;                    }
                    else
                    {$obj_tabla['id_indicador'] = 13; }
                }
                break;
                
            case "5":
                if ($obj_tabla['id_tipo_diagnostico'] == '1' or $obj_tabla['id_tipo_diagnostico'] == '3')
                { $obj_tabla['id_indicador'] = 5; }
                else
                { $obj_tabla['id_indicador'] = 6; }
                break;

            case "6":
                $obj_tabla['id_indicador'] = 7;
                break;
            
            case "7":
                $obj_tabla['id_indicador'] = 8;
                break;
            
            case "8":
                $obj_tabla['id_indicador'] = 19;
                break;
            
            case "9":
                $obj_tabla['id_indicador'] = 20;
                break;
            
            case "10":
                $obj_tabla['id_indicador'] = 21;
                $obj_tabla['id_embarazo_lactancia'] = 1;
                break;
            
            case "11":
                $obj_tabla['id_indicador'] = 23;
                break;
            
            case "12":
                $obj_tabla['id_indicador'] = 24;
                break;
            
            case "13":
                $obj_tabla['id_indicador'] = 25;
                break;
            
            case "14":
                $obj_tabla['id_indicador'] = 27;
                break;
            
            case "15":
                $obj_tabla['id_indicador'] = 28;
                break;
            
            case "16":
                $obj_tabla['id_indicador'] = 29;
                break;
            
            case "17":
                $obj_tabla['id_indicador'] = 30;
                break;
            
            case "18":
                $obj_tabla['id_indicador'] = 32;
                break;
            
            case "19":
                $obj_tabla['id_indicador'] = 33;
                break;
            
            case "20":
                $obj_tabla['id_indicador'] = 34;
                break;
            
            case "21":
                $obj_tabla['id_indicador'] = 36;
                break;
            
            case "22":
                $obj_tabla['id_indicador'] = 35;
                break;
            
            case "23":
                $obj_tabla['id_indicador'] = 38;
                break;
            
            case "24":
                $obj_tabla['id_indicador'] = 40;
                break;
            
            case "25":
                $obj_tabla['id_indicador'] = 41;
                break;
            
            case "26":
                $obj_tabla['id_indicador'] = 42;
                break;
            
            case "27":
                $obj_tabla['id_indicador'] = 43;
                break;
            
            case "28":
                $obj_tabla['id_indicador'] = 44;
                break;
            
            case "29":
                $obj_tabla['id_indicador'] = 45;
                break;
            
            case "30":
                $obj_tabla['id_indicador'] = 37;
                break;
            
            case "31":
                $obj_tabla['id_indicador'] = 47;
                break;
            
            case "32":
                $obj_tabla['id_indicador'] = 48;
                break;
            
            case "33":
                $obj_tabla['id_indicador'] = 49;
                break;
            
            default:
                $obj_tabla['id_indicador'] = 1;
                break;
        }
        
        $obj_tabla->save();
	$obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Ingreso de datos');	
        flash()->success('Ingreso realizado con éxito');	
        Input::flash();	
        return redirect()->back()->withInput();
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
        $obj_tabla = new datos();
        $obj_tabla = datos::find($id);
        
        $id_template = $this->get_template($obj_tabla->id_indicador);
        $this->setTemplate($id_template);
        $obj_param = $this->obj_config;
        $obj_filtro = $id_template;
        
        $obj_select_region_sica = region_sica::all();
        $obj_select_departamento = departamento::all();
        $obj_select_municipio = municipio::all();

	$obj_select_anio = anio::all();
	$obj_select_cascada_cv = cascada_cv::all();
	$obj_select_cascada = cascada::all();
	$obj_select_dispensacion_tar = dispensacion_tar::all();
	$obj_select_embarazo_lactancia = embarazo_lactancia::all();
	$obj_select_hospital = hospital::all();
	$obj_select_indicador = indicador::all();
	$obj_select_inicio_tratamiento = inicio_tratamiento::all();
	$obj_select_laboratorios = laboratorios::all();
	$obj_select_meses = meses::all();
        
        if ($obj_filtro <= 22)
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 0')->get(); }
        else
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 1')->get(); }
        
	$obj_select_periodo_prueba = periodo_prueba::all();
	$obj_select_poblacion_clave = poblacion_clave::all();
	$obj_select_prueba = prueba::all();
        
        if ($obj_filtro == 26)
        { $obj_select_prueba_diagnostica_tb = prueba_diagnostica_tb::where('diferenciador','=','0')->get(); }
        elseif ($obj_filtro == 29)
        { $obj_select_prueba_diagnostica_tb = prueba_diagnostica_tb::where('diferenciador','=','1')->get(); }
        else
        { $obj_select_prueba_diagnostica_tb = prueba_diagnostica_tb::all(); }
        
        $obj_select_rango_edad = rango_edad::all();
	$obj_select_rango_edad_etario = rango_edad_etario::all();
	$obj_select_resultado_carga_viral = resultado_carga_viral::all();
	
        $obj_filtro_TipoDiagnostico = array(6,7,25,28,29,31,32);
        if (in_array($obj_filtro, $obj_filtro_TipoDiagnostico))
        { $obj_select_tipo_diagnostico = tipo_diagnostico::where('diferenciador','=','1')->get(); }
        else
        { $obj_select_tipo_diagnostico = tipo_diagnostico::all(); }
        
	$obj_select_resultado_incidencia = resultado_incidencia::all();
	$obj_select_seguimiento_tar = seguimiento_tar::all();
	$obj_select_sexo = sexo::all();
	$obj_select_tipo_prueba_incidencia = tipo_prueba_incidencia::all();
	$obj_select_tratamiento = tratamiento::all();
	$obj_select_tratamiento_tb = tratamiento_tb::all();
	$obj_select_unidad_atencion = unidad_atencion::where('id_hospital','=', Auth::user()->id_hospital)->get();
        $obj_select_anio_semana = anio_semana::where('vigente','=','1')->get();

        return view('roptrimestre/edit_datos', 
                compact('obj_tabla', 'obj_param','obj_filtro',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_anio',
                        'obj_select_cascada_cv',
                        'obj_select_cascada',
                        'obj_select_dispensacion_tar',
                        'obj_select_embarazo_lactancia',
                        'obj_select_hospital',
                        'obj_select_indicador',
                        'obj_select_inicio_tratamiento',
                        'obj_select_laboratorios',
                        'obj_select_meses',
                        'obj_select_periodo',
                        'obj_select_periodo_prueba',
                        'obj_select_poblacion_clave',
                        'obj_select_prueba',
                        'obj_select_prueba_diagnostica_tb',
                        'obj_select_rango_edad',
                        'obj_select_rango_edad_etario',
                        'obj_select_resultado_carga_viral',
                        'obj_select_tipo_diagnostico',
                        'obj_select_resultado_incidencia',
                        'obj_select_seguimiento_tar',
                        'obj_select_sexo',
                        'obj_select_tipo_prueba_incidencia',
                        'obj_select_tratamiento',
                        'obj_select_tratamiento_tb',
                        'obj_select_unidad_atencion',
                        'obj_select_anio_semana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $obj_tabla_x = new datos();
        $obj_tabla_x = datos::find($request->id_datos);
        
        $this->setTemplate($request->id_template);
        foreach($this->obj_config->def_columns['name_col'] as $obj_idx=>$obj_item)
        {
            if ($this->obj_config->def_columns['include_col'][$obj_idx])
            { $obj_tabla_x[$obj_item] = $request[$obj_item]; }
        }
        
        $obj_tabla_x['usu_modificado'] = Auth::user()->id_usuario_app;
        
        if(in_array('col_numdeno', $this->obj_config->def_columns['name_col']))
        {
            if ($request['col_numdeno'] == 'numerador')
            {
                $obj_tabla_x['valor_numerador'] = $request['col_numdeno_val'];
                $obj_tabla_x['valor_denominador'] = null;
            }
            elseif ($request['col_numdeno'] == 'denominador')
            {
                $obj_tabla_x['valor_numerador'] = null;
                $obj_tabla_x['valor_denominador'] = $request['col_numdeno_val'];
            }
        }
        
        if (in_array('id_semana', $this->obj_config->def_columns['name_col']))
        {
            $obj_asignar_Periodo = anio_semana::find($request['id_semana']);
            
            if (in_array('id_anio', $this->obj_config->def_columns['name_col']))
            { $obj_tabla_x["id_anio"] = $obj_asignar_Periodo->id_anio; }
            
            if (in_array('id_periodo', $this->obj_config->def_columns['name_col']))
            { $obj_tabla_x["id_periodo"] = $obj_asignar_Periodo->id_periodo; }
        }
        
        $obj_filtro = $request->id_template;
        
        switch ($request->id_template) 
        {
            case "1":
                $obj_tabla_x['id_indicador'] = $request->col_sitesting;
                break;
            
            case "2":
                $obj_tabla_x['id_indicador'] = 4;
                break;
            
            case "3":
                if ($obj_tabla_x['id_prueba'] == "1") // RTRI
                {
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla_x['id_indicador'] = 14; }
                    else
                    { $obj_tabla_x['id_indicador'] = 15; }
                }
                
                if ($obj_tabla_x['id_prueba'] == "2") // RITA
                {
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla_x['id_indicador'] = 16;                    }
                    else
                    {$obj_tabla_x['id_indicador'] = 17; }
                }
                break;

            case "4":
                if ($obj_tabla_x['id_prueba'] == "1") // RTRI
                {
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla_x['id_indicador'] = 10; }
                    else
                    { $obj_tabla_x['id_indicador'] = 11; }
                }
                
                if ($obj_tabla_x['id_prueba'] == "2") // RITA
                {
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1") // Infeccion Reciente
                    { $obj_tabla_x['id_indicador'] = 12;                    }
                    else
                    {$obj_tabla_x['id_indicador'] = 13; }
                }
                break;
                
            case "5":
                if ($obj_tabla_x['id_tipo_diagnostico'] == '1' or $obj_tabla_x['id_tipo_diagnostico'] == '3')
                { $obj_tabla_x['id_indicador'] = 5; }
                else
                { $obj_tabla_x['id_indicador'] = 6; }
                break;

            case "6":
                $obj_tabla_x['id_indicador'] = 7;
                break;
            
            case "7":
                $obj_tabla_x['id_indicador'] = 8;
                break;
            
            case "8":
                $obj_tabla_x['id_indicador'] = 19;
                break;
            
            case "9":
                $obj_tabla_x['id_indicador'] = 20;
                break;
            
            case "10":
                $obj_tabla_x['id_indicador'] = 21;
                $obj_tabla_x['id_embarazo_lactancia'] = 1;
                break;
            
            case "11":
                $obj_tabla_x['id_indicador'] = 23;
                break;
            
            case "12":
                $obj_tabla_x['id_indicador'] = 24;
                break;
            
            case "13":
                $obj_tabla_x['id_indicador'] = 25;
                break;
            
            case "14":
                $obj_tabla_x['id_indicador'] = 27;
                break;
            
            case "15":
                $obj_tabla_x['id_indicador'] = 28;
                break;
            
            case "16":
                $obj_tabla_x['id_indicador'] = 29;
                break;
            
            case "17":
                $obj_tabla_x['id_indicador'] = 30;
                break;
            
            case "18":
                $obj_tabla_x['id_indicador'] = 32;
                break;
            
            case "19":
                $obj_tabla_x['id_indicador'] = 33;
                break;
            
            case "20":
                $obj_tabla_x['id_indicador'] = 34;
                break;
            
            case "21":
                $obj_tabla_x['id_indicador'] = 36;
                break;
            
            case "22":
                $obj_tabla_x['id_indicador'] = 35;
                break;
            
            case "23":
                $obj_tabla_x['id_indicador'] = 38;
                break;
            
            case "24":
                $obj_tabla_x['id_indicador'] = 40;
                break;
            
            case "25":
                $obj_tabla_x['id_indicador'] = 41;
                break;
            
            case "26":
                $obj_tabla_x['id_indicador'] = 42;
                break;
            
            case "27":
                $obj_tabla_x['id_indicador'] = 43;
                break;
            
            case "28":
                $obj_tabla_x['id_indicador'] = 44;
                break;

            case "29":
                $obj_tabla_x['id_indicador'] = 45;
                break;
            
            case "30":
                $obj_tabla_x['id_indicador'] = 37;
                break;
            
            case "31":
                $obj_tabla_x['id_indicador'] = 47;
                break;
            
            case "32":
                $obj_tabla_x['id_indicador'] = 48;
                break;
            
            case "33":
                $obj_tabla_x['id_indicador'] = 49;
                break;
            
            default:
                $obj_tabla_x['id_indicador'] = 1;
                break;
        }
        
        flash()->success('Modificación realizada exitosamente');
        
	$obj_tabla_x->save();
        $obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Datos modificados');

        $obj_tabla=datos::
                where('id_hospital','=', Auth::user()->id_hospital )->
                whereIn('id_indicador', $this->get_indicador($obj_filtro))->
                orderBy('id_datos','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;

        return redirect()->action('datos_Controller@indexAll',['id'=>$obj_filtro]);
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
        $obj_tabla = new datos();
        $obj_tabla = datos::destroy($id);

        flash()->success('Registro Eliminado exitosamente');
        $obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Registro Eliminado');
        return "ok";
    }
    
    function setTemplate($a_template)
    {
        /*
         * funcion que define la configuracion asociada en base a la Template
         */
        switch ($a_template) 
        {
            case "1":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST index testing';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true","true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", "Hospital", "UAI" ,"Año","Periodo","Rango Etareo","Sexo","Cantidad", "Serv. Index Testing");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo','id_rango_edad_etario','id_sexo','valor_numerador','col_sitesting'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, false],
                        );
                break;
            
            case "2":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST Rechazados';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','false',"true","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", 'UAI', "Hospital", "Año","Periodo","Rango","Sexo","Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_unidad_atencion','id_hospital','id_anio','id_periodo','id_rango_edad','id_sexo','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                        );
                break;
            
            case "3":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_Recent Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", "Hospital", "UAI", "Año","Periodo","Poblacion Clave","Prueba","Resultado Incidencia","Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion','id_anio','id_periodo','id_poblacion_clave','id_prueba','id_resultado_incidencia','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "4":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_Recent Index Testing';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false", "true", "true","true","true","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", "Hospital", "UAI", "Año","Periodo","Semana","sexo","Rango etareo","Prueba","Resultado Incidencia","Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo','id_semana','id_sexo','id_rango_edad_etario','id_prueba','id_resultado_incidencia','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true, true, true],
                        );
                break;

            case "5":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST Tamizados';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", "Hospital", "UAI" , "Año","Periodo","Semana","sexo","Rango etareo","Resultado","Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo','id_semana','id_sexo','id_rango_edad_etario','id_tipo_diagnostico','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "6":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_Community';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", "Hospital", "UAI","Año","Periodo","sexo","Rango etareo","Resultado Incidencia","Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo','id_sexo','id_rango_edad_etario','id_tipo_diagnostico','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "7":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true","true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Resultado", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_tipo_diagnostico', 'id_poblacion_clave', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                        );
                break;
            
            case "8":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_NEW TX_NEW';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI","Año","Periodo", "Semana", "Grupo Etario", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo','id_semana','id_rango_edad_etario','id_sexo', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "9":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_NEW Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI","Año","Periodo", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo','id_poblacion_clave', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                        );
                break;
            
            case "10":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_NEW Lactancia Materna';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true],
                        );
                break;
            
            case "11":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR TX_CURR';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true", "true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Rango Grupo Etareo", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad_etario', 'id_sexo', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                        );
                break;
            
            case "12":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_poblacion_clave', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                        );
                break;
            
            case "13":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR Dispensacion';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Grupo de Edad", "Sexo", "Dispensacion", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad', 'id_sexo', 'id_dispensacion_tar', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "14":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS TX_PVLS';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Semana", "Rango Grupo Etario", "Sexo", "Periodo Prueba", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_semana', 'id_rango_edad_etario', 'id_sexo', 'id_periodo_prueba', "col_numdeno"],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true, false],
                        );
                break;
            
            case "15":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS Embarazo / Lactancia';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Periodo de Prueba", "Embarazo / Lactancia", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_periodo_prueba', 'id_embarazo_lactancia', "col_numdeno"],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, false],
                        );
                break;
            
            case "16":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Periodo Prueba", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_periodo_prueba', 'id_poblacion_clave', 'col_numdeno'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, false],
                        );
                break;
            
            case "17":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_ML';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Rango Grupo Etareo", "Sexo", "Seguimiento Tratamiento", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad_etario', 'id_sexo', 'id_seguimiento_tar', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "18":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_RTT TX_RTT';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Rango Grupo Etario", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad_etario', 'id_sexo', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                        );
                break;
            
            case "19":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_RTT Poblacion Clave';
                $this->obj_config->nombre = 'datos';
	        $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_poblacion_clave', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                        );
                break;
            
            case "20":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_Rapid';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Grupo de Edad", "Sexo", "Inicio Tratamiento", "Cantidad", );

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad', 'id_sexo', 'id_inicio_tratamiento', 'col_numdeno'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, false],
                        );
                break;
            
            case "21":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_LINK';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Grupo de Edad", "Sexo", "Cantidad", );

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad', 'id_sexo', 'col_numdeno'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, false],
                        );
                break;
            
            case "22":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_Reengage';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Grupo de Edad", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_rango_edad', 'id_sexo', 'col_numdeno'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, false],
                        );
                break;
            
            case "30":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'Seguimiento Cascada';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"false","true","true","true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Cascada", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_cascada', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                        );
                break;

            case "23":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PREV';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Tratamiento", "Sexo", "Rango Edad", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_tratamiento', 'id_sexo', 'id_rango_edad', 'col_numdeno'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, false],
                        );
                break;
            
            case "24":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_TB Numerador';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID","Pais","Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Tratamiento", "Sexo", "Rango Edad", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_unidad_atencion','id_anio','id_periodo', 'id_tratamiento', 'id_sexo', 'id_rango_edad', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "25":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_TB Denominador';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Tratamiento", "Sexo", "Rango Edad", "Resultado", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_tratamiento', 'id_sexo', 'id_rango_edad', 'id_tipo_diagnostico', 'valor_denominador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "26":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'Prueba Diagnostica';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Pueba Diagnostica", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_prueba_diagnostica_tb', 'valor_denominador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                        );
                break;
            
            case "27":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'Envio de Muestra';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'valor_denominador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true],
                        );
                break;
            
            case "28":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TB_Screen';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Sexo", "Rango de Edad", "Tratamiento TB", "Resultado", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad', 'id_tratamiento_tb', 'id_tipo_diagnostico', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "29":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'TB_DX';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Sexo", "Rango de Edad", "Resultado", "Prueba Diagnostica", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad', 'id_tipo_diagnostico', 'id_prueba_diagnostica_tb', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "31":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'Histo_DX';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Sexo", "Rango de Edad", "Resultado", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad', 'id_tipo_diagnostico', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "32":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'Crypto_DX';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Sexo", "Rango de Edad", "Resultado", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad', 'id_tipo_diagnostico', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            case "33":
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'VL_Cascade';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', "false", "true", "true", "true", "true", "true", "true");
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "UAI", "Año", "Periodo", "Sexo", "Rango de Edad", "Cascada CV", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'municipio', 'id_hospital', 'id_unidad_atencion', 'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad', 'id_cascada_cv', 'valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                        );
                break;
            
            default:
                $this->obj_config->nombre_plantilla = 'datos'; //.blade.php
                $this->obj_config->nombre_opcion = 'Casos Indice';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true','false','false','false','true',"true","true","true","true","true",);
                $this->obj_config->titles = array("ID","Pais","Departamento","Municipio", "Hospital", "Año","Periodo","Rango Etario","Sexo","Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio','id_hospital','id_anio','id_periodo','id_rango_edad_etario','id_sexo','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, false, true, true],
                        );
                break;
        }
    }
    
    
     /* 
     * Funcion que obtiene un array, de los id_indicador
     * asociados a una Template
     */
    function get_indicador(int $a_template)
    {
        switch ($a_template) 
        {
            case "1":
                return array(2,3);
                break;
            
            case "2":
                return array(4);
                break;
            
            case "3":
                return array(14,15,16,17);
                break;
            
            case "4":
                return array(10,11,12,13);
                break;
            
            case "5":
                return array(5,6);
                break;
            
            case "6":
                return array(7);
                break;
            
            case "7":
                return array(8);
                break;
            
            case "8":
                return array(19);
                break;
            
            case "9":
                return array(20);
                break;
            
            case "10":
                return array(21);
                break;
            
            case "11":
                return array(23);
                break;
            
            case "12":
                return array(24);
                break;
            
            case "13":
                return array(25);
                break;
            
            case "14":
                return array(27);
                break;
            
            case "15":
                return array(28);
                break;
            
            case "16":
                return array(29);
                break;
            
            case "17":
                return array(30);
                break;
            
            case "18":
                return array(32);
                break;
            
            case "19":
                return array(33);
                break;
            
            case "20":
                return array(34);
                break;
            
            case "21":
                return array(36);
                break;
            
            case "22":
                return array(35);
                break;
            
            case "23":
                return array(38);
                break;
            
            case "24":
                return array(40);
                break;
            
            case "25":
                return array(41);
                break;
            
            case "26":
                return array(42);
                break;
            
            case "27":
                return array(43);
                break;
            
            case "28":
                return array(44);
                break;
            
            case "29":
                return array(45);
                break;
            
            case "30":
                return array(37);
                break;
            
            case "31":
                return array(47);
                break;
            
            case "32":
                return array(48);
                break;
            
            case "33":
                return array(49);
                break;
            
            default:
                return array(1);
                break;
        }
    }
    
    /*
     * Funcion que obtiene la Template, asociada, en base al registro
     * La logica esta basada al campo id_indicador de cada registro
     */
    function get_template(int $a_indicador)
    {

        switch ($a_indicador) 
        {
            case "2":
            case "3":
                return 1;
                break;
            
            case "4":
                return 2;
                break;
            
            case "14":
            case "15":
            case "16":
            case "17":
                return 3;
                break;

            case "10":
            case "11":
            case "12":
            case "13":
                return 4;
                break;
            
            case "5":
            case "6":
                return 5;
                break;

            case "7":
                return 6;
                break;
            
            case "8":
                return 7;
                break;
            
            case "19":
                return 8;
                break;
            
            case "20":
                return 9;
                break;
            
            case "21":
                return 10;
                break;
            
            case "23":
                return 11;
                break;
            
            case "24":
                return 12;
                break;
            
            case "25":
                return 13;
                break;
            
            case "27":
                return 14;
                break;
            
            case "28":
                return 15;
                break;
            
            case "29":
                return 16;
                break;
            
            case "30":
                return 17;
                break;
            
            case "32":
                return 18;
                break;
            
            case "33":
                return 19;
                break;
            
            case "34":
                return 20;
                break;
            
            case "36":
                return 21;
                break;
            
            case "35":
                return 22;
                break;
            
            case "38":
                return 23;
                break;
            
            case "40":
                return 24;
                break;
            
            case "41":
                return 25;
                break;
            
            case "42":
                return 26;
                break;
            
            case "43":
                return 27;
                break;
            
            case "44":
                return 28;
                break;
            
            case "45":
                return 29;
                break;
            
            case "37":
                return 30;
                break;
            
            case "47":
                return 31;
                break;
            
            case "48":
                return 32;
                break;
            
            case "49":
                return 33;
                break;
            
            default:
                return 1;
                break;
        }
    }

}
