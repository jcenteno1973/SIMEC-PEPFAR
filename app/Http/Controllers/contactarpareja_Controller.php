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
use Carbon\Carbon;

// add
use App\Models\configuracion;
use App\Models\contactar_pareja;
use App\Models\tipo_referencia;
use App\Models\motivo_rechazo_index;

class contactarpareja_Controller extends Controller
{
    private $obj_config;

    public function __construct() {
        $this->middleware('auth');
        
        $this->obj_config = new configuracion();
        $this->obj_config->nombre_plantilla = 'contactarpareja'; //.blade.php
        $this->obj_config->nombre_opcion = 'Pantalla Intentos de Contacto';
        $this->obj_config->nombre = 'contactarpareja';
        $this->obj_config->columns = array('false','false','true','true','true','true');
        $this->obj_config->titles = array("ID","ID Index Testing","Modalidad","¿Contacto con Exito?","Fecha Contacto", "Observacion");
    }
    
    public function indexAll($id)
    {
        //
        $obj_tabla=contactar_pareja::
                where('id_index_testing','=',$id)->
                orderBy('id_contactar_pareja','ASC')->paginate(0);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $id;

        return view('roptrimestre/index_contactarpareja',compact('obj_tabla','obj_param', 'obj_filtro'));
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
        
        $whereData[$l_index] = implode(" ", array('id_index_testing','=', '\''.$request->id_index_testing.'\''));
        $l_index++;
        
        if ($request->fecha_contacto != null)
        {
            $whereData[$l_index] = implode(" ", array('fecha_contacto','=', '\''.$request->fecha_contacto.'\''));
            $l_index++;
        }
        
        $rawQuery = implode(" AND ", $whereData);
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla=new telefono();
        $obj_tabla= contactar_pareja::
                whereRaw($rawQuery)->
                orderBy('id_contactar_pareja','ASC')->
                paginate($this->obj_config->paginate);

        $obj_param = $this->obj_config;
        $obj_select_tipo_referencia = tipo::all();
        $obj_filtro = $request->id_index_testing;
        
        return view('roptrimestre/index_contactarpareja',compact('obj_tabla','obj_param','obj_filtro','obj_select_tipo_referencia'));
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
        $obj_select_tipo_referencia = tipo_referencia::all();
        $obj_select_motivo_rechazo_index = motivo_rechazo_index::all();
        $obj_filtro = $id;
        
        return view('roptrimestre/create_contactarpareja', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_tipo_referencia',
                        'obj_select_motivo_rechazo_index'));
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
        $obj_tabla = new contactar_pareja();
        //$date = Carbon::now();
        
        $obj_tabla->id_index_testing = $request->id_index_testing;
	$obj_tabla->id_tipo_referencia = $request->id_tipo_referencia;    // Modalidad
        
        if ($request->contacto_exito == 1)
        { $obj_tabla->contacto_exito = 1; }
        else
        { $obj_tabla->contacto_exito = 0; }
        
        if ($request->id_tipo_referencia == 5)
        { $obj_tabla->fecha_limite = Carbon::createFromFormat('d/m/Y', $request->fecha_limite); }

        if ($obj_tabla->contacto_exito == 1)
        {
            if ($request->fecha_contacto != "")
            {
                $obj_tabla->fecha_contacto = Carbon::createFromFormat('d/m/Y', $request->fecha_contacto);
            }
           
            $obj_tabla->acepta = $request->acepta;
            $obj_tabla->observacion = $request->observacion;
            $obj_tabla->id_motivo_rechazo_index = $request->id_motivo_rechazo_index;
        }

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
        $obj_tabla = new contactar_pareja();
        $obj_tabla = contactar_pareja::find($id);
        $obj_param = $this->obj_config;

        $obj_select_tipo_referencia = tipo_referencia::all();
        $obj_select_motivo_rechazo_index = motivo_rechazo_index::all();
        
        $obj_filtro = $obj_tabla->id_index_testing;

        return view('roptrimestre/edit_contactarpareja', 
                compact('obj_tabla', 'obj_param','obj_filtro',
                        'obj_select_tipo_referencia',
                        'obj_select_motivo_rechazo_index'));
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
        $obj_tabla_x = new contactar_pareja();
        $obj_tabla_x = contactar_pareja::find($request->id_contactar_pareja);
        
        $obj_tabla_x ->id_index_testing=$request->id_index_testing;
	$obj_tabla_x ->id_tipo_referencia=$request->id_tipo_referencia;
        $obj_tabla_x ->fecha_limite=Carbon::createFromFormat('d/m/Y', $request->fecha_limite);
        $obj_tabla_x ->contacto_exito=$request->contacto_exito;
        $obj_tabla_x ->fecha_contacto=Carbon::createFromFormat('d/m/Y', $request->fecha_contacto);
        $obj_tabla_x ->acepta=$request->acepta;
        $obj_tabla_x ->observacion=$request->observacion;
        $obj_tabla_x -> id_motivo_rechazo_index = $request->id_motivo_rechazo_index;
        
        $obj_filtro = $request->id_index_testing;
        
        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=contactar_pareja:: where('id_index_testing','=',$request->id_index_testing)->orderBy('id_contactar_pareja','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;

        return view('roptrimestre/index_contactarpareja',compact('obj_tabla','obj_param','obj_filtro'));
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
        $obj_tabla = new contactar_pareja();
        $obj_tabla = contactar_pareja::destroy($id);

        flash()->success('Registro Eliminado exitosamente');
        return "ok";
    }
}
