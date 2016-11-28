<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     */
use Zizaco\Entrust\EntrustPermission;
class Permission extends EntrustPermission
{
    protected $table = 'permiso_app';
    public $timestamps = false;
    protected $primaryKey = 'id_permiso_app';
    protected $fillable = [
        'nombre_permiso',
        'nombre_mostrar'
    ];
 
   //establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
   //lo pueden tener varios roles y un rol puede tener varios permisos
   public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
