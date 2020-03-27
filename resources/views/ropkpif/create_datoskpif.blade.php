<!-- 
     * Nombre del archivo:nuevo_rol.blade.php
     * Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_crud')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>{{ $obj_param->nombre_plantilla }}</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>{{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">{{ $obj_param->nombre_opcion }}</h4>  
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">         
        <!--Crear nuevo rol-->
        <div class="col-lg-8">
             {!! Form::open(['route' => 'ropkpif/create_datoskpif', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_template" name="id_template" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    
                    @if(in_array('id_municipio',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Pais</td>
                      <td>
                        <select name="pais" placeholder="pais" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_region_sica as $obj_item)
                                @if(Auth::user()->get_dmunicipio->get_departamento->get_region_sica->codigo_pais == $obj_item->codigo_pais)
                                    <option value="{{ $obj_item->codigo_pais }}" selected>{{ $obj_item->nombre_pais }} </option>
                                @else
                                    <option value="{{ $obj_item->codigo_pais }}">{{ $obj_item->nombre_pais }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Departamento</td>
                      <td>
                          <select name="departamento" placeholder="departamento" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_departamento as $obj_item)
                                @if(Auth::user()->get_dmunicipio->get_departamento->id_departamento == $obj_item->id_departamento)
                                    <option value="{{ $obj_item->id_departamento }}" selected>{{ $obj_item->nombre_departamento }} </option>
                                @else
                                    <option value="{{ $obj_item->id_departamento }}">{{ $obj_item->nombre_departamento }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Municipio</td>
                      <td>
                        <select name="id_municipio_show" placeholder="Municipio" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_municipio as $obj_item)
                                @if(Auth::user()->id_municipio == $obj_item->id_municipio)
                                    <option value="{{ $obj_item->id_municipio }}" selected>{{ $obj_item->nombre_municipio }} </option>
                                @else
                                    <option value="{{ $obj_item->id_municipio }}">{{ $obj_item->nombre_municipio }} </option>
                                @endif
                            @endforeach
                        </select>
                        <input type="hidden" id="id_municipio" name="id_municipio" value="{{ Auth::user()->id_municipio }}">
                      </td>
                    </tr>
                    @endif


                    @if(in_array('municipio',$obj_param->def_columns['name_col']) or in_array('id_hospital',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Pais</td>
                      <td>
                        <select name="pais" placeholder="pais" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_region_sica as $obj_item)
                                @if(Auth::user()->get_hospital->get_municipio->get_departamento->get_region_sica->codigo_pais == $obj_item->codigo_pais)
                                    <option value="{{ $obj_item->codigo_pais }}" selected>{{ $obj_item->nombre_pais }} </option>
                                @else
                                    <option value="{{ $obj_item->codigo_pais }}">{{ $obj_item->nombre_pais }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Departamento</td>
                      <td>
                          <select name="departamento" placeholder="departamento" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_departamento as $obj_item)
                                @if(Auth::user()->get_hospital->get_municipio->get_departamento->id_departamento == $obj_item->id_departamento)
                                    <option value="{{ $obj_item->id_departamento }}" selected>{{ $obj_item->nombre_departamento }} </option>
                                @else
                                    <option value="{{ $obj_item->id_departamento }}">{{ $obj_item->nombre_departamento }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Municipio</td>
                      <td>
                        <select name="municipio" placeholder="Municipio" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_municipio as $obj_item)
                                @if(Auth::user()->get_hospital->get_municipio->id_municipio == $obj_item->id_municipio)
                                    <option value="{{ $obj_item->id_municipio }}" selected>{{ $obj_item->nombre_municipio }} </option>
                                @else
                                    <option value="{{ $obj_item->id_municipio }}">{{ $obj_item->nombre_municipio }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                        @if( in_array('id_hospital',$obj_param->def_columns['name_col']) and in_array('municipio',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Hospital</td>
                      <td>
                        <input type="text" maxlength="30" class="form-control" name="id_hospital_show" id="id_hospital_show" value="{{Auth::user()->get_hospital->nombre_hospital}}" readonly="readonly" >
                        @endif
                        <input type="hidden" id="id_hospital" name="id_hospital" value="{{ Auth::user()->id_hospital }}">
                        @if( in_array('id_hospital',$obj_param->def_columns['name_col']) and in_array('municipio',$obj_param->def_columns['name_col']))
                      </td>
                    </tr>
                        @endif
                    @endif
                    
                    @if(in_array('id_unidad_atencion',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Unidad Atencion Integral</td>
                      <td>
                        <select name="id_unidad_atencion" id="id_unidad_atencion" placeholder="id_unidad_atencion" class="form-control" required >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_unidad_atencion as $obj_item)
                            <option value="{{ $obj_item->id_unidad_atencion }}" selected>{{ $obj_item->nombre_unidad_atencion }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_anio',$obj_param->def_columns['name_col']))	
                    <tr>	
                      <td>Año</td>	
                      <td>	
                        <select name="id_anio" placeholder="id_anio" class="form-control" required>	
                            <option value="" >-- Seleccionar -- </option>	
                            @foreach($obj_select_anio as $obj_item)	
                            @if (Input::old('id_anio')==$obj_item->id_anio)	
                            <option value="{{ $obj_item->id_anio }}" selected>{{ $obj_item->descripcion_anio }} </option>	
                            @else	
                            <option value="{{ $obj_item->id_anio }}">{{ $obj_item->descripcion_anio }} </option>	
                            @endif	
                            @endforeach	
                        </select>	
                      </td>	
                    </tr>	
                    @endif
                    @if(in_array('id_periodo',$obj_param->def_columns['name_col']))	
                    <tr>	
                      <td>Periodo</td>
                      <td>	
                        <select name="id_periodo" placeholder="id_periodo" class="form-control" required>	
                            <option value="" >-- Seleccionar -- </option> 	
                            @foreach($obj_select_periodo as $obj_item)	
                            @if (Input::old('id_periodo')==$obj_item->id_periodo)	
                            <option value="{{ $obj_item->id_periodo }}" selected>{{ $obj_item->descripcion_periodo }} </option>	
                            @else	
                            <option value="{{ $obj_item->id_periodo }}">{{ $obj_item->descripcion_periodo }} </option>	
                            @endif	
                            @endforeach	
                        </select>	
                      </td>	
                    </tr>	
                    @endif
                    @if(in_array('id_laboratorios',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Laboratorios</td>
                      <td>
                        <select name="id_laboratorios" placeholder="id_laboratorios" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_laboratorios as $obj_item)
                            <option value="{{ $obj_item->id_laboratorios }}">{{ $obj_item->nombre_laboratorio }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_poblacion_clave',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Poblacion Clave</td>
                      <td>
                        <select name="id_poblacion_clave" id="id_poblacion_clave" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_poblacion_clave as $obj_item)
                            <option value="{{ $obj_item->id_poblacion_clave }}">{{ $obj_item->descripcion_poblacion_clave }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_inicio_tratamiento',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Inicio Tratamiento</td>
                      <td>
                        <select name="id_inicio_tratamiento" placeholder="id_inicio_tratamiento" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_inicio_tratamiento as $obj_item)
                            <option value="{{ $obj_item->id_inicio_tratamiento }}">{{ $obj_item->descripcion_inicio_tratamiento }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_rango_edad',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Rango edad</td>
                      <td>
                        <select name="id_rango_edad" placeholder="id_rango_edad" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_rango_edad as $obj_item)
                            <option value="{{ $obj_item->id_rango_edad }}">{{ $obj_item->descripcion_rango_edad }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_rango_edad_etario',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Rango edad etario</td>
                      <td>
                        <select name="id_rango_edad_etario" placeholder="id_rango_edad_etario" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_rango_edad_etario as $obj_item)
                            <option value="{{ $obj_item->id_rango_edad_etario }}">{{ $obj_item->rango_edad_etario }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tipo_diagnostico',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tipo Diagnostico</td>
                      <td>
                        <select name="id_tipo_diagnostico" id="id_tipo_diagnostico" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_diagnostico as $obj_item)
                            <option value="{{ $obj_item->id_tipo_diagnostico }}">{{ $obj_item->tipo_diagnostico }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_sexo',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Sexo</td>
                      <td>
                        <select name="id_sexo" id="id_sexo" placeholder="id_sexo" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_sexo as $obj_item)
                            <option value="{{ $obj_item->id_sexo }}">{{ $obj_item->descripcion_sexo }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_prueba',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Prueba</td>
                      <td>
                        <select name="id_prueba" placeholder="id_prueba" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_prueba as $obj_item)
                            <option value="{{ $obj_item->id_prueba }}">{{ $obj_item->descripcion_prueba }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_resultado_incidencia',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Resultado Incidencia</td>
                      <td>
                        <select name="id_resultado_incidencia" placeholder="id_resultado_incidencia" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_resultado_incidencia as $obj_item)
                            <option value="{{ $obj_item->id_resultado_incidencia }}">{{ $obj_item->resultado_incidencia }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_dispensacion_tar',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Dispensacion tar</td>
                      <td>
                        <select name="id_dispensacion_tar" placeholder="id_dispensacion_tar" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_dispensacion_tar as $obj_item)
                            <option value="{{ $obj_item->id_dispensacion_tar }}">{{ $obj_item->dispensacion_tar }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_embarazo_lactancia',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Embarazo Lactancia</td>
                      <td>
                        <select name="id_embarazo_lactancia" placeholder="id_embarazo_lactancia" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_embarazo_lactancia as $obj_item)
                            <option value="{{ $obj_item->id_embarazo_lactancia }}">{{ $obj_item->desc_embarazo_lactancia }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_periodo_prueba',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Periodo Prueba</td>
                      <td>
                        <select name="id_periodo_prueba" id="id_periodo_prueba" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_periodo_prueba as $obj_item)
                            <option value="{{ $obj_item->id_periodo_prueba }}">{{ $obj_item->descripcion_periodo_prueba }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_cascada',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cascada</td>
                      <td>
                        <select name="id_cascada" placeholder="id_cascada" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_cascada as $obj_item)
                            <option value="{{ $obj_item->id_cascada }}">{{ $obj_item->descripcion_cascada }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_cascada_cv',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cascada CV</td>
                      <td>
                        <select name="id_cascada_cv" placeholder="id_cascada_cv" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_cascada_cv as $obj_item)
                            <option value="{{ $obj_item->id_cascada_cv }}">{{ $obj_item->desc_cascada_cv }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('comp_serv_indx_testing',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Servicio de Index Testing</td>
                      <td>
                        <select name="comp_serv_indx_testing" id="comp_serv_indx_testing" placeholder="comp_serv_indx_testing" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            <option value="58">Ofrecen</option>
                            <option value="59">Aceptan</option>
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('comp_numdeno',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cantidad</td>
                      <td>
                        <input type="radio" name="comp_numdeno" value="numerador" checked> Numerador<br>
                        <input type="radio" name="comp_numdeno" value="denominador"> Denominador<br>
                        <input type="text" maxlength="6" class="form-control" name="comp_numdeno_val" id="comp_numdeno_val" placeholder="Solo Numeros Enteros" pattern="^[1-9]\d*$" required >
                      </td>
                    </tr>
                    @endif
                    @if(in_array('valor_numerador',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cantidad</td>
                      <td><input type="text" maxlength="6" class="form-control" name="valor_numerador" id="valor_numerador" placeholder="Solo Numeros Enteros" pattern="^[1-9]\d*$" required ></td>
                    </tr>
                    @endif
                    @if(in_array('valor_denominador',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cantidad</td>
                      <td><input type="text" maxlength="6" class="form-control" name="valor_denominador" id="valor_denominador" placeholder="Solo Numeros Enteros" pattern="^[1-9]\d*$" required ></td>
                    </tr>
                    @endif
                    @if(in_array('valor_meta',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Valor Meta</td>
                      <td><input type="text" maxlength="6" class="form-control" name="valor_meta" id="valor_meta" placeholder="Solo Numeros Enteros" pattern="^[1-9]\d*$" required ></td>
                    </tr>
                    @endif

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('ropkpif/index_datoskpif')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>
                      </td>
                    </tr>
                </table>
                <p>* Todos los Campos son requeridos</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


