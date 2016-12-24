<?php
/**
     * Nombre del archivo: rol_usuario.php
     * Descripción:
     * Fecha de creación:24/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Controllers\bitacoraController;
use Carbon\Carbon;
use Auth;

class rol_usuarioController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
    }
     /**
     * 
     *
     * @return id del rol
     */
  
     public function fnc_obtener_id($param) {
    /**
     * Devuelve el id del rol que recibe como parametro
    */
         $id_rol_usuario=0;
         $obj_rol_usuario=  Role::all();
         foreach ($obj_rol_usuario as $obj_roles_usuarios){
           if($obj_roles_usuarios->nombre_rol==$param){
             $id_rol_usuario=$obj_roles_usuarios->id_rol_usuario;  
           }  
         }
         return $id_rol_usuario;
     }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {         
        return view('rol_usuario/nuevo_rol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /**
     * Crea un nuevo rol
    */
       $obj_rol_usuario= new Role();
       $date = Carbon::now();
       $rules =array('nombre_rol'=>'unique:rol_usuario');        
       $this->validate($request, $rules);
       $obj_rol_usuario->nombre_rol=$request->nombre_rol;
       $obj_rol_usuario->descripcion=$request->descripcion;
       $obj_rol_usuario->estado_registro=1;
       $obj_rol_usuario->fecha_hora_creacion=$date;      
       $obj_rol_usuario->save();
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create_mensaje('Crear rol: '.$obj_rol_usuario->nombre_rol);
       flash()->success('Rol '.$obj_rol_usuario->nombre_rol.' creado exitosamente ');
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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    /**
     * Crea formulario para editar rol
    */
       $obj_role=  Role::all();
       return view('rol_usuario/editar_rol', compact('obj_role'));
        
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
    /**
     * Guarda en la base de datos modificación de rol
    */
       if($request->rol_usuario=='')
       {
         flash()->warning('Seleccione un rol') ; 
         return redirect()->back();  
       }
      else {
        $id_rol_usuario=$this->fnc_obtener_id($request->rol_usuario);
        $obj_rol_usuario= Role::find($id_rol_usuario);
       if($request->nombre_rol!=$request->rol_usuario){ 
         $rules =array('nombre_rol'=>'unique:rol_usuario');        
         $this->validate($request, $rules);
         $obj_rol_usuario->nombre_rol=$request->nombre_rol;
         $obj_rol_usuario->descripcion=$request->descripcion;
         $obj_rol_usuario->save();
          $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create_mensaje('Modificar rol: '.$obj_rol_usuario->nombre_rol);
         flash()->success('Rol '.$obj_rol_usuario->nombre_rol.' modificado exitosamente');
         return redirect()->back(); 
       }
       else{
         $obj_rol_usuario->nombre_rol=$request->nombre_rol;
         $obj_rol_usuario->descripcion=$request->descripcion;
         $obj_rol_usuario->save();
          $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create_mensaje('Modificar rol: '.$obj_rol_usuario->nombre_rol);
         flash()->success('Rol '.$obj_rol_usuario->nombre_rol.' modificado exitosamente');
         return redirect()->back(); 
       }
       }      
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
