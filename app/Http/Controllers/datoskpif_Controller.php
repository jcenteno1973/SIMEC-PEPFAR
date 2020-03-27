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
use Illuminate\Support\Facades\Auth;

use App\Models\region_sica;
use App\Models\departamento;
use App\Models\municipio;
use App\Models\anio;
use App\Models\periodo;
use App\Models\rango_edad;
use App\Models\rango_edad_etario;
use App\Models\sexo;
use App\Models\tipo_diagnostico;
use App\Models\poblacion_clave;
use App\Models\prueba;
use App\Models\resultado_incidencia;
use App\Models\inicio_tratamiento;
use App\Models\dispensacion_tar;
use App\Models\periodo_prueba;
use App\Models\embarazo_lactancia;
use App\Models\cascada;
use App\Models\cascada_cv;

class datoskpif_Controller extends Controller
{
    private $obj_config;

    public function __construct() 
    {
        $this->middleware('auth');
        $this->obj_config = new configuracion();
        $this->setTemplate(1);
    }

    public function indexAll($id)
    {
        //
        $this->setTemplate($id);
        $obj_tabla = null;
        
        $obj_arrayMunicipio = array("41","42","43","44","45","59","60","61","62","63","64","65","66","68");
        
        if (in_array($id, $obj_arrayMunicipio))
        {
            $obj_tabla=datos::
                where('id_municipio','=', Auth::user()->id_municipio )->
                whereIn('id_indicador', $this->get_indicador($id))->
                orderBy('id_datos','ASC')->paginate($this->obj_config->paginate);
        }
        else
        {
            $obj_tabla=datos::
                where('id_hospital','=', Auth::user()->id_hospital )->
                whereIn('id_indicador', $this->get_indicador($id))->
                orderBy('id_datos','ASC')->paginate($this->obj_config->paginate);  
        }
        
        $obj_param = $this->obj_config;
        $obj_filtro = $id;

        return view('ropkpif/index_datoskpif',compact('obj_tabla', 'obj_param', 'obj_filtro'));
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
        $obj_arrayMunicipio = array("41","42","43","44","45","59","60","61","62","63","64","65","66","68");
        
        $whereData[$l_index] = implode(" ", array("id_indicador", "in", "(", implode(",", $this->get_indicador($request->id_template)),")"));
        $l_index++;
        
        if ($request->id_periodo != null)
        {
            $whereData[$l_index] = implode(" ", array('id_anio','=', '\''.$request->id_anio.'\''));
            $l_index++;
        }
        
        if ($request->id_meses != null)
        {
            $whereData[$l_index] = implode(" ", array('id_periodo','=', '\''.$request->id_periodo.'\''));
            $l_index++;
        }
        
        $rawQuery = implode(" AND ", $whereData);
        
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        if (in_array($request->id_template, $obj_arrayMunicipio))
        {
            $obj_tabla=datos::
                where('id_municipio','=', Auth::user()->id_municipio )->
                whereRaw($rawQuery)->
                orderBy('id_datos','ASC')->
                paginate($this->obj_config->paginate);
        }
        else
        {
            $obj_tabla=datos::
                where('id_hospital','=', Auth::user()->id_hospital )->
                whereRaw($rawQuery)->
                orderBy('id_datos','ASC')->
                paginate($this->obj_config->paginate);
        }
        $this->setTemplate($request->id_template);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $request->id_template;

        return view('ropkpif/index_datoskpif',compact('obj_tabla','obj_param','obj_filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->setTemplate($id);
        $obj_param = $this->obj_config;
        $obj_filtro = $id;
        
        $obj_select_region_sica = region_sica::all();
        $obj_select_departamento = departamento::all();
        $obj_select_municipio = municipio::all();
	$obj_select_anio = anio::all();
        
        if ($obj_filtro == 67 or $obj_filtro == 68)
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 1')->get(); }
        else
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 0')->get(); }
        
        $obj_select_rango_edad = rango_edad::all();
        $obj_select_rango_edad_etario = rango_edad_etario::all();
        $obj_select_sexo = sexo::all();
        $obj_select_poblacion_clave = poblacion_clave::all();
        $obj_select_prueba = prueba::all();
        $obj_select_resultado_incidencia = resultado_incidencia::all();

        if ($obj_filtro == 44 or $obj_filtro == 45)
        { $obj_select_tipo_diagnostico = tipo_diagnostico::where('diferenciador','=','1')->get(); }
        else
        { $obj_select_tipo_diagnostico = tipo_diagnostico::all(); }
        
        $obj_select_inicio_tratamiento = inicio_tratamiento::all();
        $obj_select_dispensacion_tar = dispensacion_tar::all();
        $obj_select_periodo_prueba = periodo_prueba::all();
        $obj_select_embarazo_lactancia = embarazo_lactancia::all();
        $obj_select_cascada = cascada::all();
        $obj_select_cascada_cv = cascada_cv::all();

        return view('ropkpif/create_datoskpif', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_anio',
                        'obj_select_periodo',
                        'obj_select_rango_edad',
                        'obj_select_rango_edad_etario',
                        'obj_select_sexo',
                        'obj_select_tipo_diagnostico',
                        'obj_select_poblacion_clave',
                        'obj_select_prueba',
                        'obj_select_resultado_incidencia',
                        'obj_select_inicio_tratamiento',
                        'obj_select_dispensacion_tar',
                        'obj_select_periodo_prueba',
                        'obj_select_embarazo_lactancia',
                        'obj_select_cascada',
                        'obj_select_cascada_cv'
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
        
        if(in_array('comp_numdeno', $this->obj_config->def_columns['name_col']))
        {
            if ($request['comp_numdeno'] == 'numerador')
            { $obj_tabla['valor_numerador'] = $request['comp_numdeno_val']; }
            elseif ($request['comp_numdeno'] == 'denominador')
            { $obj_tabla['valor_denominador'] = $request['comp_numdeno_val']; }
        }
        
        $obj_tabla['usu_creacion'] = Auth::user()->id_usuario_app;
        $obj_tabla['usu_modificado'] = Auth::user()->id_usuario_app;
        
        // Tratamiento especial
        switch ($request->id_template)
        {
            case "41":
                $obj_tabla['id_indicador'] = $request['comp_serv_indx_testing']; // 58, 59
                break;
            
            case "42":
                $obj_tabla['id_indicador'] = 60;
                break;
            
            case "43":
                if ($obj_tabla['id_tipo_diagnostico'] == "1" or $obj_tabla['id_tipo_diagnostico'] == "3")
                { $obj_tabla['id_indicador'] = 61; }
                
                if ($obj_tabla['id_tipo_diagnostico'] == "2")
                { $obj_tabla['id_indicador'] = 64; }
                break;
            
            case "44":
                $obj_tabla['id_indicador'] = 62;
                break;
            
            case "45":
                $obj_tabla['id_indicador'] = 63;
                break;
            
            case "46":
                $obj_tabla['id_indicador'] = 74;
                break;
            
            case "47":
                if ($obj_tabla['id_prueba'] == "1")
                { 
                    if ($obj_tabla['id_resultado_incidencia'] == "1")
                    { $obj_tabla['id_indicador'] = 76; }
                    elseif ($obj_tabla['id_resultado_incidencia'] == "2")
                    { $obj_tabla['id_indicador'] = 77; }
                }

                if ($obj_tabla['id_prueba'] == "2")
                { 
                    if ($obj_tabla['id_resultado_incidencia'] == "1")
                    { $obj_tabla['id_indicador'] = 78; }
                    elseif ($obj_tabla['id_resultado_incidencia'] == "2")
                    { $obj_tabla['id_indicador'] = 79; }
                }
                break;
                
            case "48":
                if ($obj_tabla['id_prueba'] == "1")
                { 
                    if ($obj_tabla['id_resultado_incidencia'] == "1")
                    { $obj_tabla['id_indicador'] = 80; }
                    elseif ($obj_tabla['id_resultado_incidencia'] == "2")
                    { $obj_tabla['id_indicador'] = 81; }
                }

                if ($obj_tabla['id_prueba'] == "2")
                { 
                    if ($obj_tabla['id_resultado_incidencia'] == "1")
                    { $obj_tabla['id_indicador'] = 82; }
                    elseif ($obj_tabla['id_resultado_incidencia'] == "2")
                    { $obj_tabla['id_indicador'] = 83; }
                }
                break;
                
            case "49":
                $obj_tabla['id_indicador'] = 85;
                break;
            
            case "50":
                $obj_tabla['id_indicador'] = 86;
                break;
            
            case "51":
                $obj_tabla['id_indicador'] = 87;
                break;
            
            case "52":
                $obj_tabla['id_indicador'] = 88;
                break;
            
            case "53":
                $obj_tabla['id_indicador'] = 90;
                break;
            
            case "54":
                $obj_tabla['id_indicador'] = 91;
                break;
            
            case "55":
                $obj_tabla['id_indicador'] = 92;
                break;
            
            case "56":
                $obj_tabla['id_indicador'] = 93;
                break;
            
            case "57":
                $obj_tabla['id_indicador'] = 95;
                break;
            
            case "58":
                $obj_tabla['id_indicador'] = 96;
                break;
            
            case "59":
                $obj_tabla['id_indicador'] = 65;
                break;
            
            case "60":
                $obj_tabla['id_indicador'] = 67;
                break;
            
            case "61":
                $obj_tabla['id_indicador'] = 68;
                break;
            
            case "62":
                $obj_tabla['id_indicador'] = 69;
                break;
            
            case "63":
                $obj_tabla['id_indicador'] = 71;
                break;
            
            case "64":
                $obj_tabla['id_indicador'] = 72;
                break;
            
            case "65":
                $obj_tabla['id_indicador'] = 73;
                break;
            
            case "66":
                $obj_tabla['id_indicador'] = 74;
                break;
            
            case "67":
                $obj_tabla['id_indicador'] = 97;
                break;
            
            case "68":
                $obj_tabla['id_indicador'] = 99;
                break;
            
            default:
                $obj_tabla['id_indicador'] = 58;
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
        
        if ($obj_filtro == 67 or $obj_filtro == 68)
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 1')->get(); }
        else
        { $obj_select_periodo = periodo::whereRaw('vigente = 1 and diferenciador = 0')->get(); }

        $obj_select_rango_edad = rango_edad::all();
        $obj_select_rango_edad_etario = rango_edad_etario::all();
        $obj_select_sexo = sexo::all();
        $obj_select_poblacion_clave = poblacion_clave::all();
        
        $obj_select_prueba = prueba::all();
        $obj_select_resultado_incidencia = resultado_incidencia::all();
        
        if ($obj_filtro == 44 or $obj_filtro == 45)
        { $obj_select_tipo_diagnostico = tipo_diagnostico::where('diferenciador','=','1')->get(); }
        else
        { $obj_select_tipo_diagnostico = tipo_diagnostico::all(); }
        
        $obj_select_inicio_tratamiento = inicio_tratamiento::all();
        $obj_select_dispensacion_tar = dispensacion_tar::all();
        $obj_select_periodo_prueba = periodo_prueba::all();
        $obj_select_embarazo_lactancia = embarazo_lactancia::all();
        $obj_select_cascada = cascada::all();
        $obj_select_cascada_cv = cascada_cv::all();

        return view('ropkpif/edit_datoskpif', 
                compact('obj_tabla', 'obj_param','obj_filtro',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_anio',
                        'obj_select_periodo',
                        'obj_select_rango_edad',
                        'obj_select_rango_edad_etario',
                        'obj_select_sexo',
                        'obj_select_tipo_diagnostico',
                        'obj_select_poblacion_clave',
                        'obj_select_prueba',
                        'obj_select_resultado_incidencia',
                        'obj_select_inicio_tratamiento',
                        'obj_select_dispensacion_tar',
                        'obj_select_periodo_prueba',
                        'obj_select_embarazo_lactancia',
                        'obj_select_cascada',
                        'obj_select_cascada_cv'
                        ));
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
        
        if(in_array('comp_numdeno', $this->obj_config->def_columns['name_col']))
        {
            if ($request['comp_numdeno'] == 'numerador')
            {
                $obj_tabla_x['valor_numerador'] = $request['comp_numdeno_val'];
                $obj_tabla_x['valor_denominador'] = null;
            }
            elseif ($request['comp_numdeno'] == 'denominador')
            {
                $obj_tabla_x['valor_numerador'] = null;
                $obj_tabla_x['valor_denominador'] = $request['comp_numdeno_val'];
            }
        }
        
        $obj_filtro = $request->id_template;
        
        switch ($request->id_template) 
        {
            case "41":
                $obj_tabla_x['id_indicador'] = 58;
                $obj_tabla_x['id_indicador'] = 59;
                break;
            
            case "42":
                $obj_tabla_x['id_indicador'] = 60;
                break;
            
            case "43":
                $obj_tabla_x['id_indicador'] = 61;
                break;
            
            case "44":
                $obj_tabla_x['id_indicador'] = 62;
                break;
            
            case "45":
                $obj_tabla_x['id_indicador'] = 63;
                break;
            
            case "46":
                $obj_tabla_x['id_indicador'] = 74;
                break;
            
            case "47":
                if ($obj_tabla_x['id_prueba'] == "1")
                { 
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1")
                    { $obj_tabla_x['id_indicador'] = 76; }
                    elseif ($obj_tabla_x['id_resultado_incidencia'] == "2")
                    { $obj_tabla_x['id_indicador'] = 77; }
                }

                if ($obj_tabla_x['id_prueba'] == "2")
                { 
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1")
                    { $obj_tabla_x['id_indicador'] = 78; }
                    elseif ($obj_tabla_x['id_resultado_incidencia'] == "2")
                    { $obj_tabla_x['id_indicador'] = 79; }
                }
                break;
                
            case "48":
                if ($obj_tabla_x['id_prueba'] == "1")
                { 
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1")
                    { $obj_tabla_x['id_indicador'] = 80; }
                    elseif ($obj_tabla_x['id_resultado_incidencia'] == "2")
                    { $obj_tabla_x['id_indicador'] = 81; }
                }

                if ($obj_tabla_x['id_prueba'] == "2")
                { 
                    if ($obj_tabla_x['id_resultado_incidencia'] == "1")
                    { $obj_tabla_x['id_indicador'] = 82; }
                    elseif ($obj_tabla_x['id_resultado_incidencia'] == "2")
                    { $obj_tabla_x['id_indicador'] = 83; }
                }
                break;
                
            case "49":
                $obj_tabla_x['id_indicador'] = 85;
                break;
            
            case "50":
                $obj_tabla_x['id_indicador'] = 86;
                break;
            
            case "51":
                $obj_tabla_x['id_indicador'] = 87;
                break;
            
            case "52":
                $obj_tabla_x['id_indicador'] = 88;
                break;
            
            case "53":
                $obj_tabla_x['id_indicador'] = 90;
                break;
            
            case "54":
                $obj_tabla_x['id_indicador'] = 91;
                break;
            
            case "55":
                $obj_tabla_x['id_indicador'] = 92;
                break;
            
            case "56":
                $obj_tabla_x['id_indicador'] = 93;
                break;
            
            case "57":
                $obj_tabla_x['id_indicador'] = 95;
                break;
            
            case "58":
                $obj_tabla_x['id_indicador'] = 96;
                break;
            
            case "59":
                $obj_tabla_x['id_indicador'] = 65;
                break;
            
            case "60":
                $obj_tabla_x['id_indicador'] = 67;
                break;
            
            case "61":
                $obj_tabla_x['id_indicador'] = 68;
                break;
            
            case "62":
                $obj_tabla_x['id_indicador'] = 69;
                break;
            
            case "63":
                $obj_tabla_x['id_indicador'] = 71;
                break;
            
            case "64":
                $obj_tabla_x['id_indicador'] = 72;
                break;
            
            case "65":
                $obj_tabla_x['id_indicador'] = 73;
                break;
            
            case "66":
                $obj_tabla_x['id_indicador'] = 74;
                break;
            
            case "67":
                $obj_tabla_x['id_indicador'] = 97;
                break;
            
            case "68":
                $obj_tabla_x['id_indicador'] = 99;
                break;
            
            default:
                $obj_tabla_x['id_indicador'] = 58;
                break;
        }
        
        flash()->success('Modificación realizada exitosamente');
        $obj_tabla_x->save();
        $obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Datos modificados');

        $obj_tabla=datos::
                where('id_indicador', $this->get_indicador($obj_filtro))->
                orderBy('id_datos','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;

        return redirect()->action('datoskpif_Controller@indexAll',['id'=>$obj_filtro]);
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
            case "41":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Rango Edad Etario", "Sexo" , "Servicios Index Testing", "Valor");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_rango_edad_etario', 'id_sexo', 'comp_serv_indx_testing', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, false, true],
                            'unique_col' => []
                        );
                break;
            
            case "42":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST Rechazados';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Rango Edad", "Sexo", "Valor");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_rango_edad', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "43":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST Tamizados';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Rango Edad Etareo", "Resultado", "Sexo", "Valor");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_rango_edad_etario', 'id_tipo_diagnostico', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "44":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST HTS_Community';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Rango Edad Etareo", "Tipo Diagnostico", "Sexo", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos', 'pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_rango_edad_etario', 'id_tipo_diagnostico', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "45":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_TST Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Poblacion Clave", "Tipo Diagnostico", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio',  'id_anio', 'id_periodo', 'id_poblacion_clave', 'id_tipo_diagnostico', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "46":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_Link';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Hospital", "Año", "Periodo", "Rango de Edad", "Sexo", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_hospital',  'id_anio', 'id_periodo', 'id_rango_edad', 'id_sexo', 'comp_numdeno' ],
                            'include_col' => [false, false, false, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "47":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_RECENT - Index_Testing';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Sexo", "Rango de Edad Etario", "Prueba", "Resultado Incidencia", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad_etario', 'id_prueba', 'id_resultado_incidencia', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "48":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_RECENT - Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Poblacion Clave", "Prueba", "Resultado Incidencia", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_poblacion_clave', 'id_prueba', 'id_resultado_incidencia', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "49":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_NEW TX_NEW';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Grupo Etario", "Sexo", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_rango_edad_etario', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "50":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_NEW Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Poblacion Clave", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_poblacion_clave', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;

            case "51":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_NEW Lactancia Materna';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "52":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_Rapid';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Inicio de Tratamiento", "Rango de Edad", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_inicio_tratamiento', 'id_rango_edad', 'id_sexo', 'comp_numdeno' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "53":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR TX_CURR';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Rango de Edad Etario", "Sexo", "valor_numerador");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_rango_edad_etario', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "54":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Poblacion Clave", "valor_numerador");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_poblacion_clave', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "55":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR Dispensacion';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Grupo de edad", "Sexo", "Dispensacion", "valor_numerador");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_rango_edad', 'id_sexo', 'id_dispensacion_tar', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "56":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS TX_PVLS';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Sexo", "Rango Etario", "Periodo Prueba", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_sexo', 'id_rango_edad_etario', 'id_periodo_prueba', 'comp_numdeno' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "57":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS Embarazo / Lactancia';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Periodo de Prueba", "Embarazo / Lactancia", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_periodo_prueba', 'id_embarazo_lactancia', 'comp_numdeno' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "58":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Periodo de Prueba", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital',  'id_anio', 'id_periodo', 'id_periodo_prueba', 'id_poblacion_clave', 'comp_numdeno' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "59":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_RAPID_Verify';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Inicio Tratamiento", "Rango de Edad", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio',  'id_anio', 'id_periodo', 'id_inicio_tratamiento', 'id_rango_edad', 'id_sexo', 'comp_numdeno' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "60":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR_Verify TX_CURR_Verify';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Grupo Etario", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio',  'id_anio', 'id_periodo', 'id_rango_edad_etario', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "61":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR_Verify Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio',  'id_anio', 'id_periodo', 'id_poblacion_clave', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "62":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_CURR_Verify Dispensacion';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Grupo de Edad", "Sexo", "Dispensacion", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio',  'id_anio', 'id_periodo', 'id_rango_edad', 'id_sexo', 'id_dispensacion_tar', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "63":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS_Verify TX_PVLS_Verify';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Periodo de Prueba", "Rango Edad Etario", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_periodo_prueba', 'id_rango_edad_etario', 'id_sexo', 'comp_numdeno' ],
                            'include_col' => [false, false, false, true, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "64":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS Embarazo / Lactancia';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Periodo de Prueba", "Embarazo / Lactancia", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_periodo_prueba', 'id_embarazo_lactancia', 'comp_numdeno' ],
                            'include_col' => [false, false, false, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "65":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'TX_PVLS_Verify Poblacion Clave';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Periodo de Prueba", "Poblacion Clave", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_periodo_prueba', 'id_poblacion_clave', 'comp_numdeno' ],
                            'include_col' => [false, false, false, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "66":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'HTS_LINK HTS_LINK';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Rango de Edad", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_rango_edad', 'id_sexo', 'comp_numdeno' ],
                            'include_col' => [false, false, false, true, true, true, true, true, false],
                            'unique_col' => []
                        );
                break;
            
            case "67":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'VL_CASCADE';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Año", "Periodo", "Cascada CV", "Rango de edad", "Sexo", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'municipio', 'id_hospital', 'id_anio', 'id_periodo', 'id_cascada_cv', 'id_rango_edad', 'id_sexo', 'valor_numerador' ],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            case "68":
                $this->obj_config->nombre_plantilla = 'datoskpif'; //.blade.php
                $this->obj_config->nombre_opcion = 'CASCADA NAP';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Año", "Periodo", "Cascada", "Cantidad");

                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos','pais', 'departamento', 'id_municipio', 'id_anio', 'id_periodo', 'id_cascada', 'valor_numerador' ],
                            'include_col' => [false, false, false, true, true, true, true, true],
                            'unique_col' => []
                        );
                break;
            
            default:

                break;
        }
    }
    
    function get_indicador(int $a_template)
    {
        switch ($a_template) 
        {
            case "41":
                return array(58,59);
                break;
            
            case "42":
                return array(60);
                break;
            
            case "43":
                return array(61);
                break;
            
            case "44":
                return array(62);
                break;
            
            case "45":
                return array(63);
                break;
            
            case "46":
                return array(74);
                break;
            
            case "47":
                return array(76,77,78,79);
                break;
            
            case "48":
                return array(80,81,82,83);
                break;
            
            case "49":
                return array(85);
                break;
            
            case "50":
                return array(86);
                break;
            
            case "51":
                return array(87);
                break;
            
            case "52":
                return array(88);
                break;
            
            case "53":
                return array(90);
                break;
            
            case "54":
                return array(91);
                break;
            
            case "55":
                return array(92);
                break;
            
            case "56":
                return array(93);
                break;
            
            case "57":
                return array(95);
                break;
            
            case "58":
                return array(96);
                break;
            
            case "59":
                return array(65);
                break;
            
            case "60":
                return array(67);
                break;
            
            case "61":
                return array(68);
                break;
            
            case "62":
                return array(69);
                break;
            
            case "63":
                return array(71);
                break;
            
            case "64":
                return array(72);
                break;
            
            case "65":
                return array(73);
                break;
            
            case "66":
                return array(74);
                break;
            
            case "67":
                return array(97);
                break;
            
            case "68":
                return array(99);
                break;
            
            default:
                return array(50);
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
            case "58":
                return 41;
                break;
            
            case "59":
                return 41;
                break;
            
            case "60":
                return 42;
                break;
            
            case "61":
                return 43;
                break;
            
            case "62":
                return 44;
                break;
            
            case "63":
                return 45;
                break;
            
            case "74":
                return 46;
                break;
            
            case "76":
            case "77":
            case "78":
            case "79":
                return 47;
                break;
            
            case "80":
            case "81":
            case "82":
            case "83":
                return 48;
                break;
            
            case "85":
                return 49;
                break;
            
            case "86":
                return 50;
                break;
            
            case "87":
                return 51;
                break;
            
            case "88":
                return 52;
                break;
            
            case "90":
                return 53;
                break;
            
            case "91":
                return 54;
                break;
            
            case "92":
                return 55;
                break;
            
            case "93":
                return 56;
                break;
            
            case "95":
                return 57;
                break;
            
            case "96":
                return 58;
                break;
            
            case "65":
                return 59;
                break;
            
            case "67":
                return 60;
                break;
            
            case "68":
                return 61;
                break;
            
            case "69":
                return 62;
                break;
            
            case "71":
                return 63;
                break;
            
            case "72":
                return 64;
                break;
            
            case "73":
                return 65;
                break;
            
            case "74":
                return 66;
                break;
            
            case "97":
                return 67;
                break;
            
            case "99":
                return 68;
                break;

            default:
                return 34;
                break;
        }
    }
    
}

