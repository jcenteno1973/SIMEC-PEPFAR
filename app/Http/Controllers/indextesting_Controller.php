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
use App\Models\index_testing;
use App\Models\hospital;
use App\Models\region_sica;
use App\Models\departamento;
use App\Models\municipio;
use App\Models\sexo;
use App\Models\orientacion_sexual;
use App\Models\poblacion_clave;
use App\Models\poblacion_meta;
use App\Models\tipo_diagnostico;
use App\Models\motivo_rechazo_index;
use App\Models\resultado_incidencia;
use App\Models\tipo_prueba_incidencia;

use App\Models\configuracion;
use App\Models\bitacora;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class indextesting_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $obj_config;

    public function __construct() {
        $this->middleware('auth');
        
        $this->obj_config = new configuracion();
        $this->obj_config->nombre_plantilla = 'indextesting'; //.blade.php
        $this->obj_config->nombre_opcion = 'Caso Indice';
        $this->obj_config->nombre = 'indextesting';
        $this->obj_config->columns = array('true','true','true','true','true',"false","true","true", "false");
        $this->obj_config->titles = array("ID","Nombres","Apellidos","Sexo", "Edad","Telefono","No. Expediente","No. Documento", "Motivo Rechazo NAP/C");
    }
        
    public function indexAll()
    {
        // where('id_municipio','=', $obj_municipio)->
        // $obj_hospital = Auth::user()->id_hospital;

        $obj_tabla=index_testing::
                where('caso_indice',1)->
                orderBy('apellidos','DESC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;

        return view('roptrimestre/index_indextesting',compact('obj_tabla','obj_param'));
    }
    
    public function index(Request $request)
    {
        //
        $l_index = 0;
        $whereData = array();
        
        $whereData[$l_index] = implode(" ", array('caso_indice','=', 1));
        $l_index++;
        
        if ($request->nombres != null)
        {
            $whereData[$l_index] = implode(" ", array('nombres','like', '\'%'.$request->nombres.'%\''));
            $l_index++;
        }
        
        if ($request->apellidos != null)
        {
            $whereData[$l_index] = implode(" ", array('apellidos','like', '\'%'.$request->apellidos.'%\''));
            $l_index++;
        }
        
        if ($request->no_expediente != null)
        {
            $whereData[$l_index] = implode(" ", array('no_expediente','like', '\'%'.$request->no_expediente.'%\''));
            $l_index++;
        }
        
        if ($request->no_documento != null)
        {
            $whereData[$l_index] = implode(" ", array('no_documento','like', '\'%'.$request->no_documento.'%\''));
        }

        $rawQuery = implode(" AND ", $whereData);
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla=new index_testing();
        $obj_tabla=index_testing::
                whereRaw($rawQuery)->
                orderBy('apellidos','DESC')->
                paginate($this->obj_config->paginate);

        $obj_param = $this->obj_config;
        
        return view('roptrimestre/index_indextesting',compact('obj_tabla','obj_param'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $obj_param = $this->obj_config;
        $obj_select_region_sica = region_sica::all();

        $obj_select_departamento = departamento::where('id_region_sica','=',Auth::user()->id_region_sica)->get();

        $obj_select_municipio = municipio::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();
        $obj_select_poblacion_clave = poblacion_clave::all();
        $obj_select_poblacion_meta = poblacion_meta::all();
        $obj_select_tipo_diagnostico = tipo_diagnostico::all();
        $obj_select_motivo_rechazo_index = motivo_rechazo_index::all();
        $obj_select_resultado_incidencia = resultado_incidencia::all();
        $obj_select_tipo_prueba_incidencia = tipo_prueba_incidencia::all();
        
        return view('roptrimestre/create_indextesting', 
                compact('obj_param',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_sexo',
                        'obj_select_orientacion_sexual',
                        'obj_select_poblacion_clave',
                        'obj_select_poblacion_meta',
                        'obj_select_tipo_diagnostico',
                        'obj_select_motivo_rechazo_index',
                        'obj_select_resultado_incidencia',
                        'obj_select_tipo_prueba_incidencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj_tabla = new index_testing();
        //$date = Carbon::now();
        
        $obj_tabla->id_municipio=$request->id_municipio;
        $obj_tabla->direccion=$request->direccion;
	$obj_tabla->no_expediente=$request->no_expediente;
	$obj_tabla->no_documento=$request->no_documento;
        $obj_tabla->nombres=$request->nombres;
	$obj_tabla->apellidos=$request->apellidos;
        $obj_tabla->edad=$request->edad;
        $obj_tabla->id_sexo=$request->id_sexo;
	$obj_tabla->id_orientacion_sexual=$request->id_orientacion_sexual;
        $obj_tabla->id_poblacion_meta=$request->id_poblacion_meta;
        $obj_tabla->id_tipo_diagnostico=$request->id_tipo_diagnostico;
        $obj_tabla->clinica_diagnostico=$request->clinica_diagnostico;
        
        if ($request->fecha_entrega != "")
        { $obj_tabla->fecha_entrega=Carbon::createFromFormat('d/m/Y', $request->fecha_entrega); }
        
        if ($request->fecha_abordaje != "")
        { $obj_tabla->fecha_abordaje=Carbon::createFromFormat('d/m/Y', $request->fecha_abordaje); }
        
        if ($request->fecha_resultado_dx != "")
        { $obj_tabla->fecha_resultado_dx=Carbon::createFromFormat('d/m/Y', $request->fecha_resultado_dx); }
        
        if ($request->fecha_prueba_incidencia != "")
        { $obj_tabla->fecha_prueba_incidencia=Carbon::createFromFormat('d/m/Y', $request->fecha_prueba_incidencia); }
        
	$obj_tabla->pareja_referida=$request->pareja_referida;
	$obj_tabla->index_testing_previa=$request->index_testing_previa;
        $obj_tabla->falla_virologica=$request->falla_virologica;
	$obj_tabla->vih_its=$request->vih_its;
	$obj_tabla->embarazada=$request->embarazada;
	$obj_tabla->lactancia=$request->lactancia;
        $obj_tabla->id_motivo_rechazo_index=$request->id_motivo_rechazo_index;
        $obj_tabla->no_referenciadas=$request->no_referenciadas;
        $obj_tabla->id_resultado_incidencia=$request->id_resultado_incidencia;
        $obj_tabla->id_tipo_prueba_incidencia=$request->id_tipo_prueba_incidencia;
        $obj_tabla->caso_indice=1;
        
        $obj_tabla['usu_creacion'] = Auth::user()->id_usuario_app;
        $obj_tabla['usu_modificado'] = Auth::user()->id_usuario_app;
        
	// $obj_tabla->id_estado_index=$request->id_estado_index;
	// $obj_tabla->id_nivel_riesgo=$request->id_nivel_riesgo;
	// $obj_tabla->id_tipo_pareja=$request->id_tipo_pareja;
	// $obj_tabla->id_motivo_rechazo_pareja=$request->id_motivo_rechazo_pareja;
	// $obj_tabla->id_unidad_atencion=$request->id_unidad_atencion;
	// $obj_tabla->ind_id_index_testing=$request->ind_id_index_testing;
	// $obj_tabla->id_inicio_tratamiento=$request->id_inicio_tratamiento;
	// $obj_tabla->acepta_index_testing=$request->acepta_index_testing;
	// $obj_tabla->consejeria_voluntaria=$request->consejeria_voluntaria;
	// $obj_tabla->caso_indice=$request->caso_indice;
        
        $obj_tabla->save();
        flash()->success('Modificación realizada exitosamente');
        return redirect()->back(); 
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
        $obj_tabla = new index_testing();
        $obj_tabla = index_testing::find($id);
        $obj_param = $this->obj_config;

        $obj_select_region_sica = region_sica::all();
        $obj_select_departamento = departamento::where('id_region_sica','=',Auth::user()->id_region_sica)->get();
        $obj_select_municipio = municipio::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();
        $obj_select_poblacion_clave = poblacion_clave::all();
        $obj_select_poblacion_meta = poblacion_meta::all();
        $obj_select_tipo_diagnostico = tipo_diagnostico::all();
        $obj_select_motivo_rechazo_index = motivo_rechazo_index::all();
        $obj_select_resultado_incidencia = resultado_incidencia::all();
        $obj_select_tipo_prueba_incidencia = tipo_prueba_incidencia::all();

        return view('roptrimestre/edit_indextesting', 
                compact('obj_tabla', 'obj_param',
                        'obj_select_region_sica',
                        'obj_select_departamento',
                        'obj_select_municipio',
                        'obj_select_sexo',
                        'obj_select_orientacion_sexual',
                        'obj_select_poblacion_clave',
                        'obj_select_poblacion_meta',
                        'obj_select_tipo_diagnostico',
                        'obj_select_motivo_rechazo_index',
                        'obj_select_resultado_incidencia',
                        'obj_select_tipo_prueba_incidencia'));
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
        //$date = Carbon::now();
        $obj_tabla_x = new index_testing();
        $obj_tabla_x = index_testing::find($request->id_index_testing);
        
        $obj_tabla_x->id_municipio=$request->id_municipio;
        $obj_tabla_x->direccion=$request->direccion;
	$obj_tabla_x->no_expediente=$request->no_expediente;
	$obj_tabla_x->no_documento=$request->no_documento;
        $obj_tabla_x->nombres=$request->nombres;
	$obj_tabla_x->apellidos=$request->apellidos;
        $obj_tabla_x->edad=$request->edad;
        $obj_tabla_x->id_sexo=$request->id_sexo;
	$obj_tabla_x->id_orientacion_sexual=$request->id_orientacion_sexual;
        $obj_tabla_x->id_poblacion_meta=$request->id_poblacion_meta;
        $obj_tabla_x->id_tipo_diagnostico=$request->id_tipo_diagnostico;
        $obj_tabla_x->clinica_diagnostico=$request->clinica_diagnostico;
        
        if ($request->fecha_entrega != "")
        { $obj_tabla->fecha_entrega=Carbon::createFromFormat('d/m/Y', $request->fecha_entrega); }
        
        if ($request->fecha_abordaje != "")
        { $obj_tabla->fecha_abordaje=Carbon::createFromFormat('d/m/Y', $request->fecha_abordaje); }
        
        if ($request->fecha_resultado_dx != "")
        { $obj_tabla->fecha_resultado_dx=Carbon::createFromFormat('d/m/Y', $request->fecha_resultado_dx); }
        
        if ($request->fecha_prueba_incidencia != "")
        { $obj_tabla->fecha_prueba_incidencia=Carbon::createFromFormat('d/m/Y', $request->fecha_prueba_incidencia); }

	$obj_tabla_x->pareja_referida=$request->pareja_referida;
	$obj_tabla_x->index_testing_previa=$request->index_testing_previa;
        $obj_tabla_x->falla_virologica=$request->falla_virologica;
	$obj_tabla_x->vih_its=$request->vih_its;
	$obj_tabla_x->embarazada=$request->embarazada;
	$obj_tabla_x->lactancia=$request->lactancia;
        $obj_tabla_x->id_motivo_rechazo_index=$request->id_motivo_rechazo_index;
        $obj_tabla_x->no_referenciadas=$request->no_referenciadas;
        $obj_tabla_x->id_resultado_incidencia=$request->id_resultado_incidencia;
        $obj_tabla_x->id_tipo_prueba_incidencia=$request->id_tipo_prueba_incidencia;
        $obj_tabla_x->caso_indice=1;
        
        $obj_tabla['usu_modificado'] = Auth::user()->id_usuario_app;

        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=index_testing::
                where('caso_indice',1)->
                orderBy('apellidos','DESC')->paginate($this->obj_config->paginate);
        
        $obj_param = $this->obj_config;

        return view('roptrimestre/index_indextesting',compact('obj_tabla','obj_param'));
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
        $obj_tabla = new index_testing();
        $obj_tabla = index_testing::destroy($id);

        flash()->success('Registro Eliminado exitosamente');
        return "ok";
    }
}
