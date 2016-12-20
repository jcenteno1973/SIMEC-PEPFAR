<?php
/**
     * Fecha de modificación:25/11/2016
     * Modificado por: Juan Carlos Centeno Borja
     */
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\bitacoraController;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Routing\Controller;
//use Illuminate\Support\Facades\Input;

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
      $nombre_usuario = $request->nombre_usuario; // Input::get('nombre_usuario');
      $password = $request->password; //Input::get('password');
      $rules =array('password'=> array('min:8','max:25')); //reglas de validación
      $this->validate($request, $rules);//Realizar validación      
    if (Auth::attempt(['nombre_usuario' => $nombre_usuario, 'password' => $password]))
      {
       $obj_controller_bitacora=new bitacoraController();
       $obj_controller_bitacora->create();
       if(Auth::user()->estado_usuario==0)
       {
          Auth::logout();
          flash()->warning('Usuario bloqueado'); 
          return redirect('/');
       }
       return redirect('/principal');
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
