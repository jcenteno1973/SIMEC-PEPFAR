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
use App\Models\agenda;
use App\Models\tipo_mensaje;

class agenda_Controller extends Controller
{
    private $obj_config;

    public function __construct() {
        $this->middleware('auth');
        
        $this->obj_config = new configuracion();
        $this->obj_config->nombre_plantilla = 'agenda'; //.blade.php
        $this->obj_config->nombre_opcion = 'Pantalla Lista Agenda';
        $this->obj_config->nombre = 'agenda';
        $this->obj_config->columns = array('false','false','true','true','true',"true","true");
        $this->obj_config->titles = array("ID","index testing","Tipo de Mensaje","fecha_agenda", "cancelada","realizada","observacion");
    }

    public function indexAll($id)
    {
        //
        $obj_tabla=agenda::
                where('id_index_testing','=',$id)->
                orderBy('fecha_agenda','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $id;
        $obj_select_tipo_mensaje = tipo_mensaje::all();

        return view('roptrimestre/index_agenda',compact('obj_tabla','obj_param', 'obj_filtro','obj_select_tipo_mensaje'));
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
        
        if ($request->numero_telefono != null)
        {
            $whereData[$l_index] = implode(" ", array('id_tipo_mensaje','=', '\''.$request->id_tipo_mensaje.'\''));
            $l_index++;
        }
        
        if ($request->observacion != null)
        {
            $whereData[$l_index] = implode(" ", array('observacion','like', '\'%'.$request->observacion.'%\''));
            $l_index++;
        }
        
        $rawQuery = implode(" AND ", $whereData);
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla=new agenda();
        $obj_tabla=agenda::
                whereRaw($rawQuery)->
                orderBy('fecha_agenda','ASC')->
                paginate($this->obj_config->paginate);

        $obj_param = $this->obj_config;
        $obj_select_tipo_mensaje = tipo_mensaje::all();
        $obj_filtro = $request->id_index_testing;
        
        return view('roptrimestre/index_agenda',compact('obj_tabla','obj_param','obj_filtro','obj_select_tipo_mensaje'));
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
        $obj_select_tipo_mensaje = tipo_mensaje::all();
        $obj_filtro = $id;
        
        return view('roptrimestre/create_agenda', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_tipo_mensaje'));
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
        $obj_tabla = new agenda();
        //$date = Carbon::now();

        $obj_tabla->id_index_testing=$request->id_index_testing;
	$obj_tabla->id_tipo_mensaje=$request->id_tipo_mensaje;
	$obj_tabla->fecha_agenda=$request->fecha_agenda;
        $obj_tabla->observacion=$request->observacion;
	$obj_tabla->cancelada=$request->cancelada;
        $obj_tabla->realizada=$request->realizada;
        
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
        $obj_tabla = new agenda();
        $obj_tabla = agenda::find($id);
        $obj_param = $this->obj_config;

        $obj_select_tipo_mensaje = tipo_mensaje::all();
        
        $obj_filtro = $obj_tabla->id_index_testing;

        return view('roptrimestre/edit_agenda', 
                compact('obj_tabla', 'obj_param','obj_filtro',
                        'obj_select_tipo_mensaje'));
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
        $obj_tabla_x = new agenda();
        $obj_tabla_x = agenda::find($request->id_agenda);

        $obj_tabla_x ->id_index_testing=$request->id_index_testing;
	$obj_tabla_x ->id_tipo_mensaje=$request->id_tipo_mensaje;
	$obj_tabla_x ->fecha_agenda=$request->fecha_agenda;
        $obj_tabla_x ->observacion=$request->observacion;
	$obj_tabla_x ->cancelada=$request->cancelada;
        $obj_tabla_x ->realizada=$request->realizada;
        
        $obj_filtro = $request->id_index_testing;

        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=agenda:: where('id_index_testing','=',$request->id_index_testing)->orderBy('fecha_agenda','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        $obj_select_tipo_mensaje = tipo_mensaje::all();

        return view('roptrimestre/index_agenda',compact('obj_tabla','obj_param','obj_filtro','obj_select_tipo_mensaje'));
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
        $obj_tabla = new agenda();
        $obj_tabla = agenda::destroy($id);

        flash()->success('Registro Eliminado exitosamente');
        return "ok";
    }
}
