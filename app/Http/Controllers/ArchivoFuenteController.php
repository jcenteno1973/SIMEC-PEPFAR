<?php
/*
 * Nombre del archivo: ArchivoFuenteController.php
 * Descripción: Controlador para la tabla archivo_fuente
 * Fecha de creación:19/11/2017
 * Creado por: Juan Carlos Centeno
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\archivo_fuente;
use App\Models\evento_epi;

class ArchivoFuenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function fnc_get_codigo($id) {
        $obj_codigo_archivo= archivo_fuente::fnc_archivo_fuentes($id);
        $codigo_archivo=$obj_codigo_archivo->lists('descripcion_archivo_fuente','id_archivo_fuente'); 
        $codigo_archivo[0]='Seleccionar';
        return $codigo_archivo;         
    }
    
    public function fnc_get_id($codigo){
        $obj_codigo_archivo=archivo_fuente::fnc_archivo_fuente_c($codigo);
        return $obj_codigo_archivo->id_archivo_fuente;        
    }
    public function fnc_buscar_af(Request $request){
        $obj_evento=  evento_epi::lists('nombre_evento','id_evento_epi');
        $obj_evento[0]="Seleccionar";
        if($request->evento==null){
         $request->evento=0;
         $obj_archivo_fuente=  archivo_fuente::paginate(10);  
        }else{
          if($request->evento==0 && $request->indicador==""){
           flash()->warning('Introducir al menos un criterio de busqueda');
           return redirect()->back();  
          }else{
              if($request->evento!=0 && $request->indicador!=""){
                $obj_archivo_fuente=  archivo_fuente::codigo($request->indicador)->id_evento($request->evento)->paginate(10);   
              }else{
               if($request->indicador==""){
                  $obj_archivo_fuente= archivo_fuente::id_evento($request->evento)->paginate(10); 
               } else{
                  $obj_archivo_fuente=  archivo_fuente::codigo($request->indicador)->paginate(10); 
               }  
              }
          }
        }
        
        return view('configuracion/buscar_archivo_fuente',
                    compact('obj_archivo_fuente','request','obj_evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
