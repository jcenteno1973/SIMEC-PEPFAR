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
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\configuracion;
use App\Models\index_testing;
use App\Models\tipo_pareja;
use App\Models\nivel_riesgo;
use App\Models\sexo;
use App\Models\orientacion_sexual;
use App\Models\tipo_diagnostico;
use App\Models\tipo_violencia;

class pareja_Controller extends Controller
{
    private $obj_config;

    public function __construct() {
        $this->middleware('auth');
        
        $this->obj_config = new configuracion();
        $this->obj_config->nombre_plantilla = 'pareja'; //.blade.php
        $this->obj_config->nombre_opcion = 'Pantalla Lista de Parejas';
        $this->obj_config->nombre = 'pareja';
        $this->obj_config->columns = array('true','false','true','true','true','true','true','true','true');
        $this->obj_config->titles = array("ID","ind_id_index_testing","Nombres","Apellidos", "Tipo Pareja","Nivel Riesgo","Edad","Sexo","Orientacion Sexual");
    }
    
    public function indexAll($id)
    {
        //
        $obj_tabla=index_testing::
                where('ind_id_index_testing','=',$id)->
                orderBy('Apellidos','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $id;
        
        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();

        return view('roptrimestre/index_pareja',compact('obj_tabla', 'obj_param', 'obj_filtro','obj_select_tipo_pareja','obj_select_nivel_riesgo','obj_select_sexo','obj_select_orientacion_sexual'));
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
        
        $whereData[$l_index] = implode(" ", array('ind_id_index_testing','=', '\''.$request->ind_id_index_testing.'\''));
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
                orderBy('apellidos','ASC')->
                paginate($this->obj_config->paginate);

        $obj_param = $this->obj_config;
        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();
        $obj_filtro = $request->ind_id_index_testing;
        
        return view('roptrimestre/index_pareja',compact('obj_tabla','obj_param','obj_filtro','obj_select_tipo_pareja','obj_select_nivel_riesgo','obj_select_sexo','obj_select_orientacion_sexual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $obj_param = $this->obj_config;
        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();
        $obj_filtro = $id;
        
        return view('roptrimestre/create_pareja', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_tipo_pareja',
                        'obj_select_nivel_riesgo',
                        'obj_select_sexo',
                        'obj_select_orientacion_sexual'));
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
        $obj_tabla = new index_testing();
        //$date = Carbon::now();
        
        $obj_tabla->ind_id_index_testing=$request->ind_id_index_testing;
        //$obj_tabla->id_index_testing=$request->id_index_testing;
	$obj_tabla->nombres=$request->nombres;
	$obj_tabla->apellidos=$request->apellidos;
        $obj_tabla->id_tipo_pareja=$request->id_tipo_pareja;
	$obj_tabla->id_nivel_riesgo=$request->id_nivel_riesgo;
	$obj_tabla->edad=$request->edad;
	$obj_tabla->id_sexo=$request->id_sexo;
	$obj_tabla->id_orientacion_sexual=$request->id_orientacion_sexual;
        $obj_tabla->pareja_referida = 1;
        
        $obj_tabla['usu_creacion'] = Auth::user()->id_usuario_app;
        $obj_tabla['usu_modificado'] = Auth::user()->id_usuario_app;
        
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

        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();
        
        $obj_filtro = $obj_tabla->ind_id_index_testing;

        return view('roptrimestre/edit_pareja', 
                compact('obj_tabla', 'obj_param', 'obj_filtro',                   
                        'obj_select_tipo_pareja', 'obj_select_nivel_riesgo', 'obj_select_sexo','obj_select_orientacion_sexual'));
    }

    public function edit_refexit($id)
    {
        //
        $obj_tabla = new index_testing();
        $obj_tabla = index_testing::find($id);
        $obj_param = $this->obj_config;
        
        $obj_select_tipo_diagnostico = tipo_diagnostico::where('diferenciador','=',1)->get();
        
        $obj_filtro = $obj_tabla->ind_id_index_testing;

        return view('roptrimestre/edit_pareja_refexit', 
                compact('obj_tabla', 'obj_param', 'obj_filtro',                 
                        'obj_select_tipo_diagnostico'));
    }
    
    public function edit_viorelnap($id)
    {
        //
        $obj_tabla = new index_testing();
        $obj_tabla = index_testing::find($id);
        $obj_param = $this->obj_config;
        
        $obj_select_tipo_violencia = tipo_violencia::all();
        
        $obj_filtro = $obj_tabla->ind_id_index_testing;

        return view('roptrimestre/edit_pareja_viorelnap', 
                compact('obj_tabla', 'obj_param', 'obj_filtro',                 
                        'obj_select_tipo_violencia'));
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
        $obj_tabla_x = new index_testing();
        $obj_tabla_x = index_testing::find($request->id_index_testing);
        
        $obj_tabla_x ->ind_id_index_testing=$request->ind_id_index_testing;
	$obj_tabla_x ->nombres=$request->nombres;
	$obj_tabla_x ->apellidos=$request->apellidos;
        $obj_tabla_x ->id_tipo_pareja=$request->id_tipo_pareja;
	$obj_tabla_x ->id_nivel_riesgo=$request->id_nivel_riesgo;
        $obj_tabla_x ->edad=$request->edad;
        $obj_tabla_x ->id_sexo=$request->id_sexo;
        $obj_tabla_x ->id_orientacion_sexual=$request->id_orientacion_sexual;
        $obj_tabla_x ->pareja_referida = 1;
        
        $obj_tabla_x['usu_modificado'] = Auth::user()->id_usuario_app;
        
        $obj_filtro = $request->ind_id_index_testing;
        
        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=index_testing:: where('ind_id_index_testing','=',$request->ind_id_index_testing)->orderBy('apellidos','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        
        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();

        return view('roptrimestre/index_pareja',compact('obj_tabla','obj_param','obj_filtro',
                'obj_select_tipo_pareja','obj_select_nivel_riesgo','obj_select_sexo','obj_select_orientacion_sexual'));
    }
    
    
    public function update_refexit(Request $request)
    {
        $obj_tabla_x = new index_testing();
        $obj_tabla_x = index_testing::find($request->id_index_testing);
        
	$obj_tabla_x ->id_tipo_diagnostico=$request->id_tipo_diagnostico;
        $obj_tabla_x ->ref_exitosa = 1;
        
        if ($request->id_tipo_diagnostico == 1)
        {
            $obj_tabla_x ->caso_indice = 1;
            $obj_tabla_x ->pareja_referida = 1;
        }
        
        if ($request->id_tipo_diagnostico == 3)
        {
            $obj_tabla_x ->caso_indice = 0;
        }
        
        if ($request->fecha_resultado_dx != "")
        { $obj_tabla_x->fecha_resultado_dx=Carbon::createFromFormat('d/m/Y', $request->fecha_resultado_dx); }
        
        if ($request->fecha_entrega != "")
        { $obj_tabla_x->fecha_entrega=Carbon::createFromFormat('d/m/Y', $request->fecha_entrega); }
        
        $obj_tabla_x['usu_modificado'] = Auth::user()->id_usuario_app;
        
        $obj_filtro = $request->ind_id_index_testing;
        
        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=index_testing:: where('ind_id_index_testing','=',$request->ind_id_index_testing)->orderBy('apellidos','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        
        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();

        return view('roptrimestre/index_pareja',compact('obj_tabla','obj_param','obj_filtro',
                'obj_select_tipo_pareja','obj_select_nivel_riesgo','obj_select_sexo','obj_select_orientacion_sexual'));
    }
        
    public function update_viorelnap(Request $request)
    {
        $obj_tabla_x = new index_testing();
        $obj_tabla_x = index_testing::find($request->id_index_testing);
        
	$obj_tabla_x ->id_tipo_violencia=$request->id_tipo_violencia;
        $obj_tabla_x ->ref_violencia = 1;
        $obj_tabla_x['usu_modificado'] = Auth::user()->id_usuario_app;
        
        $obj_filtro = $request->ind_id_index_testing;
        
        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=index_testing:: where('ind_id_index_testing','=',$request->ind_id_index_testing)->orderBy('apellidos','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        
        $obj_select_tipo_pareja = tipo_pareja::all();
        $obj_select_nivel_riesgo = nivel_riesgo::all();
        $obj_select_sexo = sexo::all();
        $obj_select_orientacion_sexual = orientacion_sexual::all();

        return view('roptrimestre/index_pareja',compact('obj_tabla','obj_param','obj_filtro',
                'obj_select_tipo_pareja','obj_select_nivel_riesgo','obj_select_sexo','obj_select_orientacion_sexual'));
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
