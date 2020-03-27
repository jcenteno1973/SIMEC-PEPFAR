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
    //protected $dates = ['deleted_at'];
    protected $table = 'bitacora';
    protected $primaryKey = 'id_bitacora';
    public $timestamps = false;
    protected $fillable = [
        'id_bitacora',
        'fecha_hora_transaccion',
        'id_usuario_app',
        'id_dispositivo',
        'transaccion_realizada'
    ];
    public function scopeNombre_mccl($query,$nombre) {
        //Filtro busqueda por nombre del catalogo
        $query->where('nombre',"LIKE",'%'.$nombre.'%');
    }
}
