<?php
/**
     * Fecha de modificación:26/01/2018
     * Modificado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\bitacoraController;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest', ['except' => 'fnc_salir']);
    }
   public function fnc_ingresar(Request $request)//Agregando request
    {
     /**     
     * Autenticación de usuario
     */
     //Trasforma el código de usuario en minusculas
     $nombre_usuario="";
     $cadena=$request->nombre_usuario; 
     for($i=0;$i<strlen($cadena);$i++){
     $resultado = intval(preg_replace('/[^0-9]+/', '', $cadena{$i}), 10);
     if($resultado==0){
     $nombre_usuario=$nombre_usuario.strtolower($cadena{$i});    
     }else{
     $nombre_usuario=$nombre_usuario.$resultado;    
     }
      }
      //Valida el password
      $password = $request->password; 
      $rules =array('password'=> array('min:8','max:25')); 
      $this->validate($request, $rules);//Realizar validación      
    if (Auth::attempt(['nombre_usuario' => $nombre_usuario, 'password' => $password,'estado_usuario'=>1]))
      {
       $obj_controller_bitacora=new bitacoraController();
       if(Auth::user()->estado_usuario==0)
       {
          $obj_controller_bitacora->create_mensaje('Usuario bloqueado');
          Auth::logout();
          flash()->warning('Usuario bloqueado'); 
          return redirect('/');
       }
       //Validar la fecha de caducida de la contraseña
       $date = Carbon::now();
       if(Auth::user()->fecha_validez_contrasenia<=$date->toDateString()){
         flash()->error('Validez de contraseña ha caducado, favor cambiarla');
         return redirect('/administracion/user_cambiar_contrasenia');
       }else{
         return redirect('/principal');
       }
       
      }
      flash()->warning('Usuario o contraseña no coincide');
      return redirect('/');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_usuario' => 'required|min:8|max:25',          
            'password' => 'required|confirmed|min:8|max:25',
        ]);
    }
    public function fnc_salir()
    {  
      
        Auth::logout();
        
        return redirect('/');
    }
    
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return usuario_app::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'password' =>bcrypt($data['password']),
        ]);
    }
}
