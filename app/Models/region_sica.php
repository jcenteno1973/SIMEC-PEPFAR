<?php
/*
 * Nombre del archivo: region_sica.php
 * Descripción:Contiene los nombres de la región SICA
 * Fecha de creación:18/11/2017
 * Creado por: Juan Carlos Centeno Borja
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class region_sica extends Model
{
    protected $table = 'region_sica';
    protected $primaryKey = 'id_region_sica';
    public $timestamps = false;
    protected $fillable = [
        'codigo_pais',
        'nombre_pais'
    ];
    //
    //establecemos las relacion de uno a muchos con el modelo usuario_app, ya que un pais 
   //lo pueden tener varios usuarios
    public function fnc_usuario_app()
    {
        return $this->hasMany('App\User');
    }
}
