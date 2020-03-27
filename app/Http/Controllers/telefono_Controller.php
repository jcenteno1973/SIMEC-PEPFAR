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
use App\Models\telefono;
use App\Models\tipo;

class telefono_Controller extends Controller
{
    private $obj_config;

    public function __construct() {
        $this->middleware('auth');
        
        $this->obj_config = new configuracion();
        $this->obj_config->nombre_plantilla = 'telefono'; //.blade.php
        $this->obj_config->nombre_opcion = 'Pantalla Lista telefono';
        $this->obj_config->nombre = 'telefono';
        $this->obj_config->columns = array('false','false','true','true','true',"true");
        $this->obj_config->titles = array("ID","index testing","Tipo de Telefono","Numero de Telefono", "Envio SMS","Principal");
    }
    
    public function indexAll($id)
    {
        //
        $obj_tabla=telefono::
                where('id_index_testing','=',$id)->
                orderBy('numero_telefono','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        
        $obj_filtro = $id;

        return view('roptrimestre/index_telefono',compact('obj_tabla','obj_param', 'obj_filtro'));
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
            $whereData[$l_index] = implode(" ", array('numero_telefono','=', '\''.$request->numero_telefono.'\''));
            $l_index++;
        }
        
        $rawQuery = implode(" AND ", $whereData);
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla=new telefono();
        $obj_tabla=telefono::
                whereRaw($rawQuery)->
                orderBy('numero_telefono','ASC')->
                paginate($this->obj_config->paginate);

        $obj_param = $this->obj_config;
        $obj_select_tipo = tipo::all();
        $obj_filtro = $request->id_index_testing;
        
        return view('roptrimestre/index_telefono',compact('obj_tabla','obj_param','obj_filtro','obj_select_tipo'));
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
        $obj_select_tipo = tipo::all();
        $obj_filtro = $id;
        
        return view('roptrimestre/create_telefono', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_tipo'));
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
        $obj_tabla = new telefono();
        //$date = Carbon::now();
        
        $obj_tabla->id_index_testing=$request->id_index_testing;
	$obj_tabla->id_tipo=$request->id_tipo;
	$obj_tabla->numero_telefono=$request->numero_telefono;
        $obj_tabla->enviar_sms=$request->enviar_sms;
	$obj_tabla->principal=$request->principal;
        
        if ($request->principal == 1)
        {
            $obj_telefonos = telefono::
                    where('id_index_testing','=','2')->
                    update(['principal' => 0]);
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
        $obj_tabla = new telefono();
        $obj_tabla = telefono::find($id);
        $obj_param = $this->obj_config;

        $obj_select_tipo = tipo::all();
        
        $obj_filtro = $obj_tabla->id_index_testing;

        return view('roptrimestre/edit_telefono', 
                compact('obj_tabla', 'obj_param','obj_filtro',
                        'obj_select_tipo'));
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
        $obj_tabla_x = new telefono();
        $obj_tabla_x = telefono::find($request->id_telefono);
        
        $obj_tabla_x ->id_index_testing=$request->id_index_testing;
	$obj_tabla_x ->id_tipo=$request->id_tipo;
	$obj_tabla_x ->numero_telefono=$request->numero_telefono;
        $obj_tabla_x ->enviar_sms=$request->enviar_sms;
	$obj_tabla_x ->principal=$request->principal;
        
        $obj_filtro = $request->id_index_testing;
        
        if ($request->principal == 1)
        {
            $obj_telefonos = telefono::
                    where('id_index_testing','=',$request->id_index_testing)->
                    update(['principal' => 0]);
        }

        flash()->success('Modificación realizada exitosamente');
        
        $obj_tabla_x->save();
        
        $obj_tabla=telefono:: where('id_index_testing','=',$request->id_index_testing)->orderBy('numero_telefono','ASC')->paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;

        return view('roptrimestre/index_telefono',compact('obj_tabla','obj_param','obj_filtro'));
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
        $obj_tabla = new telefono();
        $obj_tabla = telefono::destroy($id);

        flash()->success('Registro Eliminado exitosamente');
        return "ok";
    }
}
