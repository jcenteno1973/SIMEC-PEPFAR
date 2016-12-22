<?php
/**
     * Nombre del archivo: .php
     * Descripción:
     * Fecha de creación:25/11/2016
     * Creado por: Juan Carlos Centeno Borja
     *
     * Modificado por: Karla Barrera 
     * Fecha modificación: 20/12/2016
     * Descripción: Ruta para buscar catálogo
     */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ubicacion_organizacional;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ubicacion_orgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //   return view('home');
        $ubicacion_org = ubicacion_organizacional::_buscar($request->get('codigo_unidad_dep'))->orderBy('id_ubicacion_org', 'ASC')->paginate(20);
        return view('catalogos/ubicacion_organizacional/buscar_ubicacion_org', compact('ubicacion_org'));
    }
    public function fnc_busqueda_filtro(Request $request) {
      return view('home');
    }
    /**
     * 
     */
    public function fnc_obtener_id($param) {
        $id_ubicacion_org=0;
        $obj_ubicacion_org= ubicacion_organizacional::all();
        foreach ($obj_ubicacion_org as $obj_ubicaciones_org){
        if($obj_ubicaciones_org->nombre_unidad_dep==$param){
          $id_ubicacion_org=$obj_ubicaciones_org->id_ubicacion_org;  
        }    
        }
       return $id_ubicacion_org; 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('home');
                return view('catalogos/ubicacion_organizacional/nueva_ubicacion_org');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return view('home');
        /*$ubicacion= new ubicacion_organizacional($request->all());*/
        $date = Carbon::now();
        $ubicacion= new ubicacion_organizacional();
        $ubicacion->codigo_unidad_dep=$request->codigo_unidad_dep;
        $ubicacion->nombre_unidad_dep=$request->nombre_unidad_dep;
        $ubicacion->nombre_responsable=$request->nombre_responsable;
        $ubicacion->alquilado=$request->alquilado;
        $ubicacion->estado_registro=$request->estado_registro;
        $ubicacion->fecha_hora_creacion=$date; 
        $ubicacion->save();
        return redirect()->route('administracion.buscar_ubicacion.index');
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
    public function fnc_show_catalogos() {
        
         return view('home'); 
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
        $ubicacion= ubicacion_organizacional::find($id);
         //dd($ubicacion);
        return view('catalogos/ubicacion_organizacional/editar_ubicacion_org')->with('ubicacion',$ubicacion);
    }

    public function fnc_guardar_modificacion(Request $request) {
        
        return view('home');
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
        //return view('home');
        $date = Carbon::now();
        $ubicacion= ubicacion_organizacional::find($id);
        $ubicacion->codigo_unidad_dep=$request->codigo_unidad_dep;
        $ubicacion->nombre_unidad_dep=$request->nombre_unidad_dep;
        $ubicacion->nombre_responsable=$request->nombre_responsable;
        $ubicacion->alquilado=$request->alquilado;
        $ubicacion->estado_registro=$request->estado_registro;
        $ubicacion->fecha_hora_modificacion=$date;
        $ubicacion->save();
        return redirect()->route('administracion.buscar_ubicacion.index');
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
