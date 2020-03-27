<?php
/**
     * Nombre del archivo:usuario_appController.php
     * Descripción:Contiene las funciones del controlador de usuarios
     * Fecha de creación:20/11/2017
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers;

use App\User;
use App\Role;
use Auth;
use App\Http\Controllers\bitacoraController;
use App\Models\region_sica;
use App\Models\hospital;
use App\Models\municipio;
use App\Models\laboratorios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Controllers\rol_usuarioController;
use App\Http\Controllers\RegionSicaController;
use Illuminate\Support\Facades\Input;
use DB;
//use Illuminate\Support\Facades\Request;

class usuario_appController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }
    
    public function fnc_reporte_usuarios(){
        //Generar reporte de archivos cargados
    $obj_controller_bitacora=new bitacoraController();
    $obj_controller_bitacora->create_mensaje('Reporte de usuarios generado');
    $reporte_generado=env('APP_REP').'pentaho/api/repos/%3Areporte_usuarios.prpt/viewer?userid='.env('PENTAHO_USER').'&password='.env('PENTAHO_PASS');    
    return view('usuario_app/reporte_usuarios',compact('reporte_generado'));
        
    }

    public function create(Request $request)
    {   /**    
         * Guarda en la base de datos un nuevo usuario
         */
        $obj_rol_usuario= new rol_usuarioController();
        $obj_region_sica = new RegionSicaController();
        $rules =array('password'=> array('min:8','max:25','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'),
                      'email'=>'unique:usuario_app',
                      'numero_dui'=>'digits:9|unique:usuario_app');        
        $this->validate($request, $rules);
        $date = Carbon::now();
        $usuario = new User();
        $usuario->email=$request->email;        
        $usuario->password=  bcrypt($request->password);
        $usuario->nombres_usuario=$request->nombres_usuario;
        $usuario->apellidos_usuario=$request->apellidos_usuario;
        $usuario->cambiar_contrasenia=1;
        $usuario->fecha_validez_contrasenia=$date->addMonth(3);
        $usuario->estado_usuario=1;
        $usuario->nombre_usuario=$this->fnc_nombre_usuario($request);
        $id_rol_usuario=$obj_rol_usuario->fnc_obtener_id($request->rol_usuario);
        $usuario->role_id=$id_rol_usuario;
        
        $usuario->id_region_sica = $request->id_region_sica;
        $usuario->id_hospital = $request->id_hospital;
        $usuario->id_laboratorios = $request->id_laboratorios;
        $usuario->id_municipio = $request->id_municipio;
        
        
        $usuario->save();
        $obj_rol_asignado= Role::find($id_rol_usuario);
        $usuario->attachRole($obj_rol_asignado);
        $obj_usuario=  User::find($usuario->id_usuario_app);
        $obj_controller_bitacora=new bitacoraController();
        $obj_controller_bitacora->create_mensaje('Creación de nuevo usuario: '.$obj_usuario->nombre_usuario);
        flash()->success('Usuario creado exitosamente: '.$obj_usuario->nombre_usuario);
        return redirect()->back(); 
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
        $obj_usuario=  User::nombre_usuario($request->get('nombre_usuario'))->id_rol_usuario($id_rol_usuario)->estado_usuario($request->estado_usuario)->paginate(10); 
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
        $obj_region_sica=  region_sica::all();
        $obj_select_hospital= hospital::all();
        $obj_select_laboratorios= laboratorios::all();
        $obj_select_municipio = municipio::where('kpif','=',1)->get();
        
        return view('usuario_app/create',
                compact('obj_role',
                        'obj_region_sica',
                        'obj_select_hospital',
                        'obj_select_laboratorios',
                        'obj_select_municipio'
                        ));
    }

    public function store()
    {  // Formulario para editar usuario     
       $obj_role= Role::all();
       $obj_inputs=Input::all();      
       $id_usuario_app=$obj_inputs['seleccionar'];
       $obj_usuario=User::find($id_usuario_app);
       
       return view('usuario_app/editar_usuario',compact(
               'obj_usuario',
               'obj_role'));     
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
        $obj_region_sica=  region_sica::all();
        $obj_select_hospital= hospital::all();
        $obj_inputs=Input::all();
        $obj_select_laboratorios= laboratorios::all();
        $obj_select_municipio = municipio::where('kpif','=',1)->get();
        
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
               'obj_region_sica',
               'obj_select_hospital',
               'obj_select_laboratorios',
               'obj_select_municipio'));
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
        $obj_usuario->save(); 
        flash()->success('Estado ha cambiado exitosamente');
       }
       return redirect()->back();          
        
    }
    public function fnc_user_cambiar_contra (){
        
       $obj_usuario= User::nombre_usuario(Auth::user()->nombre_usuario)->get();
       $id_usuario_app=$obj_usuario[0]->id_usuario_app;
       $obj_usuario=User::find($id_usuario_app);
       return view('usuario_app/cambiar_contrasenia',
               compact('obj_usuario' )); 
        
    }

    public function fnc_cambiar_contrasenia() {
        /**    
         * Crea formulario para cambiar la contraseña de un usuario
         */        
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
        $validar=0;
        $obj_rol_usuario= new rol_usuarioController();
        $obj_region_sica= new RegionSicaController();        
        $usuario = User::find($request->id_usuario_app);
        $validar_email=array('email'=>'unique:usuario_app');
        if($request->password!=''){
            $rules =array('password'=> array('min:8','max:25','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'));    
            $usuario->password=  bcrypt($request->password);
            if($usuario->email!=$request->email){
               $rules= array_merge($rules,$validar_email);
            }
            $validar=1; 
        }else{
            if($usuario->email!=$request->email){
               $rules= $validar_email;
               $validar=1;
                  }else
                   {
                    $validar=0;   
                   }
        }
            
        if($validar==1)
        { $this->validate($request, $rules); }
        
        $date = Carbon::now();
        $usuario->email=$request->email;  
        $usuario->nombres_usuario=$request->nombres_usuario;
        $usuario->apellidos_usuario=$request->apellidos_usuario;
        $usuario->cambiar_contrasenia=1;
        $usuario->fecha_validez_contrasenia=$date;
        $usuario->estado_usuario=$request->estado_usuario;
        $usuario->nombre_usuario=$request->nombre_usuario;
        
        $id_rol_usuario=$obj_rol_usuario->fnc_obtener_id($request->rol_usuario);
        $usuario->role_id=$id_rol_usuario; 
        
        $usuario->id_region_sica = $request->id_region_sica;
        $usuario->id_hospital = $request->id_hospital;
        $usuario->id_laboratorios = $request->id_laboratorios;
        $usuario->id_municipio = $request->id_municipio;
        
        $usuario->save();        
        $obj_rol_asignado= Role::find($id_rol_usuario);
        DB::table("role_user")->where("role_user.user_id",$request->id_usuario_app)->delete();    
        $usuario->attachRole($obj_rol_asignado);
        $obj_controller_bitacora=new bitacoraController();
        $obj_controller_bitacora->create_mensaje('Modificacion de usuario: '.$usuario->nombre_usuario);
        flash()->success('Modificación realizada exitosamente');
        return  redirect()->back(); 
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
