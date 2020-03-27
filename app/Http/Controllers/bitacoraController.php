<?php
/**
     * Nombre del archivo:bitacoraController.php
     * Descripción:Controlador de la bitacora
     * Fecha de creación:20/11/2017
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bitacora;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use JasperPHP\JasperPHP;


class bitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        $this->middleware('auth');
    }
    public function fnc_show_parametros() {
      //Carga el formulario de los parametros
        $obj_bitacora=bitacora::orderBy('fecha_hora_transaccion','DESC')->paginate(10);
        
      return view('bitacora/consultar_bitacora',compact('obj_bitacora'));  
    }
    public function fnc_show_consultar_bitacora(Request $request) {

    //Genera el reporte de bitacora
    if($request->nombre_usuario=='')
    {

    }
    else
    {

    }
        $fecha_inicio=Carbon::createFromFormat('d/m/Y', $request->fecha_inicio);
        $fecha_fin=Carbon::createFromFormat('d/m/Y', $request->fecha_fin);
        
        $obj_bitacora=bitacora::
                //where(['id_usuario_app','=', 36])->
                whereRaw('DATE_FORMAT(fecha_hora_transaccion,"%Y-%m-%d") between DATE_FORMAT( ? ,"%Y-%m-%d") AND DATE_FORMAT( ? ,"%Y-%m-%d") ',[$fecha_inicio,$fecha_fin])->
                orderBy('fecha_hora_transaccion','DESC')->
                paginate(10);
        
        return view('bitacora/consultar_bitacora',compact('obj_bitacora'));
    }
    
    public function fnc_show_nuevo_bitacora()
    {
        return view('bitacora/nuevo_bitacora');
    }
    
    public function fnc_show_editar_bitacora($id)
    { 
        $obj_bitacora = new bitacora();
        
        $obj_bitacora = bitacora::find($id);
        $obj_usuario = user::all();
        
        return view('bitacora/editar_bitacora',compact('obj_bitacora','obj_usuario'));
    }
    
    public function fnc_delete($id)
    {
        flash()->success('Registro Eliminado exitosamente');
        return "ok"; //view('bitacora/nuevo_bitacora');
    }
    
    public function store(Request $request)
    {
    /**
     * Crea un nuevo rol
    */
        $obj_bitacora = new bitacora();
        $date = Carbon::now();
        
        $obj_bitacora->id_usuario_app=$request->id_usuario_app;
        $obj_bitacora->fecha_hora_transaccion=$date;
        $obj_bitacora->transaccion_realizada=$request->transaccion_realizada;
        $obj_bitacora->ip_dispositivo=$request->ip_dispositivo;

        $obj_bitacora->save();
        //$obj_controller_bitacora=new bitacoraController();
        //$obj_controller_bitacora->create_mensaje('Crear Bitacora: '.$obj_bitacora->id_bitacora);
        //flash()->success('bitacora '.$obj_bitacora->id_bitacora.' creado exítosamente ');
        flash()->success('Modificación realizada exitosamente');
        return redirect()->back();      
    }

    public function update(Request $request)
    {  
    /**
     * Guarda en la base de datos modificación de rol
    */
        $fecha_hora= Carbon::now();
        
        
        $obj_bitacora->id_usuario_app=$request->id_usuario_app;
        $obj_bitacora->fecha_hora_transaccion=$fecha_hora;
        $obj_bitacora->transaccion_realizada=$request->transaccion_realizada;
        $obj_bitacora->ip_dispositivo=$request->ip_dispositivo;
        $obj_bitacora->save();
        
        return redirect()->back();
    }
    
public function create_mensaje($mensajes)
    { 
    //Almacena la transacción en la base de datos
       $fecha_hora= Carbon::now();
       $obj_bitacora= new bitacora();
       $obj_bitacora->id_usuario_app=Auth::user()->id_usuario_app;
       $obj_bitacora->fecha_hora_transaccion=$fecha_hora;
       $obj_bitacora->transaccion_realizada=$mensajes;
       $obj_bitacora->ip_dispositivo=\Request::ip();
       $obj_bitacora->save();
    }
    
}
