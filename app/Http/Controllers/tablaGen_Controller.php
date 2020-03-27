<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// add
use App\Models\tabla_generica;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\bitacoraController;


class tablaGen_Controller extends Controller
{
    private $obj_config;
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->obj_config = new tabla_generica();
        $this->setTemplate(1);
    }
    

    public function indexAll($id)
    {
        //
        $this->setTemplate($id);
        $obj_clase = app(ucfirst('App\Models\\'.$this->obj_config->tabla));
        
        $obj_tabla= $obj_clase::paginate($this->obj_config->paginate);
        
        $obj_param = $this->obj_config;
        $obj_filtro = $id;

        return view('tablagen/index_tablagen', compact('obj_tabla', 'obj_param', 'obj_filtro'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $l_index = 0;
        $whereData = array();
        $rawQuery = "";
        
        $this->setTemplate($request->id_template);
        $obj_clase = app(ucfirst('App\Models\\'.$this->obj_config->tabla));

        foreach($this->obj_config->filtro['name_col'] as $obj_idx=>$obj_col)
        {
            if ($request[$obj_col] != null)
            {
                switch ($this->obj_config->filtro['equal_col'][$obj_idx])
                {
                    case "like":
                        $whereData[$l_index] = implode(" ", array($obj_col, 'like', '\'%'.$request[$obj_col].'%\''));
                        $l_index++;
                        break;
                    case "=":
                        $whereData[$l_index] = implode(" ", array($obj_col, '=', '\''.$request[$obj_col].'\''));
                        $l_index++;
                        break;
                    
                }
            }
        }
        
        $rawQuery = implode(" AND ", $whereData);
        
        // Si no define ningun criterio de busqueda
        if ($rawQuery == null)
        { $rawQuery = "1 = 1"; }
        
        $obj_tabla= $obj_clase::
                whereRaw($rawQuery)->
                orderBy($this->obj_config->filtro['name_col'][0],'ASC')->
                paginate($this->obj_config->paginate);

        $obj_param = $this->obj_config;
        $obj_filtro = $request->id_template;
        
        return view('tablagen/index_tablagen', compact('obj_tabla', 'obj_param', 'obj_filtro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $this->setTemplate($id);
        $obj_param = $this->obj_config;
        $obj_filtro = $id;
        
        $obj_select_cat = 0;
        switch ($id)
        {
            case "laboratorios":
            case "hospital":
                $obj_select_cat = \App\Models\municipio::all(['id_municipio as id','nombre_municipio as nombre']);
                break;
        }

        return view('tablagen/create_tablagen', 
                compact('obj_param',
                        'obj_filtro',
                        'obj_select_cat'
                        ));
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
        $this->setTemplate($request->id_template);
        $obj_class = 'App\Models\\'.$this->obj_config->tabla;
        $obj_tabla = new $obj_class;

        foreach($this->obj_config->columns['name_col'] as $obj_idx=>$obj_item)
        { 
            $obj_tabla[$obj_item] = $request[$obj_item];
            
            // Correccion para valores NULL
            if ($this->obj_config->columns['type_col'][$obj_idx] == "number")
            {
                if ($request[$obj_item] == "")
                {$obj_tabla[$obj_item] = null;}
            }
        }
        
        $obj_tabla->save();
	$obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Ingreso de datos');	
        flash()->success('Ingreso realizado con éxito');	
        Input::flash();	
        return redirect()->back()->withInput();
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
    public function edit($table, $id)
    {
        //
        $this->setTemplate($table);
        
        $obj_class = app(ucfirst('App\Models\\'.$this->obj_config->tabla));
        $obj_tabla = new $obj_class();
        $obj_tabla = $obj_class::find($id);
        
        $obj_param = $this->obj_config;
        $obj_filtro = $table;
        
        $obj_select_cat = 0;
        switch ($table)
        {
            case "laboratorios":
            case "hospital":
                $obj_select_cat = \App\Models\municipio::all(['id_municipio as id','nombre_municipio as nombre']);
                break;
        }

        return view('tablagen/edit_tablagen', 
                compact('obj_tabla', 'obj_param', 'obj_filtro', 'obj_select_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->setTemplate($request->id_template);
        $obj_class = app(ucfirst('App\Models\\'.$this->obj_config->tabla));
        
        $obj_tabla_x = new $obj_class();
        $obj_tabla_x = $obj_class::find($request[$this->obj_config->key]);

        foreach($this->obj_config->columns['name_col'] as $obj_idx=>$obj_item)
        {
            if (!($this->obj_config->key == $obj_item))
            { $obj_tabla_x[$obj_item] = $request[$obj_item]; }
        }
        
        flash()->success('Modificación realizada exitosamente');
        
	$obj_tabla_x->save();
        $obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Datos modificados');

        $obj_tabla= $obj_class::paginate($this->obj_config->paginate);
        $obj_param = $this->obj_config;
        $obj_filtro = $this->obj_config->tabla;
        
        return redirect()->action('tablaGen_Controller@indexAll',['id'=>$obj_filtro]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($table, $id)
    {
        //
        $this->setTemplate($table);
        $obj_class = app(ucfirst('App\Models\\'.$this->obj_config->tabla));
        $obj_tabla = new $obj_class();
        $obj_tabla = $obj_class::destroy($id);

        flash()->success('Registro Eliminado exitosamente');
        $obj_controller_bitacora=new bitacoraController();	
        $obj_controller_bitacora->create_mensaje('Registro Eliminado');
        return "ok";
    }
    
    
    function setTemplate($a_template)
    {
        /*
         * funcion que define la configuracion asociada en base a la Template
         */
        switch ($a_template) 
        {
            case "hospital":
                $this->obj_config->nombre = 'Hospital';
                $this->obj_config->tabla = 'hospital';
                $this->obj_config->key = 'id_hospital';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['nombre_hospital'],
                            'type_col' => ['text'],
                            'label_col' => ['Nombre Hospital'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_hospital','id_municipio','nombre_hospital'],
                            'type_col' => ['number','select','text'],
                            'label_col' => ['Id','Municipio','Nombre Hospital'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['2']      // ID de col, siempre asc
                        );
                break;
            
            case "cascada":
                $this->obj_config->nombre = 'Cascada';
                $this->obj_config->tabla = 'cascada';
                $this->obj_config->key = 'id_cascada';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_cascada'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Cascada'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_cascada','descripcion_cascada'],
                            'type_col' => ['number','text'],
                            'label_col' => ['Id','Descripcion Cascada'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "cascada_cv":
                $this->obj_config->nombre = 'Cascada CV';
                $this->obj_config->tabla = 'cascada_cv';
                $this->obj_config->key = 'id_cascada_cv';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_cascada_cv'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Cascada CV'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_cascada_cv','desc_cascada_cv'],
                            'type_col' => ['number','text'],
                            'label_col' => ['Id','Descripcion Cascada CV'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "indicador":
                $this->obj_config->nombre = 'Indicador';
                $this->obj_config->tabla = 'indicador';
                $this->obj_config->key = 'id_indicador';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_indicador'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Indicador'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_indicador','ind_id_indicador','indicador','descripcion_indicador','tipo_indicador'],
                            'type_col' => ['number','number','text','text','text'],
                            'label_col' => ['Id','Ind ID Indicador', 'Indicador', 'Descripcion Indicador', 'Tipo Indicador'],
                            'display_col'=>[true, true, true, true, true],
                            'order_col'=>['3']      // ID de col, siempre asc
                        );
                break;
            
            case "embarazo_lactancia":
                $this->obj_config->nombre = 'Embarazo Lactancia';
                $this->obj_config->tabla = 'embarazo_lactancia';
                $this->obj_config->key = 'id_embarazo_lactancia';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_embarazo_lactancia'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Embarazo Lactancia'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_embarazo_lactancia','desc_embarazo_lactancia'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Embarazo Lactancia'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "laboratorios":
                $this->obj_config->nombre = 'Laboratorios';
                $this->obj_config->tabla = 'laboratorios';
                $this->obj_config->key = 'id_laboratorios';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['nombre_laboratorio'],
                            'type_col' => ['text'],
                            'label_col' => ['Nombre Laboratorio'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_laboratorios', 'id_municipio', 'nombre_laboratorio'],
                            'type_col' => ['number', 'select', 'text'],
                            'label_col' => ['Id', 'Municipio', 'Nombre Laboratorio'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "anio":
                $this->obj_config->nombre = 'Año';
                $this->obj_config->tabla = 'anio';
                $this->obj_config->key = 'id_anio';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_anio'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Año'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_anio', 'descripcion_anio'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Año'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "anio_semana":
                $this->obj_config->nombre = 'Año / Semana';
                $this->obj_config->tabla = 'anio_semana';
                $this->obj_config->key = 'id_anio_semana';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['id_anio'],
                            'type_col' => ['number'],
                            'label_col' => ['Año'],
                            'equal_col' => ['=']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_anio_semana', 'id_anio', 'id_semana', 'fec_inicio', 'fec_fin', 'vigente'],
                            'type_col' => ['number', 'number', 'number', 'text', 'text', 'number'],
                            'label_col' => ['Id', 'Año', 'Semana', 'Fecha Inicio (YYYY-mm-dd)', 'Fecha Fin (YYYY-mm-dd)', 'Vigente'],
                            'display_col'=>[true, true, true, true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "permiso_app":
                $this->obj_config->nombre = 'Permiso App';
                $this->obj_config->tabla = 'permiso_app';
                $this->obj_config->key = 'id_permiso_app';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['name', 'nombre_mostrar'],
                            'type_col' => ['text', 'text'],
                            'label_col' => ['Nombre', 'Nombre Mostrar'],
                            'equal_col' => ['like', 'like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_permiso_app', 'name', 'nombre_mostrar'],
                            'type_col' => ['number', 'text', 'text'],
                            'label_col' => ['Id', 'Nombre', 'Nombre Mostrar'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "poblacion_clave":
                $this->obj_config->nombre = 'Poblacion Clave';
                $this->obj_config->tabla = 'poblacion_clave';
                $this->obj_config->key = 'id_poblacion_clave';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_poblacion_clave'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Poblacion Clave'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_poblacion_clave', 'descripcion_poblacion_clave'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Poblacion Clave'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "tratamiento":
                $this->obj_config->nombre = 'Tratamiento';
                $this->obj_config->tabla = 'tratamiento';
                $this->obj_config->key = 'id_tratamiento';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_tratamiento'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Tratamiento'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_tratamiento', 'desc_tratamiento'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Tratamiento'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "tratamiento_tb":
                $this->obj_config->nombre = 'Tratamiento tb';
                $this->obj_config->tabla = 'tratamiento_tb';
                $this->obj_config->key = 'id_tratamiento_tb';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_tratamiento_tb'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Tratamiento tb'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_tratamiento_tb', 'desc_tratamiento_tb'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Tratamiento tb'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "periodo":
                $this->obj_config->nombre = 'Periodo';
                $this->obj_config->tabla = 'periodo';
                $this->obj_config->key = 'id_periodo';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_periodo'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Periodo'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_periodo', 'descripcion_periodo', 'vigente'],
                            'type_col' => ['number', 'text', 'number'],
                            'label_col' => ['Id', 'Descripcion Periodo', 'vigente'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "prueba":
                $this->obj_config->nombre = 'Prueba';
                $this->obj_config->tabla = 'prueba';
                $this->obj_config->key = 'id_prueba';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_prueba'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Prueba'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_prueba', 'descripcion_prueba'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Prueba'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "prueba_diagnostica_tb":
                $this->obj_config->nombre = 'Prueba Diagnostica tb';
                $this->obj_config->tabla = 'prueba_diagnostica_tb';
                $this->obj_config->key = 'id_prueba_diagnostica_tb';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_prueba_diagnostica_tb'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Prueba Diagnostica tb'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_prueba_diagnostica_tb', 'desc_prueba_diagnostica_tb', 'diferenciador'],
                            'type_col' => ['number', 'text', 'number'],
                            'label_col' => ['Id', 'Descripcion Prueba Diagnostica tb', 'Diferenciador'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "rango_edad":
                $this->obj_config->nombre = 'Rango Edad';
                $this->obj_config->tabla = 'rango_edad';
                $this->obj_config->key = 'id_rango_edad';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion_rango_edad'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Rango Edad'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_rango_edad', 'descripcion_rango_edad', 'desde', 'hasta'],
                            'type_col' => ['number', 'text', 'number', 'number'],
                            'label_col' => ['Id', 'Descripcion Rango Edad', 'Desde', 'Hasta'],
                            'display_col'=>[true, true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "rango_edad_etario":
                $this->obj_config->nombre = 'Rango Edad Etario';
                $this->obj_config->tabla = 'rango_edad_etario';
                $this->obj_config->key = 'id_rango_edad_etario';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['rango_edad_etario'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Rango Edad Etario'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_rango_edad_etario', 'rango_edad_etario', 'desde', 'hasta'],
                            'type_col' => ['number', 'text', 'number', 'number'],
                            'label_col' => ['Id', 'Descripcion Rango Edad Etario', 'Desde', 'Hasta'],
                            'display_col'=>[true, true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "periodo_anual":
                $this->obj_config->nombre = 'Periodo Anual';
                $this->obj_config->tabla = 'periodo_anual';
                $this->obj_config->key = 'id_periodo_anual';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_periodo_anual'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Periodo Anual'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_periodo_anual', 'desc_periodo_anual', 'vigente'],
                            'type_col' => ['number', 'text', 'number'],
                            'label_col' => ['Id', 'Descripcion Periodo Anual', 'Vigente'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "meses":
                $this->obj_config->nombre = 'Meses';
                $this->obj_config->tabla = 'meses';
                $this->obj_config->key = 'id_meses';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['nombre_mes'],
                            'type_col' => ['text'],
                            'label_col' => ['Nombre Mes'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_meses', 'nombre_mes'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Nombre Mes'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "tipo_prueba":
                $this->obj_config->nombre = 'Tipo Prueba';
                $this->obj_config->tabla = 'tipo_prueba';
                $this->obj_config->key = 'id_tipo_prueba';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_tipo_prueba'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Tipo Prueba'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_tipo_prueba', 'desc_tipo_prueba'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Tipo Prueba'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;

            case "cant_servicios":
                $this->obj_config->nombre = 'Cantidad Servicios';
                $this->obj_config->tabla = 'cant_servicios';
                $this->obj_config->key = 'id_cant_servicios';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_cant_servicios'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Cantidad Servicios'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_cant_servicios', 'desc_cant_servicios', 'diferenciador'],
                            'type_col' => ['number', 'text', 'number'],
                            'label_col' => ['Id', 'Descripcion Cantidad Servicios', 'Diferenciador'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;

            case "tipo_beneficio":
                $this->obj_config->nombre = 'Tipo Beneficio';
                $this->obj_config->tabla = 'tipo_beneficio';
                $this->obj_config->key = 'id_tipo_beneficio';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_tipo_beneficio'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Tipo Beneficio'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_tipo_beneficio', 'desc_tipo_beneficio'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Tipo Beneficio'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "meses_periodo":
                $this->obj_config->nombre = 'Meses Periodo';
                $this->obj_config->tabla = 'meses_periodo';
                $this->obj_config->key = 'id_meses_periodo';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['id_anio'],
                            'type_col' => ['number'],
                            'label_col' => ['Año'],
                            'equal_col' => ['=']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_meses_periodo', 'id_anio', 'id_periodo_anual', 'id_meses'],
                            'type_col' => ['number', 'number', 'number', 'number'],
                            'label_col' => ['Id meses periodo', 'Año', 'Periodo Anual', 'Meses'],
                            'display_col'=>[true, true, true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "tipo_rrhh":
                $this->obj_config->nombre = 'Tipo RRHH';
                $this->obj_config->tabla = 'tipo_rrhh';
                $this->obj_config->key = 'id_tipo_rrhh';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['desc_tipo_rrhh'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion tipo RRHH'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_tipo_rrhh', 'desc_tipo_rrhh'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion tipo RRHH'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "semana":
                $this->obj_config->nombre = 'Semana';
                $this->obj_config->tabla = 'semana';
                $this->obj_config->key = 'id_semana';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['descripcion'],
                            'type_col' => ['text'],
                            'label_col' => ['Descripcion Semana'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_semana', 'descripcion'],
                            'type_col' => ['number', 'text'],
                            'label_col' => ['Id', 'Descripcion Semana'],
                            'display_col'=>[true, true],
                            'order_col'=>['1']      // ID de col, siempre asc
                        );
                break;
            
            case "datos":
                $this->obj_config->nombre = 'Meta ROP';
                $this->obj_config->tabla = 'datos';
                $this->obj_config->key = 'id_datos';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['id_indicador','id_hospital','id_semana'],
                            'type_col' => ['number', 'number', 'number'],
                            'label_col' => ['Indicador', 'Hospital', 'Semana'],
                            'equal_col' => ['=', '=', '=']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_datos', 'id_indicador', 'id_hospital', 'id_semana', 'valor_meta'],
                            'type_col' => ['number', 'number', 'number', 'number', 'number'],
                            'label_col' => ['Id', 'Indicador', 'Hospital', 'Semana', 'Valor Meta'],
                            'display_col'=>[true, true, true, true, true],
                            'order_col'=>['0']      // ID de col, siempre asc
                        );
                break;

            default:
                $this->obj_config->nombre = 'Hospital';
                $this->obj_config->tabla = 'hospital';
                $this->obj_config->key = 'id_hospital';
                $this->obj_config->filtro =
                        array(
                            'name_col' => ['nombre_hospital'],
                            'type_col' => ['input'],
                            'label_col' => ['Nombre Hospital'],
                            'equal_col' => ['like']
                        );
                
                $this->obj_config->columns = 
                        array(
                            'name_col' => ['id_hospital','id_municipio','nombre_hospital'],
                            'type_col' => ['number','select','text'],
                            'label_col' => ['Id','Municipio','Nombre Hospital'],
                            'display_col'=>[true, true, true],
                            'order_col'=>['2']      // ID de col, siempre asc
                        );
                break;
        }
    }
    
}
