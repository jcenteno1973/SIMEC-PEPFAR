<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class catalogo extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'catalogo';
    protected $primaryKey = 'id_catalogo';
    public $timestamps = false;
    protected $fillable = [
        'nombre_catalogo',
        'desglose'
    ];
    public function scopeNombre_catalogo($query,$nombre) {
        //Filtro busqueda por nombre del catalogo
        $query->where('nombre_catalogo',"LIKE",'%'.$nombre.'%');
    }
}
