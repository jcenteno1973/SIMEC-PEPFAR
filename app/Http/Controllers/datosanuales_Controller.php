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
use App\Models\datos_anuales;
use App\Http\Controllers\bitacoraController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use App\Models\region_sica;
use App\Models\departamento;
use App\Models\municipio;
use App\Models\anio;
use App\Models\laboratorios;
use App\Models\meses;
use App\Models\prueba;
use App\Models\anio_semana;
use App\Models\periodo_anual;
use App\Models\tipo_prueba;
use App\Models\cant_servicios;
use App\Models\tipo_rrhh;
use App\Models\tipo_beneficio;

class datosanuales_Controller extends Controller
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
        $obj_tabla=datos_anuales::
                where('id_indicador', $this->get_indicador($id))->
                orderBy('id_datos_anuales','ASC')->paginate($this->obj_config->paginate);
        $this->setTemplate($id);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $id;

        return view('ropanual/index_datosanuales',compact('obj_tabla', 'obj_param', 'obj_filtro'));
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
        
        if ($request->id_periodo != null)
        {
            $whereData[$l_index] = implode(" ", array('id_periodo_anual','=', '\''.$request->id_periodo.'\''));
            $l_index++;
        }
        
        if ($request->id_meses != null)
        {
            $whereData[$l_index] = implode(" ", array('id_meses','=', '\''.$request->id_meses.'\''));
            $l_index++;
        }
        
        $rawQuery = implode(" AND ", $whereData);
        
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla=datos_anuales::
                whereRaw($rawQuery)->
                orderBy('id_datos_anuales','ASC')->
                paginate($this->obj_config->paginate);
        $this->setTemplate($request->id_template);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $request->id_template;

        return view('ropanual/index_datosanuales',compact('obj_tabla','obj_param','obj_filtro'));
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
	$obj_select_laboratorios = laboratorios::all();
	$obj_select_meses = meses::all();
	$obj_select_prueba = prueba::all();
        $obj_select_anio_semana = anio_semana::where('vigente','=','1')->get();
        $obj_select_periodo_anual = periodo_anual::where('vigente','=','1')->get();
        $obj_select_tipo_prueba = tipo_prueba::all();
        
        
        if ($obj_filtro == 34)
        { $obj_select_cant_servicios = cant_servicios::where('diferenciador','=','0')->get(); }
        elseif ($obj_filtro == 35)
        { $obj_select_cant_servicios = cant_servicios::where('diferenciador','=','1')->get(); }
        elseif ($obj_filtro == 36 or $obj_filtro == 37)
        { $obj_select_cant_servicios = cant_servicios::where('diferenciador','=','2')->get(); }
        else
        { $obj_select_cant_servicios = cant_servicios::all(); }
        
        $obj_select_tipo_rrhh = tipo_rrhh::all();
        $obj_select_tipo_beneficio = tipo_beneficio::all();

        return view('ropanual/create_datosanuales', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_anio',
                        'obj_select_laboratorios',
                        'obj_select_meses',
                        'obj_select_prueba',
                        'obj_select_anio_semana',
                        'obj_select_periodo_anual',
                        'obj_select_tipo_prueba',
                        'obj_select_cant_servicios',
                        'obj_select_tipo_rrhh',
                        'obj_select_tipo_beneficio'
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
        $obj_tabla = new datos_anuales();
        //$date = Carbon::now();

        $this->setTemplate($request->id_template);
        foreach($this->obj_config->def_columns['name_col'] as $obj_idx=>$obj_item)
        {
            if ($this->obj_config->def_columns['include_col'][$obj_idx])
            { $obj_tabla[$obj_item] = $request[$obj_item]; }
        }
        
        $obj_tabla['usu_creacion'] = Auth::user()->id_usuario_app;
        $obj_tabla['usu_modificado'] = Auth::user()->id_usuario_app;
        
        // Tratamiento especial
        switch ($request->id_template)
        {
            case "34":
                $obj_tabla['id_indicador'] = 50;
                break;
            
            case "35":
                $obj_tabla['id_indicador'] = 51;
                break;
            
            case "36":
                $obj_tabla['id_indicador'] = 52;
                break;
            
            case "37":
                $obj_tabla['id_indicador'] = 53;
                break;
            
            case "38":
                $obj_tabla['id_indicador'] = 54;
                break;
            
            case "39":
                $obj_tabla['id_indicador'] = 55;
                break;
            
            case "40":
                $obj_tabla['id_indicador'] = 56;
                break;
            
            default:
                $obj_tabla['id_indicador'] = 50;
                break;
        }
        
        $obj_validarPeriodo = $this->ifValidPeriodo($obj_tabla, $this->obj_config->def_columns['unique_col']);
        
        if ($obj_validarPeriodo > 0)
        {
            flash()->warning('Pretende Ingresar un Registro Existente de Periodo, Mes y Caracteristicas iguales, favor revisar');
        }
        else
        {
            $obj_tabla->save();
            $obj_controller_bitacora=new bitacoraController();	
            $obj_controller_bitacora->create_mensaje('Ingreso de datos');	
            flash()->success('Ingreso realizado con éxito');
        }
        Input::flash();
        return redirect()->back()->withInput();
    }

    function ifValidPeriodo($a_tabla, $a_columns)
    {
        $l_index = 0;
        $whereData = array();
        
        foreach($a_columns as $obj_idx=>$obj_item)
        {
            $whereData[$l_index] = implode(" ", array($obj_item,'=', '\''.$a_tabla[$obj_item].'\''));
            $l_index++;
        }
        $rawQuery = implode(" AND ", $whereData);
        $obj_datos_anuales = datos_anuales::whereraw($rawQuery);

        return $obj_datos_anuales->count();
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
        $obj_tabla = new datos_anuales();
        $obj_tabla = datos_anuales::find($id);
        
        $id_template = $this->get_template($obj_tabla->id_indicador);
        $this->setTemplate($id_template);
        $obj_param = $this->obj_config;
        $obj_filtro = $id_template;
        
        $obj_select_region_sica = region_sica::all();
        $obj_select_departamento = departamento::all();
        $obj_select_municipio = municipio::all();

	$obj_select_anio = anio::all();
	$obj_select_laboratorios = laboratorios::all();
	$obj_select_meses = meses::all();
	$obj_select_prueba = prueba::all();
        $obj_select_anio_semana = anio_semana::where('vigente','=','1')->get();
        $obj_select_periodo_anual = periodo_anual::where('vigente','=','1')->get();
        $obj_select_tipo_prueba = tipo_prueba::all();
        
        if ($obj_filtro == 34)
        { $obj_select_cant_servicios = cant_servicios::where('diferenciador','=','0')->get(); }
        elseif ($obj_filtro == 35)
        { $obj_select_cant_servicios = cant_servicios::where('diferenciador','=','1')->get(); }
        elseif ($obj_filtro == 36 or $obj_filtro == 37)
        { $obj_select_cant_servicios = cant_servicios::where('diferenciador','=','2')->get(); }
        else
        { $obj_select_cant_servicios = cant_servicios::all(); }
        
        $obj_select_tipo_rrhh = tipo_rrhh::all();
        $obj_select_tipo_beneficio = tipo_beneficio::all();

        return view('ropanual/edit_datosanuales', 
                compact('obj_tabla', 'obj_param','obj_filtro',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_anio',
                        'obj_select_laboratorios',
                        'obj_select_meses',
                        'obj_select_prueba',
                        'obj_select_anio_semana',
                        'obj_select_periodo_anual',
                        'obj_select_tipo_prueba',
                        'obj_select_cant_servicios',
                        'obj_select_tipo_rrhh',
                        'obj_select_tipo_beneficio'));
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
        $obj_tabla_x = new datos_anuales();
        $obj_tabla_x = datos_anuales::find($request->id_datos_anuales);
        
        $this->setTemplate($request->id_template);
        foreach($this->obj_config->def_columns['name_col'] as $obj_idx=>$obj_item)
        {
            if ($this->obj_config->def_columns['include_col'][$obj_idx])
            { $obj_tabla_x[$obj_item] = $request[$obj_item]; }
        }
        
        $obj_tabla_x['usu_modificado'] = Auth::user()->id_usuario_app;        
        $obj_filtro = $request->id_template;
        
        switch ($request->id_template) 
        {
            case "34":
                $obj_tabla_x['id_indicador'] = 50;
                break;
            
            case "35":
                $obj_tabla_x['id_indicador'] = 51;
                break;
            
            case "36":
                $obj_tabla_x['id_indicador'] = 52;
                break;
            
            case "37":
                $obj_tabla_x['id_indicador'] = 53;
                break;
            
            case "38":
                $obj_tabla_x['id_indicador'] = 54;
                break;
            
            case "39":
                $obj_tabla_x['id_indicador'] = 55;
                break;
            
            case "40":
                $obj_tabla_x['id_indicador'] = 56;
                break;
            
            default:
                $obj_tabla_x['id_indicador'] = 1;
                break;
        }
        
        flash()->success('Modificación realizada exitosamente');
        $obj_tabla_x->save();
        $obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Datos modificados');

        $obj_tabla=datos_anuales::
                where('id_indicador', $this->get_indicador($obj_filtro))->
                orderBy('id_datos_anuales','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;

        return redirect()->action('datosanuales_Controller@indexAll',['id'=>$obj_filtro]);

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
        $obj_tabla = new datos_anuales();
        $obj_tabla = datos_anuales::destroy($id);

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
            case "34":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'Mejora Continua de la Calidad en laboratorios';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Laboratorio", "Periodo", "Mes", "Tipo Prueba" , "Servicios", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_laboratorios', 'id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'cant_servi_prueba'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'id_indicador']
                        );
                break;
            
            case "35":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'Mejora Continua de la Calidad en sitios de prueba basados en puntos de atencion';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Laboratorio", "Periodo", "Mes", "Tipo Prueba" , "Servicios", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_laboratorios', 'id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'cant_servi_prueba'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'id_indicador']
                        );
                break;
            
            case "36":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'Pruebas de proeficiencia - PT - en laboratorios';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Laboratorio", "Periodo", "Mes", "Tipo Prueba" , "Servicios", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_laboratorios', 'id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'cant_servi_prueba'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'id_indicador']
                        );
                break;
            
            case "37":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'Pruebas de proeficiencia - PT - en POCT';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Laboratorio", "Periodo", "Mes", "Tipo Prueba" , "Servicios", "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_laboratorios', 'id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'cant_servi_prueba'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_cant_servicios', 'id_indicador']
                        );
                break;
            
            case "38":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'Numero de muestras para laboratorio';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Laboratorio", "Periodo", "Mes", "Tipo Prueba" , "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_laboratorios', 'id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'cant_servi_prueba'],
                            'include_col' => [false, false, false, false, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_indicador']
                        );
                break;
            
            case "39":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'Numero de muestras para pruebas en sitios de Prueba basado en puntos de Atención';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Laboratorio", "Periodo", "Mes", "Tipo Prueba" , "Cantidad");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_laboratorios', 'id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'cant_servi_prueba'],
                            'include_col' => [false, false, false, false, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_prueba', 'id_indicador']
                        );
                break;
            
            case "40":
                $this->obj_config->nombre_plantilla = 'datosanual'; //.blade.php
                $this->obj_config->nombre_opcion = 'HRH_Curr';
                $this->obj_config->nombre = 'datos';
                $this->obj_config->columns = array('true', 'false', 'false', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'true');
                $this->obj_config->titles = array("ID", "Pais", "Departamento", "Municipio", "Hospital", "Periodo", "Mes", "Tipo Recurso Humano", "Tipo Beneficio", "Cantidad Personal", "Gasto Total");
        
                $this->obj_config->def_columns =
                        array(
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio', 'id_hospital', 'id_periodo_anual', 'id_meses', 'id_tipo_rrhh', 'id_tipo_beneficio', 'cant_personas', 'gasto'],
                            'include_col' => [false, false, false, false, true, true, true, true, true, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses', 'id_tipo_rrhh', 'id_tipo_beneficio', 'id_indicador']
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
                            'name_col' => ['id_datos_anuales','pais', 'departamento', 'municipio','id_hospital','id_anio','id_periodo','id_rango_edad_etario','id_sexo','valor_numerador'],
                            'include_col' => [false, false, false, false, true, true, true, false, true, true],
                            'unique_col' => ['id_periodo_anual', 'id_meses' ]
                        );
                break;
        }
    }
    
    function get_indicador(int $a_template)
    {
        switch ($a_template) 
        {
            case "34":
                return array(50);
                break;
            
            case "35":
                return array(51);
                break;
            
            case "36":
                return array(52);
                break;
            
            case "37":
                return array(53);
                break;
            
            case "38":
                return array(54);
                break;
            
            case "39":
                return array(55);
                break;
            
            case "40":
                return array(56);
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
            case "50":
                return 34;
                break;
            
            case "51":
                return 35;
                break;
            
            case "52":
                return 36;
                break;
            
            case "53":
                return 37;
                break;
            
            case "54":
                return 38;
                break;
            
            case "55":
                return 39;
                break;
            
            case "56":
                return 40;
                break;
            
            default:
                return 34;
                break;
        }
    }

    
    
}
