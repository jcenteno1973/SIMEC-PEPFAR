<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ficha;
use App\Models\departamento;
use App\Models\municipio;
use App\Models\ubicacion_organizacional;
use App\Models\clase_bien;
use App\Models\fuente_financiamiento;
use App\Models\tipo_bien_mueble;
use App\Models\cuenta_contable;
use App\Models\estado_af;
use App\Models\lista_color;
use App\Models\lista_codigo;
use Carbon\Carbon;
use App\Http\Controllers\bitacoraController;
use App\Models\documento_imagen;
use App\Models\tipo_bien_inmueble;
use App\Models\ubicacion_bien;
use App\Models\tipo_doc_propiedad;
use App\Models\tipo_inventario;
use DB;


class fichaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function fnc_create_mueble() {
    /**
    * Crea formulario para crear nueva ficha de mueble
     */  
     $departamentos=  departamento::lists('nombre_departamento','id_departamento');     
     $clase_bien=  clase_bien::lists('nombre_clase_bien','id_clase_bien');
     $fuente_financiamiento=  fuente_financiamiento::lists('nombre_fuente_financ','id_fuente_financiamiento');
     $tipo_bien=  tipo_bien_mueble::lists('nombre_tipo_bien_mueble','id_tipo_bien_mueble');
     $cuenta_contable=  cuenta_contable::all();
     $obj_unidad=  ubicacion_organizacional::all();
     $estado_af=  estado_af::lists('nombre_estado','id_estado');
     $lista_color=  lista_color::lists('desc_color','id_lista_color');
     $obj_municipios= municipio::fnc_municipios(6);
     $municipios=$obj_municipios->lists('nombre_municipio','id_municipio');
     return view('ficha/nueva_ficha_mueble',compact('departamentos',
             'municipios',
             'clase_bien',
             'fuente_financiamiento',
             'tipo_bien',
             'cuenta_contable',
             'estado_af',
             'lista_color',
             'obj_unidad'));  
        
    }
    public function fnc_create_inmueble() {
     /**
    * Crea formulario para crear nueva ficha de inmueble
     */
     $departamentos=  departamento::lists('nombre_departamento','id_departamento');     
     $clase_bien=  clase_bien::lists('nombre_clase_bien','id_clase_bien');
     $fuente_financiamiento=  fuente_financiamiento::lists('nombre_fuente_financ','id_fuente_financiamiento');     
     $tipo_bien=tipo_bien_inmueble::lists('nombre_tipo_bien_inmueble','id_tipo_bien_inmueble');
     $tipo_documento=  tipo_doc_propiedad::lists('nombre_tipo_documento','id_tipo_doc_propiedad');
     $cuenta_contable=  cuenta_contable::all();
     $obj_unidad=  ubicacion_organizacional::all();
     $ubicacion_bien=  ubicacion_bien::lists('nombre_ubicacion_bien','id_ubicacion_bien');     
     $obj_municipios= municipio::fnc_municipios(6);
     $municipios=$obj_municipios->lists('nombre_municipio','id_municipio');
     return view('ficha/nueva_ficha_inmueble',compact('departamentos',
             'municipios',
             'clase_bien',
             'fuente_financiamiento',
             'tipo_bien',
             'cuenta_contable',
             'ubicacion_bien',
             'tipo_documento',             
             'obj_unidad'));  
        
    }
    public function fnc_create_vehiculo() {
    /**
    * Crea formulario para crear nueva ficha de vehiculo
    */  
     $departamentos=  departamento::lists('nombre_departamento','id_departamento');     
     $clase_bien=  clase_bien::lists('nombre_clase_bien','id_clase_bien');
     $fuente_financiamiento=  fuente_financiamiento::lists('nombre_fuente_financ','id_fuente_financiamiento');
     $tipo_bien=  tipo_bien_mueble::lists('nombre_tipo_bien_mueble','id_tipo_bien_mueble');
     $cuenta_contable=  cuenta_contable::all();
     $obj_unidad=  ubicacion_organizacional::all();
     $estado_af=  estado_af::lists('nombre_estado','id_estado');
     $lista_color=  lista_color::lists('desc_color','id_lista_color');
     $obj_municipios= municipio::fnc_municipios(6);
     $municipios=$obj_municipios->lists('nombre_municipio','id_municipio');
     return view('ficha/nueva_ficha_vehiculo',compact('departamentos',
             'municipios',
             'clase_bien',
             'fuente_financiamiento',
             'tipo_bien',
             'cuenta_contable',
             'estado_af',
             'lista_color',
             'obj_unidad'));  
        
    }
    public function fnc_store_inmueble(Request $request) {
     
     $obj_controller_bitacora=new bitacoraController();     
     if($_FILES['file']['error']==1){
          $obj_controller_bitacora->create_mensaje('No se puede cargar el archivo: '.$_FILES['file']['name']); 
           $errors='No se puede cargar el archivo: '.$_FILES['file']['name'];
          return redirect()->back()->withInput()->withErrors($errors);
       } 
       else
       {
           $id_ficha_af=$this->fnc_store_ficha_in($request);
           $codigo_inventario= $this->fnc_store_codigo_inmueble($request, $id_ficha_af);
           $obj_controller_bitacora->create_mensaje('Creación de nueva ficha: '.$codigo_inventario->codigo_inventario);
           if($_FILES['file']['name']=='')
           {
          flash()->success('Ficha creada exitosamente con el código de inventario:'.$codigo_inventario->codigo_inventario);
          return redirect()->back();  
           }
           else
           {
            $this->fnc_guardar_documento($request,$id_ficha_af);            
            flash()->success('Ficha creada exitosamente con el código de inventario:'.$codigo_inventario->codigo_inventario);
            return redirect()->back();  
           }
       }
    
    }
    
     public function fnc_store_vehiculo(Request $request) {
    /**
     * Guarda en la base de datos una nueva ficha de vehiculo
     *          
     */ 
     $obj_controller_bitacora=new bitacoraController();     
       if($_FILES['file']['error']==1){
         $obj_controller_bitacora->create_mensaje('No se puede cargar el archivo: '.$_FILES['file']['name']);           
         $errors='No se puede cargar el archivo: '.$_FILES['file']['name'];
          return redirect()->back()->withInput()->withErrors($errors);
       } 
       else
       {
         //Crear ficha    
         $id_ficha_af=$this->fnc_store_ficha_v($request);
        //Crear código
        $codigo_inventario=$this->fnc_store_codigo_mueble($request,$id_ficha_af);        
        $obj_controller_bitacora->create_mensaje('Creación de nueva ficha: '.$codigo_inventario->codigo_inventario);
           if($_FILES['file']['name']=='')
           {
          flash()->success('Ficha creada exitosamente con el código de inventario:'.$codigo_inventario->codigo_inventario);
          return redirect()->back();  
           }
           else
           {
            $this->fnc_guardar_archivo($request,$id_ficha_af);            
            flash()->success('Ficha creada exitosamente con el código de inventario:'.$codigo_inventario->codigo_inventario);
            return redirect()->back();  
           }
       }
    }
    public function fnc_store_mueble(Request $request) {
    /**
     * Guarda en la base de datos una nueva ficha de mueble
     *          
     */ 
     $obj_controller_bitacora=new bitacoraController();
     
       if($_FILES['file']['error']==1){
         $obj_controller_bitacora->create_mensaje('No se puede cargar el archivo: '.$_FILES['file']['name']);           
         $errors='No se puede cargar el archivo: '.$_FILES['file']['name'];
          return redirect()->back()->withInput()->withErrors($errors);
       } 
       else
       {
         //Crear ficha    
         $id_ficha_af=$this->fnc_store_ficha_m($request);
        //Crear código
        $codigo_inventario=$this->fnc_store_codigo_mueble($request,$id_ficha_af);        
        $obj_controller_bitacora->create_mensaje('Creación de nueva ficha: '.$codigo_inventario->codigo_inventario);
           if($_FILES['file']['name']=='')
           {
          flash()->success('Ficha creada exitosamente con el código de inventario:'.$codigo_inventario->codigo_inventario);
          return redirect()->back();  
           }
           else
           {
            $this->fnc_guardar_archivo($request,$id_ficha_af);            
            flash()->success('Ficha creada exitosamente con el código de inventario:'.$codigo_inventario->codigo_inventario);
            return redirect()->back();  
           }
       }
    }
    public function fnc_store_codigo_mueble($request,$id_ficha_af) {
     //Crea el código de inventario
     $obj_codigo= new lista_codigo();
     $codigo_departamento=  departamento::find($request->departamento);    
     $codigo_municipio=  municipio::find($request->municipio);
     $codigo_unidad=  ubicacion_organizacional::find($request->id_ubicacion_org);
     $codigo_fondos=  fuente_financiamiento::find($request->id_fuente_financiamiento);
     $codigo_bienes=  tipo_bien_mueble::find($request->id_tipo_bien_mueble);
     $referencia=$codigo_unidad->dentro_inmueble;
     $codigo_inventario=$codigo_departamento->codigo_departamento.'-'
             .$codigo_municipio->codigo_municipio.' ('
             .$codigo_unidad->codigo_unidad_dep.') 1-' 
             .$codigo_fondos->codigo_fuente_financ.'-' 
             .$codigo_bienes->codigo_tipo_bien_mueble;
     if($referencia==1)
     {
       $codigo_inventario=$codigo_inventario.' ' ; 
     }
     else
     {
       $codigo_inventario=$codigo_inventario.'/' ;  
     }
   
    $obj_listado=  lista_codigo::where('id_tipo_bien_mueble',$request->id_tipo_bien_mueble)->where('id_ubicacion_org',$request->id_ubicacion_org)->orderBy('correlativo','desc')->get();
   
    if($obj_listado->count()==0)
    {
       $correlativo=1; 
    }
    else
    {
       $correlativo=$obj_listado[0]->correlativo+1; 
    }
    if ($codigo_unidad->alquilado==0)
    {
    if($correlativo<10)
    {
       $codigo_inventario=$codigo_inventario.'0'.$correlativo;
    }
    else
    {
       $codigo_inventario=$codigo_inventario.$correlativo; 
    } 
    }
     $obj_codigo->id_fuente_financiamiento=$request->id_fuente_financiamiento;
     $obj_codigo->id_clase_bien=1;
     $obj_codigo->id_ficha_activo_fijo=$id_ficha_af;
     $obj_codigo->id_municipio=$request->municipio;
     $obj_codigo->id_ubicacion_org=$request->id_ubicacion_org;
     $obj_codigo->id_tipo_bien_mueble=$request->id_tipo_bien_mueble;
     $obj_codigo->correlativo=$correlativo;
     $obj_codigo->codigo_inventario =$codigo_inventario;
     $obj_codigo->estado_codigo=1;
     $obj_codigo->save();
     return $obj_codigo;
    }
     public function fnc_store_codigo_inmueble($request,$id_ficha_af) {
     //Crea el código de inventario
     $obj_codigo= new lista_codigo();
     $codigo_departamento=  departamento::find($request->departamento);    
     $codigo_municipio=  municipio::find($request->municipio);
     $codigo_unidad=  ubicacion_organizacional::find($request->id_ubicacion_org);
     $codigo_fondos=  fuente_financiamiento::find($request->id_fuente_financiamiento);
     $codigo_bienes=  tipo_bien_inmueble::find($request->id_tipo_bien_inmueble);
     $codigo_ubicacion= ubicacion_bien::find($request->id_ubicacion_bien);
     $codigo_inventario=$codigo_departamento->codigo_departamento.'-'
             .$codigo_municipio->codigo_municipio.' ('
             .$codigo_unidad->codigo_unidad_dep.')-2-' 
             .$codigo_fondos->codigo_fuente_financ.'-' 
             .$codigo_ubicacion->codigo_ubicacion_bien.'-'
             .$codigo_bienes->codigo_tipo_bien_inmueble.'-';      
    $obj_listado=  lista_codigo::where('id_tipo_bien_inmueble',$request->id_tipo_bien_inmueble)->where('id_ubicacion_org',$request->id_ubicacion_org)->orderBy('correlativo','desc')->get();
   
    if($obj_listado->count()==0)
    {
       $correlativo=1; 
    }
    else
    {
       $correlativo=$obj_listado[0]->correlativo+1; 
    }
    if ($codigo_unidad->alquilado==0)
    {
    if($correlativo<10)
    {
       $codigo_inventario=$codigo_inventario.'0'.$correlativo;
    }
    else
    {
       $codigo_inventario=$codigo_inventario.$correlativo; 
    } 
    }
     $obj_codigo->id_fuente_financiamiento=$request->id_fuente_financiamiento;
     $obj_codigo->id_clase_bien=2;
     $obj_codigo->id_ficha_activo_fijo=$id_ficha_af;
     $obj_codigo->id_municipio=$request->municipio;
     $obj_codigo->id_ubicacion_org=$request->id_ubicacion_org;
     $obj_codigo->id_tipo_bien_inmueble=$request->id_tipo_bien_inmueble;
     $obj_codigo->correlativo=$correlativo;
     $obj_codigo->codigo_inventario =$codigo_inventario;
     $obj_codigo->estado_codigo=1;
     $obj_codigo->save();
     return $obj_codigo;
    }
     public function fnc_store_ficha_v($request) {
     //Guarda en la base de datos una nueva ficha vehiculo
     $fecha_adquisicio=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);   
     $obj_ficha=  new ficha();
     $obj_ficha->id_lista_color=$request->id_lista_color;
     $obj_ficha->id_estado=$request->id_estado;
     $obj_ficha->id_cuenta_contable=$request->id_cuenta_contable;
     $obj_ficha->id_tipo_inventario=2;
     $obj_ficha->responsable_bien =$request->responsable_bien;
     $obj_ficha->descripcion=$request->descripcion;
     $obj_ficha->marca_bien=$request->marca_bien;
     $obj_ficha->modelo_bien=$request->modelo_bien;
     $obj_ficha->placa_bien=$request->placa_bien;
     $obj_ficha->numero_vin_chasis=$request->numero_vin_chasis;
     $obj_ficha->numero_motor=$request->numero_motor;
     $obj_ficha->anio_bien=$request->anio_bien;
     $obj_ficha->numero_equipo=$request->numero_equipo;
     $obj_ficha->numero_factura=$request->numero_factura;
     $obj_ficha->observacion=$request->observacion;
     $obj_ficha->anios_vida_util=$request->anios_vida_util;
     $obj_ficha->fecha_adquisicion=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);
     $obj_ficha->fin_vida_util=$fecha_adquisicio->addYears($request->anios_vida_util);
     $obj_ficha->monto_adquisicion=$request->monto_adquisicion;
     $obj_ficha->estado_ficha=1;
     $obj_ficha->id_usuario_crea=Auth::user()->id_usuario_app;
     $obj_ficha->ip_dispositivo=$request->ip();
     $obj_ficha->save();     
     return $obj_ficha->id_ficha_activo_fijo;
    }
     public function fnc_store_ficha_m($request) {
     //Guarda en la base de datos una nueva ficha mueble
     $fecha_adquisicio=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);   
     $obj_ficha=  new ficha();
     $obj_ficha->id_lista_color=$request->id_lista_color;
     $obj_ficha->id_estado=$request->id_estado;
     $obj_ficha->id_cuenta_contable=$request->id_cuenta_contable;
     $obj_ficha->id_tipo_inventario=1;
     $obj_ficha->responsable_bien =$request->responsable_bien;
     $obj_ficha->descripcion=$request->descripcion;
     $obj_ficha->marca_bien=$request->marca_bien;
     $obj_ficha->modelo_bien=$request->modelo_bien;
     $obj_ficha->serie_bien=$request->serie_bien;
     $obj_ficha->numero_factura=$request->numero_factura;
     $obj_ficha->observacion=$request->observacion;
     $obj_ficha->anios_vida_util=$request->anios_vida_util;
     $obj_ficha->fecha_adquisicion=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);
     $obj_ficha->fin_vida_util=$fecha_adquisicio->addYears($request->anios_vida_util);
     $obj_ficha->monto_adquisicion=$request->monto_adquisicion;
     $obj_ficha->estado_ficha=1;
     $obj_ficha->id_usuario_crea=Auth::user()->id_usuario_app;
     $obj_ficha->ip_dispositivo=$request->ip();
     $obj_ficha->save();     
     return $obj_ficha->id_ficha_activo_fijo;
    }
     public function fnc_store_ficha_in($request) {
     //Guarda en la base de datos una nueva ficha inmueble
     $fecha_adquisicio=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);   
     $obj_ficha=  new ficha();
     $obj_ficha->id_tipo_doc_propiedad=$request->id_tipo_doc_propiedad;
     $obj_ficha->numero_registro_propiedad=$request->numero_registro_propiedad;
     $obj_ficha->id_cuenta_contable=$request->id_cuenta_contable;
     $obj_ficha->id_tipo_inventario=3;
     $obj_ficha->responsable_bien =$request->responsable_bien;
     $obj_ficha->descripcion=$request->descripcion;
     $obj_ficha->inscrita_registro=$request->inscrita_registro;     
     $obj_ficha->observacion=$request->observacion;
     $obj_ficha->anios_vida_util=$request->anios_vida_util;
     $obj_ficha->fecha_adquisicion=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);
     $obj_ficha->fin_vida_util=$fecha_adquisicio->addYears($request->anios_vida_util);
     $obj_ficha->monto_adquisicion=$request->monto_adquisicion;
     $obj_ficha->estado_ficha=1;
     $obj_ficha->id_usuario_crea=Auth::user()->id_usuario_app;
     $obj_ficha->ip_dispositivo=$request->ip();
     $obj_ficha->save();     
     return $obj_ficha->id_ficha_activo_fijo;
    }
    public function fnc_guardar_archivo($request,$id_ficha_af) {
     /**
     * Guarda archivo en el servidor
     *          
     */
       $obj_documento = new documento_imagen();
      //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       $nombre_archivo=time().$nombre; 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('imagenes/'.$nombre_archivo,  \File::get($file));
       $obj_documento->id_ficha_activo_fijo=$id_ficha_af;
       $obj_documento->nombre_archivo=$nombre_archivo;
       $obj_documento->url_doc_img='storage/imagenes';
       $obj_documento->id_usuario_crea=Auth::user()->id_usuario_app;
       $obj_documento->ip_dispositivo=$request->ip();
       $obj_documento->fecha_hora_creacion=  Carbon::now(); 
       $obj_documento->save();
    }
    public function fnc_guardar_documento($request,$id_ficha_af) {
     /**
     * Guarda archivo en el servidor
     *          
     */
       $obj_documento = new documento_imagen();
      //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       $nombre_archivo=time().$nombre; 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put('documentos/'.$nombre_archivo,  \File::get($file));
       $obj_documento->id_ficha_activo_fijo=$id_ficha_af;
       $obj_documento->nombre_archivo=$nombre_archivo;
       $obj_documento->url_doc_img='storage/documentos';
       $obj_documento->id_usuario_crea=Auth::user()->id_usuario_app;
       $obj_documento->ip_dispositivo=$request->ip();
       $obj_documento->fecha_hora_creacion=  Carbon::now(); 
       $obj_documento->save();
    }
    public function store(Request $request)
    {
        //Primero crear el codigo de inventario
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {     
      $obj_inventario= tipo_inventario::all();
      $obj_unidad=  ubicacion_organizacional::all();      
      if($request->codigo_inventario==''&&$request->id_ubicacion_org==''&&$request->id_tipo_inventario=='')
     {
        $lista_codigo= DB::table('lista_codigo')              
              ->join('ficha_activo_fijo', 'lista_codigo.id_ficha_activo_fijo', '=', 'ficha_activo_fijo.id_ficha_activo_fijo')
              ->join('ubicacion_organizacional','lista_codigo.id_ubicacion_org','=','ubicacion_organizacional.id_ubicacion_org')
              ->select('lista_codigo.id_ficha_activo_fijo','lista_codigo.codigo_inventario','ficha_activo_fijo.descripcion','ubicacion_organizacional.nombre_unidad_dep')
              ->whereNull('lista_codigo.deleted_at')
              ->simplePaginate(10);
     }    
    
     if($request->codigo_inventario!=''&&$request->id_ubicacion_org!=''&&$request->id_tipo_inventario!='')
      {
      $lista_codigo= DB::table('lista_codigo')              
              ->join('ficha_activo_fijo', 'lista_codigo.id_ficha_activo_fijo', '=', 'ficha_activo_fijo.id_ficha_activo_fijo')
              ->join('ubicacion_organizacional','lista_codigo.id_ubicacion_org','=','ubicacion_organizacional.id_ubicacion_org')
              ->select('lista_codigo.id_ficha_activo_fijo','lista_codigo.codigo_inventario','ficha_activo_fijo.descripcion','ubicacion_organizacional.nombre_unidad_dep')
              ->whereNull('lista_codigo.deleted_at')
              ->where('lista_codigo.codigo_inventario',"LIKE",'%'.$request->codigo_inventario.'%')
              ->where('lista_codigo.id_ubicacion_org',$request->id_ubicacion_org)
              ->where('ficha_activo_fijo.id_tipo_inventario',$request->id_tipo_inventario)
              ->simplePaginate(10);  
      }
      if($request->codigo_inventario!=''&&$request->id_ubicacion_org==''&&$request->id_tipo_inventario=='')
      {
      $lista_codigo= DB::table('lista_codigo')              
              ->join('ficha_activo_fijo', 'lista_codigo.id_ficha_activo_fijo', '=', 'ficha_activo_fijo.id_ficha_activo_fijo')
              ->join('ubicacion_organizacional','lista_codigo.id_ubicacion_org','=','ubicacion_organizacional.id_ubicacion_org')
              ->select('lista_codigo.id_ficha_activo_fijo','lista_codigo.codigo_inventario','ficha_activo_fijo.descripcion','ubicacion_organizacional.nombre_unidad_dep')
              ->whereNull('lista_codigo.deleted_at')
              ->where('lista_codigo.codigo_inventario',"LIKE",'%'.$request->codigo_inventario.'%')              
              ->simplePaginate(10);  
      }
      if($request->codigo_inventario==''&&$request->id_ubicacion_org!=''&&$request->id_tipo_inventario!='')
      {
      $lista_codigo= DB::table('lista_codigo')              
              ->join('ficha_activo_fijo', 'lista_codigo.id_ficha_activo_fijo', '=', 'ficha_activo_fijo.id_ficha_activo_fijo')
              ->join('ubicacion_organizacional','lista_codigo.id_ubicacion_org','=','ubicacion_organizacional.id_ubicacion_org')
              ->select('lista_codigo.id_ficha_activo_fijo','lista_codigo.codigo_inventario','ficha_activo_fijo.descripcion','ubicacion_organizacional.nombre_unidad_dep')
              ->whereNull('lista_codigo.deleted_at')             
              ->where('lista_codigo.id_ubicacion_org',$request->id_ubicacion_org)
              ->where('ficha_activo_fijo.id_tipo_inventario',$request->id_tipo_inventario)
              ->simplePaginate(10);  
      }
      if($request->codigo_inventario==''&&$request->id_ubicacion_org==''&&$request->id_tipo_inventario!='')
      {
      $lista_codigo= DB::table('lista_codigo')              
              ->join('ficha_activo_fijo', 'lista_codigo.id_ficha_activo_fijo', '=', 'ficha_activo_fijo.id_ficha_activo_fijo')
              ->join('ubicacion_organizacional','lista_codigo.id_ubicacion_org','=','ubicacion_organizacional.id_ubicacion_org')
              ->select('lista_codigo.id_ficha_activo_fijo','lista_codigo.codigo_inventario','ficha_activo_fijo.descripcion','ubicacion_organizacional.nombre_unidad_dep')
              ->whereNull('lista_codigo.deleted_at')
              ->where('ficha_activo_fijo.id_tipo_inventario',$request->id_tipo_inventario)
              ->simplePaginate(10);  
      }
      if($request->codigo_inventario==''&&$request->id_ubicacion_org!=''&&$request->id_tipo_inventario=='')
      {
      $lista_codigo= DB::table('lista_codigo')              
              ->join('ficha_activo_fijo', 'lista_codigo.id_ficha_activo_fijo', '=', 'ficha_activo_fijo.id_ficha_activo_fijo')
              ->join('ubicacion_organizacional','lista_codigo.id_ubicacion_org','=','ubicacion_organizacional.id_ubicacion_org')
              ->select('lista_codigo.id_ficha_activo_fijo','lista_codigo.codigo_inventario','ficha_activo_fijo.descripcion','ubicacion_organizacional.nombre_unidad_dep')
              ->whereNull('lista_codigo.deleted_at')             
              ->where('lista_codigo.id_ubicacion_org',$request->id_ubicacion_org)              
              ->simplePaginate(10);  
      }
      
      return view('ficha/buscar_ficha',  compact('lista_codigo','obj_inventario','obj_unidad')); 
        
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
    public function fnc_update_inmueble(Request $request) {
       
        $obj_controller_bitacora=new bitacoraController();     
     if($_FILES['file']['error']==1){
          $obj_controller_bitacora->create_mensaje('No se puede cargar el archivo: '.$_FILES['file']['name']); 
           $errors='No se puede cargar el archivo: '.$_FILES['file']['name'];
          return redirect()->back()->withInput()->withErrors($errors);
       } 
       else
       {
         $obj_ficha =  ficha::find($request->id_ficha_activo_fijo);
         $obj_ficha->id_cuenta_contable=$request->id_cuenta_contable;
         $obj_ficha->descripcion=$request->descripcion;
         $obj_ficha->responsable_bien=$request->responsable_bien;
         $obj_ficha->id_tipo_doc_propiedad=$request->id_tipo_doc_propiedad;
         $obj_ficha->numero_registro_propiedad=$request->numero_registro_propiedad;
         $obj_ficha->anios_vida_util=$request->anios_vida_util;
         $obj_ficha->inscrita_registro=$request->inscrita_registro;
         $obj_ficha->monto_adquisicion=$request->monto_adquisicion;
         $obj_ficha->fecha_adquisicion=Carbon::createFromFormat('d/m/Y', $request->fecha_adquisicion);
         $obj_ficha->observacion=$request->observacion;
         $obj_ficha->id_usuario_modifica=Auth::user()->id_usuario_app;
         $obj_ficha->ip_dispositivo=$request->ip();
         $obj_ficha->save();
           $obj_controller_bitacora->create_mensaje('Modificacion de ficha: '.$request->codigo_inventario);
           if($_FILES['file']['name']=='')
           {
          flash()->success('Ficha modificada exitosamente con el código de inventario:'.$request->codigo_inventario);
          return redirect()->back();  
           }
           else
           {
           if($request->id_documento==0)
           {
            $this->fnc_guardar_documento($request,$request->id_ficha_activo_fijo);            
            flash()->success('Ficha modificada exitosamente con el código de inventario:'.$request->codigo_inventario);
            return redirect()->back();    
           }
           else
           {
            $obj_documento= documento_imagen::find($request->id_documento);
            $obj_documento->delete();
            $this->fnc_guardar_documento($request,$request->id_ficha_activo_fijo);            
            flash()->success('Ficha modificada exitosamente con el código de inventario:'.$request->codigo_inventario);
            return redirect()->back();    
           }
            
           }
       }
    }
    public function fnc_ver_ficha(Request $request) {
        if($request->resultado==''){
         flash()->warning('Seleccione una ficha');
         return redirect()->back();
       }
       $obj_ficha=  ficha::find($request->resultado);
       $obj_documento=DB::table('documento_imagen')
               ->select('*')
               ->where('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo)
               ->whereNull('deleted_at')
               ->get();      
       $codigo_inventario= DB::table('lista_codigo')
               ->where('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo)
               ->whereNull('deleted_at')
               ->get();
       $fecha_adquisicion= Carbon::createFromFormat('Y-m-d', $obj_ficha->fecha_adquisicion)->format('d/m/Y');
       //dd($fecha_adquisicion);
       $cuenta_asignada=  cuenta_contable::find($obj_ficha->id_cuenta_contable);
       if($obj_ficha->id_tipo_inventario==1){
       return view('ficha/editar_ficha_mueble'); 
       }
       if($obj_ficha->id_tipo_inventario==2){
        return view('ficha/editar_ficha_vehiculo');    
       }
       if($obj_ficha->id_tipo_inventario==3){
         /**
        * Crea formulario para modificar ficha de inmueble
         */
           //dd($obj_documento);
         $tipo_documento=  tipo_doc_propiedad::all();
         
         foreach($tipo_documento as $tipo_documentos)
         {
             if($obj_ficha->id_tipo_doc_propiedad==$tipo_documentos->id_tipo_doc_propiedad)
             {
               $nombre_tipo_doc=$tipo_documentos->nombre_tipo_documento;  
             }
         }
         $cuenta_contable=  cuenta_contable::all();
         return view('ficha/ver_ficha_inmueble',compact(
                 'cuenta_contable',
                 'nombre_tipo_doc',
                 'obj_ficha',
                 'codigo_inventario',
                 'cuenta_asignada',
                 'fecha_adquisicion',
                 'obj_documento'
                 ));
       }
    }
    public function update(Request $request)
    {
       if($request->resultado==''){
         flash()->warning('Seleccione una ficha');
         return redirect()->back();
       }
       $obj_ficha=  ficha::find($request->resultado);
       $obj_documento=DB::table('documento_imagen')
               ->select('*')
               ->where('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo)
               ->whereNull('deleted_at')
               ->get();
      
       $codigo_inventario= DB::table('lista_codigo')
               ->where('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo)
               ->whereNull('deleted_at')
               ->get();
       $fecha_adquisicion= Carbon::createFromFormat('Y-m-d', $obj_ficha->fecha_adquisicion)->format('d/m/Y');
       //dd($fecha_adquisicion);
       $cuenta_asignada=  cuenta_contable::find($obj_ficha->id_cuenta_contable);
       if($obj_ficha->id_tipo_inventario==1){
       return view('ficha/editar_ficha_mueble'); 
       }
       if($obj_ficha->id_tipo_inventario==2){
        return view('ficha/editar_ficha_vehiculo');    
       }
       if($obj_ficha->id_tipo_inventario==3){
         /**
        * Crea formulario para modificar ficha de inmueble
         */
           //dd($obj_documento);
         $tipo_documento=  tipo_doc_propiedad::lists('nombre_tipo_documento','id_tipo_doc_propiedad');
         $cuenta_contable=  cuenta_contable::all();
         return view('ficha/editar_ficha_inmueble',compact(
                 'cuenta_contable',
                 'tipo_documento',
                 'obj_ficha',
                 'codigo_inventario',
                 'cuenta_asignada',
                 'fecha_adquisicion',
                 'obj_documento'
                 ));
       }
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
