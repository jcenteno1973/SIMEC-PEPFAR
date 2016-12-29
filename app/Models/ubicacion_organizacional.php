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
        'dentro_inmueble',
        'alquilado'
    ];
    
   //establecemos las relacion de uno a muchos con el modelo usuario_app, ya que una unidad o departamento  
   //lo pueden tener varios usuarios
    public function fnc_usuario_app()
    {
        return $this->hasMany('App\Models\usuario_app');
    }
    
    public function scope_buscar($query, $codigo_unidad_dep) {
         if (trim($codigo_unidad_dep) !="")
            {
                $query->where('codigo_unidad_dep',"LIKE","%$codigo_unidad_dep%");
            }
    }
    
    public function scope_buscar_u_dpto($query, $nombre_unidad_dep) {
         if (trim($nombre_unidad_dep)!="")
            {
                $query->where('nombre_unidad_dep', "LIKE","%$nombre_unidad_dep%");
            }
    }

    public function scope_buscar_responsable($query, $nombre_responsable) {
         if (trim($nombre_responsable) !="")
            {
                $query->where('nombre_responsable', "LIKE","%$nombre_responsable%");
            }
    } 
}
