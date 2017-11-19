<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Carbon\Carbon;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    
    use ResetsPasswords;
    protected $redirectTo = 'principal';
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function resetPassword($user,$password) {
      $date = Carbon::now();  
      $user->password=bcrypt($password);
      $user->fecha_validez_contrasenia=$date->addMonth(3);
      $user->save();
      \Illuminate\Support\Facades\Auth::login($user);
    }
}
