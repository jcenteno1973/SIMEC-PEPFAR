<?php
/*
 * Nombre del archivo: fuente_financiamiento.php
 * Descripción: modelo para la tabla fuente_financiamiento
 * Fecha de creación:23/12/16
 * Creado por: Yamileth Campos
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fuente_financiamiento extends Model
{
    //
    protected $table = 'fuente_financiamiento';
    protected $primaryKey = 'id_fuente_financiamiento';
    public $timestamps = false;
    protected $fillable = [
        'codigo_fuente_financ',
        'nombre_fuente_financ'
    ]; 
        
}
