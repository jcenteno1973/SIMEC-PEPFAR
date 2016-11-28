<?php

/*
 * Nombre del archivo: cargo_emp.php
 * Descripción:
 * Fecha de creación:12/11/2016
 * Creado por: Juan Carlos Centeno Borja
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class cargo_emp extends Model
{
    protected $table = 'cargo_emp';
    protected $primaryKey = 'id_cargo_emp';
    public $timestamps = false;
    protected $fillable = [
        'nombre_cargo'
    ];
    
   //establecemos las relacion de uno a muchos con el modelo usuario_app, ya que un cargo 
   //lo pueden tener varios usuarios
    public function fnc_usuario_app()
    {
        return $this->hasMany('App\Models\usuario_app');
    }
}
