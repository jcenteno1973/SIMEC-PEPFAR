<?php
/*
 * Nombre del archivo: catalogo.php
 * Descripción: modelo para la tabla catalogos
 * Fecha de creación: Dic/2019
 * Creado por: 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class anio_semana extends Model
{
    protected $table = 'anio_semana';
    protected $primaryKey = 'id_anio_semana';
    public $timestamps = false;
    protected $fillable = [
        'id_anio',
        'id_semana',
        'id_periodo',
        'id_semana',
        'fec_inicio',
        'fec_fin',
    ];
    
    public function get_anio()
    { return $this->hasOne('App\Models\anio','id_anio', 'id_anio'); }
    
    public function getsemanatextoAttribute()
    { 
        $obj_dateIni = Carbon::instance(new \Datetime($this->fec_inicio))->format('d/m/Y');
        $obj_dateFin = Carbon::instance(new \Datetime($this->fec_fin))->format('d/m/Y');
        return $obj_dateIni . ' al '.$obj_dateFin;
    }
    
   
    
}
