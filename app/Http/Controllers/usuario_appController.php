<?php
/**
     * Nombre del archivo:usuario_appController.php
     * Descripción:
     * Fecha de creación:20/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use App\User;
use App\Role;
use Auth;
use App\Http\Controllers\bitacoraController;
use App\Models\ubicacion_organizacional;
use App\Models\cargo_emp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Controllers\rol_usuarioController;
use App\Http\Controllers\cargo_empController;
use App\Http\Controllers\ubicacion_orgController;
use Illuminate\Support\Facades\Input;
use DB;
//use Illuminate\Support\Facades\Request;

class usuario_appController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        
    }

    
    public function create(Request $request)
    {   /**    
         * Guarda en la base de datos un nuevo usuario
         */
        $obj_rol_usuario= new rol_usuarioController();
        $obj_cargo_emp= new cargo_empController();
        $obj_ubicacion_org= new ubicacion_orgController();
        $rules =array('password'=> array('min:8','max:25','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'),
                      'email'=>'unique:usuario_app',
                      'numero_dui'=>'digits:9|unique:usuario_app');        
        $this->validate($request, $rules);
        $date = Carbon::now();
        $usuario = new User();        
        $usuario->id_ubicacion_org =$obj_ubicacion_org->fnc_obtener_id($request->id_ubicacion_org);
        $usuario->id_cargo_emp=$obj_cargo_emp->fnc_obtener_id($request->cargo_emp);
        $usuario->email=$request->email;        
        $usuario->password=  bcrypt($request->password);
        $usuario->nombres_usuario=$request->nombres_usuario;
        $usuario->apellidos_usuario=$request->apellidos_usuario;
        $usuario->numero_dui=$request->numero_dui;
        $usuario->cambiar_contrasenia=1;
        $usuario->fecha_validez_contrasenia=$date->addMonth(3);
        $usuario->estado_usuario=1;
        $usuario->estado_registro=1;
        $usuario->id_usuario_crea=Auth::user()->id_usuario_app;
        $usuario->ip_dispositivo=$request->ip();
        $usuario->nombre_usuario=$this->fnc_nombre_usuario($request);
        $id_rol_usuario=$obj_rol_usuario->fnc_obtener_id($request->rol_usuario);
        $usuario->id_rol_usuario=$id_rol_usuario;
        $usuario->save();
        $obj_rol_asignado= Role::find($id_rol_usuario);
        $usuario->attachRole($obj_rol_asignado);
        $obj_usuario=  User::find($usuario->id_usuario_app);
        $obj_controller_bitacora=new bitacoraController();
        $obj_controller_bitacora->create_mensaje('cambio de contraseña de usuario: '.$obj_usuario->nombre_usuario);
        flash()->success('Usuario creado exitosamente: '.$obj_usuario->nombre_usuario);
        return redirect()->back(); 
        }
    public function fnc_show_buscar_usuario() {
        
    }
    
    public function fnc_filtro_buscar_usuario(Request $request) {
        /**    
         * Realiza busqueda de usuarios con filtros
         */
        $obj_rol_usuario= new rol_usuarioController();            
        $obj_role= Role::all();        
        if($request->estado_usuario!=1){
           $request->estado_usuario=0;           
        }else{
           $request->estado_usuario=1;            
        }   
        if($request->rol_usuario!=''){
        $id_rol_usuario=$obj_rol_usuario->fnc_obtener_id($request->rol_usuario);
        $obj_usuario=  User::nombre_usuario($request->get('nombre_usuario'))->id_rol_usuario($id_rol_usuario)->estado_usuario($request->estado_usuario)->paginate(5); 
        }
        else
        {
         $obj_usuario=  User::nombre_usuario($request->get('nombre_usuario'))->estado_usuario($request->estado_usuario)->paginate(10);    
        }
       
        return view('usuario_app/buscar_usuario',  compact('obj_usuario','obj_role'));
        
    }
    public function fnc_show_create() {
        /**    
         * Crea el formulario de nuevo usuario
         */
        $obj_role= Role::all();
        $obj_ubicacion_org=  ubicacion_organizacional::all();
        $obj_cargo_emp= cargo_emp::all();
        return view('usuario_app/create',
                compact('obj_role',
                'obj_cargo_emp',
                'obj_ubicacion_org'));
    }

   
    public function store()
    { 
             
        $obj_role= Role::all();
        $obj_ubicacion_org=  ubicacion_organizacional::all();
        $obj_cargo_emp= cargo_emp::all();
       $obj_inputs=Input::all();      
       $id_usuario_app=$obj_inputs['seleccionar'];
       $obj_usuario=User::find($id_usuario_app);      
       return view('usuario_app/editar_usuario',compact(
               'obj_usuario',
               'obj_role',
               'obj_cargo_emp',
               'obj_ubicacion_org'));     
    }

    
    public function show()
    {
        //Listado de usuarios
        $obj_role= Role::all();
        $obj_usuario=  User::paginate(10);        
        return view('usuario_app/buscar_usuario',  compact('obj_usuario','obj_role'));
    }

    
    public function edit()
    {      
        /**    
         * Crea el formulario para modificar un usuario
         */
        $obj_role= Role::all();
        $obj_ubicacion_org=  ubicacion_organizacional::all();
        $obj_cargo_emp= cargo_emp::all();
       $obj_inputs=Input::all();        
       if(sizeof($obj_inputs)==0)
       {
          flash()->warning('Seleccione un usuario') ;
          return redirect()->back();  
       }else
       {
         $id_usuario_app=$obj_inputs['seleccionar'];
       $obj_usuario=User::find($id_usuario_app);       
       return view('usuario_app/editar_usuario',compact(
               'obj_usuario',
               'obj_role',
               'obj_cargo_emp',
               'obj_ubicacion_org'));     
       }
         
        
    }
    public function fnc_cambiar_estado(Request $request) {
    
        /**    
         * Cambia el estado de un usuario
         */
       $obj_controller_bitacora=new bitacoraController();       
       if($request->resultado=='')
       {
           flash()->warning('Seleccione un usuario') ;
           
       }
       else
       {
         $id_usuario_app=$request->resultado;
       $obj_usuario=User::find($id_usuario_app);
        if($obj_usuario->estado_usuario==1)
        {
             $obj_usuario->estado_usuario=0;
             $obj_controller_bitacora->create_mensaje('Bloquear usuario: '.$obj_usuario->nombre_usuario);
        }  
        else {
           $obj_usuario->estado_usuario=1;
           $obj_controller_bitacora->create_mensaje('Activar usuario: '.$obj_usuario->nombre_usuario);
        }
        $obj_usuario->id_usuario_modifica=Auth::user()->id_usuario_app;
        $obj_usuario->ip_dispositivo=$request->ip();
        $obj_usuario->save(); 
        flash()->success('Estado ha cambiado exitosamente');
       }
       return redirect()->back();          
        
    }
    public function fnc_cambiar_contrasenia() {
        /**    
         * Crea formulario para cambiar la contraseña de un usuario
         */
        $obj_controller_bitacora=new bitacoraController();
        $obj_controller_bitacora->create();       
       $obj_inputs=Input::all(); 
     if($obj_inputs['resultado']=='')
     {
        flash()->warning('Seleccione un usuario') ; 
     }
     else
     {
     $id_usuario_app=$obj_inputs['resultado'];
       $obj_usuario=User::find($id_usuario_app);
       return view('usuario_app/cambiar_contrasenia',compact(
               'obj_usuario'
               ));     
     }
       
      return  redirect()->back(); 
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function fnc_guardar_contrasenia(Request $request) {
        /**    
         * Guarda en la base de datos la nueva contraseña del usuario
         */
        $usuario = User::find($request->id_usuario_app); 
        $rules =array('password'=> array('min:8','max:25','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'));   
        $this->validate($request, $rules);    
        $date = Carbon::now();
        $usuario->password=  bcrypt($request->password);        
        $usuario->cambiar_contrasenia=1;
        $usuario->fecha_validez_contrasenia=$date->addMonth(3);
        $usuario->id_usuario_modifica=Auth::user()->id_usuario_app;
        $usuario->ip_dispositivo=$request->ip();
        $usuario->save();
         $obj_controller_bitacora=new bitacoraController();
        $obj_controller_bitacora->create_mensaje('cambio de contraseña de usuario: '.$usuario->nombre_usuario);
        flash()->success('Cambio de contraseña realizado exitosamente');
        return  redirect()->back(); 
   }
    
    public function fnc_guardar_modificacion(Request $request)
    {   /**    
         * Guarda en la base de datos las modificaciones de un usuario
         */
        $obj_rol_usuario= new rol_usuarioController();
        $obj_cargo_emp= new cargo_empController();
        $obj_ubicacion_org= new ubicacion_orgController();        
        $usuario = User::find($request->id_usuario_app);
        $validar_email=array('email'=>'unique:usuario_app');
        $validar_dui=array('numero_dui'=>'digits:9|unique:usuario_app');
        if($request->password!=''){
            $rules =array('password'=> array('min:8','max:25','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'));    
            $usuario->password=  bcrypt($request->password);
            if($usuario->numero_dui!=$request->numero_dui){
              $rules= array_merge($rules,$validar_dui);
            }
            if($usuario->email!=$request->email){
               $rules= array_merge($rules,$validar_email);
            }
        $validar=1; 
        }
        else
        {
          if($usuario->numero_dui!=$request->numero_dui){
               $rules=$validar_dui;
              if($usuario->email!=$request->email){
               $rules= array_merge($rules,$validar_email);
               }
           $validar=1;
          } 
          else {
               if($usuario->email!=$request->email){
               $rules= $validar_email;
               $validar=1;
                  }else
                   {
                    $validar=0;   
                   }
               }    
        } 
        if($validar==1)
        {
           $this->validate($request, $rules);      
        } 
        $date = Carbon::now();               
        $usuario->id_ubicacion_org =$obj_ubicacion_org->fnc_obtener_id($request->id_ubicacion_org);
        $usuario->id_cargo_emp=$obj_cargo_emp->fnc_obtener_id($request->cargo_emp);
        $usuario->email=$request->email;  
        $usuario->nombres_usuario=$request->nombres_usuario;
        $usuario->apellidos_usuario=$request->apellidos_usuario;
        $usuario->numero_dui=$request->numero_dui;
        $usuario->cambiar_contrasenia=1;
        $usuario->fecha_validez_contrasenia=$date;
        $usuario->estado_usuario=$request->estado_usuario;
        $usuario->estado_registro=1;
        $usuario->id_usuario_modifica=Auth::user()->id_usuario_app;
        $usuario->ip_dispositivo=$request->ip();
        $usuario->nombre_usuario=$request->nombre_usuario;
        $id_rol_usuario=$obj_rol_usuario->fnc_obtener_id($request->rol_usuario);
        $usuario->id_rol_usuario=$id_rol_usuario;        
        $usuario->save();        
        $obj_rol_asignado= Role::find($id_rol_usuario);
        DB::table("role_user")->where("role_user.user_id",$request->id_usuario_app)->delete();    
        $usuario->attachRole($obj_rol_asignado);
        $obj_controller_bitacora=new bitacoraController();
        $obj_controller_bitacora->create_mensaje('Modificacion de usuario: '.$usuario->nombre_usuario);
        flash()->success('Modificación realizada exitosamente');
        return  redirect()->back(); 
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
       
    public function limpiar($String){
        /**
     *Descripción:Elimina los acentos, la ñ y caracteres especiales.
     *@author: https://coudlain.wordpress.com/2013/02/05/php-funcion-para-quitar-acentos-y-caracteres-especiales-by-estebannovo/
     */ 
    $String = str_replace(array('á','à','â','ã','ª','ä'),"a",$String);
    $String = str_replace(array('Á','À','Â','Ã','Ä'),"a",$String);
    $String = str_replace(array('Í','Ì','Î','Ï'),"i",$String);
    $String = str_replace(array('í','ì','î','ï'),"i",$String);
    $String = str_replace(array('é','è','ê','ë'),"e",$String);
    $String = str_replace(array('É','È','Ê','Ë'),"e",$String);
    $String = str_replace(array('ó','ò','ô','õ','ö','º'),"o",$String);
    $String = str_replace(array('Ó','Ò','Ô','Õ','Ö'),"o",$String);
    $String = str_replace(array('ú','ù','û','ü'),"u",$String);
    $String = str_replace(array('Ú','Ù','Û','Ü'),"u",$String);
    $String = str_replace(array('[','^','´','`','¨','~',']'),"",$String);
    $String = str_replace("ç","c",$String);
    $String = str_replace("Ç","c",$String);
    $String = str_replace("ñ","n",$String);
    $String = str_replace("Ñ","n",$String);
    $String = str_replace("Ý","y",$String);
    $String = str_replace("ý","y",$String);     
    $String = str_replace("&aacute;","a",$String);
    $String = str_replace("&Aacute;","a",$String);
    $String = str_replace("&eacute;","e",$String);
    $String = str_replace("&Eacute;","e",$String);
    $String = str_replace("&iacute;","i",$String);
    $String = str_replace("&Iacute;","i",$String);
    $String = str_replace("&oacute;","o",$String);
    $String = str_replace("&Oacute;","o",$String);
    $String = str_replace("&uacute;","u",$String);
    $String = str_replace("&Uacute;","u",$String);
    return $String;
}
   
    public function fnc_nombre_usuario(Request $request) {
        /**    
         * Crea el nombre de usaurio de la aplicación
         */
       $nombres=$request->nombres_usuario;
       $apellidos=$request->apellidos_usuario;
       //Obtener el primer nombre
       $pos      = strripos($nombres,' ' );
       if($pos){$nombres= substr($nombres,0, $pos);}
       //Obtener el primer apellido
       $pos      = strripos($apellidos,' ' );
       if($pos){$apellidos=  substr($apellidos, 0, $pos);}  
       $nombres=$this->limpiar($nombres);
       $apellidos=$this->limpiar($apellidos);
       //Convertir a minuscula
       $nombres=  strtolower($nombres);
       $apellidos=  strtolower($apellidos);
       $nombre_usuario=$nombres.$apellidos;
       return $nombre_usuario;        
        
       }
}
