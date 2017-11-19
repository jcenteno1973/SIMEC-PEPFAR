<?php
    /**
     * Descripción: Relaciona la tabla de la base de datos con el modelo de datos
     * Fecha de modificación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use EntrustUserTrait;
    use Authenticatable, CanResetPassword;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'usuario_app';
    protected $fillable = [
        'email', 
        'nombre_usuario',
        'nombres_usuario',
        'apellidos_usuarios',
        'estado_usuario'
        ];
    protected $hidden = ['password'];
    protected $primaryKey = 'id_usuario_app';
    public $timestamps = false;
    //establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
    //y un rol lo pueden tener varios usuarios
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function scopeNombre_usuario($query,$nombre_usuario) {
        
        $query->where('nombre_usuario',"LIKE",'%'.$nombre_usuario.'%');
    }
    public function scopeId_rol_usuario($query,$role_id) {
        
        $query->where('role_id',$role_id);   
    }
    public function scopeEstado_usuario($query,$estado_usuario) {
        
      $query->where('estado_usuario',$estado_usuario);  
    }
}
