<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;
use Zizaco\Entrust\EntrustRole;
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
class Role extends EntrustRole
{
   protected $fillable = [
        'nombre_rol',
        'descripcion'
    ];
    protected $dates = ['deleted_at'];
    protected $table = 'rol_usuario';
    protected $primaryKey = 'role_id';
    public $timestamps = false;
   //establecemos las relacion de muchos a muchos con el modelo User, ya que un rol 
   //lo pueden tener varios usuarios y un usuario puede tener varios roles
   public function users(){
        return $this->belongsToMany('App\User');
    }
}
