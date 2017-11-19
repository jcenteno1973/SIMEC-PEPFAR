<?php
/*
 * Nombre del archivo: departamento.php
 * Descripción: modelo para la tabla departamento
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    //
    protected $table = 'departamento';
    protected $primaryKey = 'id_departamento';
    public $timestamps = false;
    protected $fillable = [
        'codigo_departamento',
        'nombre_departamento'
     ]; 
     public function municipios() {
         return $this->hasMany('municipio');
     }   
}
