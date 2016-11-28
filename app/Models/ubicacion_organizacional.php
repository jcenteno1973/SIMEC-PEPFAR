<?php

/*
 * Nombre del archivo: ubicacion_organizacional.php
 * Descripción:
 * Fecha de creación:12/11/2016
 * Creado por: Juan Carlos Centeno Borja
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ubicacion_organizacional extends Model
{
    protected $table = 'ubicacion_organizacional';
    protected $primaryKey = 'id_ubicacion_org';
    public $timestamps = false;
    protected $fillable = [
        'codigo_unidad_dep',
        'nombre_unidad_dep',
        'nombre_responsable',
        'alquilado'
    ];
    
   //establecemos las relacion de uno a muchos con el modelo usuario_app, ya que una unidad o departamento  
   //lo pueden tener varios usuarios
    public function fnc_usuario_app()
    {
        return $this->hasMany('App\Models\usuario_app');
    }
}
