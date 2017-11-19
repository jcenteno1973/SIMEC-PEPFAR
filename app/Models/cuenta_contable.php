<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cuenta_contable extends Model
{
 //
     protected $table = 'cuenta_contable';
    protected $primaryKey = 'id_cuenta_contable';
    public $timestamps = false;
    protected $fillable = [
        'cta_contable_activo_fijo',
        'cta_contable_depreciacion',
        'estado_registro',
        'id_usuario_crea',
        'id_usuario_modifica',
        'fecha_hora_creacion',
        'fecha_hora_modificacion',
        'ip_dispositivo'
    ];
    
   //establecemos las relacion de uno a muchos con el modelo usuario_app, ya que una unidad o departamento  
   //lo pueden tener varios usuarios
   /* public function fnc_usuario_app()
    {
        return $this->hasMany('App\Models\usuario_app');
    }*/
    //relacion con ficha
    public function fnc_ficha()
    {
        return $this->hasMany('App\Models\ficha');
    } 
    
    public function scope_codigo($query, $codigo)
    {
	if($codigo!="")
        {
            $query->where('cta_contable_activo_fijo',$codigo);
        }
            

    }
}
