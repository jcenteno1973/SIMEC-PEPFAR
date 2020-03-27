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
             {!! Form::open(['route' => 'ropanual/edit_datosanuales', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_datos_anuales" name="id_datos_anuales" value="{{ $obj_tabla->id_datos_anuales }}">
                <input type="hidden" id="id_template" name="id_template" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    @if(in_array('id_hospital',$obj_param->def_columns['name_col']) or in_array('id_laboratorios',$obj_param->def_columns['name_col'])  )
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
                        @if(in_array('id_hospital',$obj_param->def_columns['name_col']))
                            <tr>
                              <td>Hospital</td>
                              <td>
                                <input type="text" maxlength="30" class="form-control" name="id_hospital_show" id="id_hospital_show" value="{{Auth::user()->get_hospital->nombre_hospital}}" readonly="readonly" >
                                <input type="hidden" id="id_hospital" name="id_hospital" value="{{ Auth::user()->id_hospital }}">
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
                                        @if($obj_tabla->id_laboratorios == $obj_item->id_laboratorios)
                                            <option value="{{ $obj_item->id_laboratorios }}" selected>{{ $obj_item->nombre_laboratorio }} </option>
                                        @else
                                            <option value="{{ $obj_item->id_laboratorios }}">{{ $obj_item->nombre_laboratorio }} </option>
                                        @endif
                                    @endforeach
                                </select>
                              </td>
                            </tr>
                        @endif
                    @endif
                    @if(in_array('id_unidad_atencion',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Unidad Atencion</td>
                      <td>
                        <select name="id_unidad_atencion" placeholder="id_unidad_atencion" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_unidad_atencion as $obj_item)
                                @if($obj_tabla->id_unidad_atencion == $obj_item->id_unidad_atencion)
                                    <option value="{{ $obj_item->id_unidad_atencion }}" selected>{{ $obj_item->nombre_unidad_atencion }} </option>
                                @else
                                    <option value="{{ $obj_item->id_unidad_atencion }}">{{ $obj_item->nombre_unidad_atencion }} </option>
                                @endif
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
                                @if($obj_tabla->id_anio == $obj_item->id_anio)
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
                                @if($obj_tabla->id_periodo == $obj_item->id_periodo)
                                    <option value="{{ $obj_item->id_periodo }}" selected>{{ $obj_item->descripcion_periodo }} </option>
                                @else
                                    <option value="{{ $obj_item->id_periodo }}">{{ $obj_item->descripcion_periodo }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_periodo_anual',$obj_param->def_columns['name_col']))	
                    <tr>	
                      <td>Periodo</td>
                      <td>
                        <select name="id_periodo_anual" placeholder="id_periodo_anual" class="form-control" required>	
                            <option value="" >-- Seleccionar -- </option> 	
                            @foreach($obj_select_periodo_anual as $obj_item)	
                                @if ($obj_tabla->id_periodo_anual == $obj_item->id_periodo_anual)	
                                    <option value="{{ $obj_item->id_periodo_anual }}" selected>{{ $obj_item->desc_periodo_anual }} </option>	
                                @else	
                                    <option value="{{ $obj_item->id_periodo_anual }}">{{ $obj_item->desc_periodo_anual }} </option>	
                                @endif	
                            @endforeach	
                        </select>	
                      </td>	
                    </tr>	
                    @endif
                    @if(in_array('id_semana',$obj_param->def_columns['name_col']))	
                    <tr>	
                      <td>Semana Epidemiologica</td>
                      <td>	
                        <select name="id_semana" placeholder="id_semana" class="form-control" required>	
                            <option value="" >-- Seleccionar -- </option> 	
                            @foreach($obj_select_anio_semana as $obj_item)
                                @if($obj_tabla->id_semana == $obj_item->id_semana)
                                    <option value="{{ $obj_item->id_semana }}" selected>{{ $obj_item->semanatexto }} </option>	
                                @else
                                    <option value="{{ $obj_item->id_semana }}">{{ $obj_item->semanatexto }} </option>
                                @endif
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
                                @if($obj_tabla->id_dispensacion_tar == $obj_item->id_dispensacion_tar)
                                    <option value="{{ $obj_item->id_dispensacion_tar }}" selected>{{ $obj_item->dispensacion_tar }} </option>
                                @else
                                    <option value="{{ $obj_item->id_dispensacion_tar }}">{{ $obj_item->dispensacion_tar }} </option>
                                @endif
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
                                @if($obj_tabla->id_embarazo_lactancia == $obj_item->id_embarazo_lactancia)
                                    <option value="{{ $obj_item->id_embarazo_lactancia }}" selected>{{ $obj_item->desc_embarazo_lactancia }} </option>
                                @else
                                    <option value="{{ $obj_item->id_embarazo_lactancia }}">{{ $obj_item->desc_embarazo_lactancia }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_indicador',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Indicador</td>
                      <td>
                        <select name="id_indicador" placeholder="id_indicador" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_indicador as $obj_item)
                                @if($obj_tabla->id_indicador == $obj_item->id_indicador)
                                    <option value="{{ $obj_item->id_indicador }}" selected>{{ $obj_item->descripcion_indicador }} </option>
                                @else
                                    <option value="{{ $obj_item->id_indicador }}">{{ $obj_item->descripcion_indicador }} </option>
                                @endif
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
                                @if($obj_tabla->id_inicio_tratamiento == $obj_item->id_inicio_tratamiento)
                                    <option value="{{ $obj_item->id_inicio_tratamiento }}" selected>{{ $obj_item->descripcion_inicio_tratamiento }} </option>
                                @else
                                    <option value="{{ $obj_item->id_inicio_tratamiento }}">{{ $obj_item->descripcion_inicio_tratamiento }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_meses',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Meses</td>
                      <td>
                        <select name="id_meses" placeholder="id_meses" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_meses as $obj_item)
                                @if($obj_tabla->id_meses == $obj_item->id_meses)
                                    <option value="{{ $obj_item->id_meses }}" selected>{{ $obj_item->nombre_mes }} </option>
                                @else
                                    <option value="{{ $obj_item->id_meses }}">{{ $obj_item->nombre_mes }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_periodo_prueba',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Periodo Prueba</td>
                      <td>
                        <select name="id_periodo_prueba" placeholder="id_periodo_prueba" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_periodo_prueba as $obj_item)
                                @if($obj_tabla->id_periodo_prueba == $obj_item->id_periodo_prueba)
                                    <option value="{{ $obj_item->id_periodo_prueba }}" selected>{{ $obj_item->descripcion_periodo_prueba }} </option>
                                @else
                                    <option value="{{ $obj_item->id_periodo_prueba }}">{{ $obj_item->descripcion_periodo_prueba }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tipo_rrhh',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tipo Recurso Humano</td>
                      <td>
                        <select name="id_tipo_rrhh" placeholder="id_tipo_rrhh" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_rrhh as $obj_item)
                                @if($obj_tabla->id_tipo_rrhh == $obj_item->id_tipo_rrhh)
                                    <option value="{{ $obj_item->id_tipo_rrhh }}" selected>{{ $obj_item->desc_tipo_rrhh }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_rrhh }}">{{ $obj_item->desc_tipo_rrhh }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tipo_beneficio',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tipo Beneficio</td>
                      <td>
                        <select name="id_tipo_beneficio" placeholder="id_tipo_beneficio" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_beneficio as $obj_item)
                                @if($obj_tabla->id_tipo_beneficio == $obj_item->id_tipo_beneficio)
                                    <option value="{{ $obj_item->id_tipo_beneficio }}" selected>{{ $obj_item->desc_tipo_beneficio }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_beneficio }}">{{ $obj_item->desc_tipo_beneficio }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_poblacion_clave',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Poblacion Clave</td>
                      <td>
                        <select name="id_poblacion_clave" placeholder="id_poblacion_clave" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_poblacion_clave as $obj_item)
                                @if($obj_tabla->id_poblacion_clave == $obj_item->id_poblacion_clave)
                                    <option value="{{ $obj_item->id_poblacion_clave }}" selected>{{ $obj_item->descripcion_poblacion_clave }} </option>
                                @else
                                    <option value="{{ $obj_item->id_poblacion_clave }}">{{ $obj_item->descripcion_poblacion_clave }} </option>
                                @endif
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
                                @if($obj_tabla->id_prueba == $obj_item->id_prueba)
                                    <option value="{{ $obj_item->id_prueba }}" selected>{{ $obj_item->descripcion_prueba }} </option>
                                @else
                                    <option value="{{ $obj_item->id_prueba }}">{{ $obj_item->descripcion_prueba }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_prueba_diagnostica_tb',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Prueba Diagnostica</td>
                      <td>
                        <select name="id_prueba_diagnostica_tb" placeholder="id_prueba_diagnostica_tb" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_prueba_diagnostica_tb as $obj_item)
                                @if($obj_tabla->id_prueba_diagnostica_tb == $obj_item->id_prueba_diagnostica_tb)
                                    <option value="{{ $obj_item->id_prueba_diagnostica_tb }}" selected>{{ $obj_item->desc_prueba_diagnostica_tb }} </option>
                                @else
                                    <option value="{{ $obj_item->id_prueba_diagnostica_tb }}">{{ $obj_item->desc_prueba_diagnostica_tb }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tipo_prueba',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tipo Prueba</td>
                      <td>
                        <select name="id_tipo_prueba" placeholder="id_tipo_prueba" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_prueba as $obj_item)
                                @if($obj_tabla->id_tipo_prueba == $obj_item->id_tipo_prueba)
                                    <option value="{{ $obj_item->id_tipo_prueba }}" selected>{{ $obj_item->desc_tipo_prueba }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_prueba }}">{{ $obj_item->desc_tipo_prueba }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_resultado_carga_viral',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Resultado Carga Viral</td>
                      <td>
                        <select name="id_resultado_carga_viral" placeholder="id_resultado_carga_viral" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_resultado_carga_viral as $obj_item)
                                @if($obj_tabla->id_resultado_carga_viral == $obj_item->id_resultado_carga_viral)
                                    <option value="{{ $obj_item->id_resultado_carga_viral }}" selected>{{ $obj_item->descripcion_resultado_carga_viral }} </option>
                                @else
                                    <option value="{{ $obj_item->id_resultado_carga_viral }}">{{ $obj_item->descripcion_resultado_carga_viral }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tipo_diagnostico',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tipo Diagnostico</td>
                      <td>
                        <select name="id_tipo_diagnostico" placeholder="id_tipo_diagnostico" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_diagnostico as $obj_item)
                                @if($obj_tabla->id_tipo_diagnostico == $obj_item->id_tipo_diagnostico)
                                    <option value="{{ $obj_item->id_tipo_diagnostico }}" selected>{{ $obj_item->tipo_diagnostico }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_diagnostico }}">{{ $obj_item->tipo_diagnostico }} </option>
                                @endif
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
                                @if($obj_tabla->id_resultado_incidencia == $obj_item->id_resultado_incidencia)
                                    <option value="{{ $obj_item->id_resultado_incidencia }}" selected>{{ $obj_item->resultado_incidencia }} </option>
                                @else
                                    <option value="{{ $obj_item->id_resultado_incidencia }}">{{ $obj_item->resultado_incidencia }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_seguimiento_tar',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Seguimiento tar</td>
                      <td>
                        <select name="id_seguimiento_tar" placeholder="id_seguimiento_tar" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_seguimiento_tar as $obj_item)
                                @if($obj_tabla->id_seguimiento_tar == $obj_item->id_seguimiento_tar)
                                    <option value="{{ $obj_item->id_seguimiento_tar }}" selected>{{ $obj_item->desc_seguimiento_tar }} </option>
                                @else
                                    <option value="{{ $obj_item->id_seguimiento_tar }}">{{ $obj_item->desc_seguimiento_tar }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_sexo',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Sexo</td>
                      <td>
                        <select name="id_sexo" placeholder="id_sexo" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_sexo as $obj_item)
                                @if($obj_tabla->id_sexo == $obj_item->id_sexo)
                                    <option value="{{ $obj_item->id_sexo }}" selected>{{ $obj_item->descripcion_sexo }} </option>
                                @else
                                    <option value="{{ $obj_item->id_sexo }}">{{ $obj_item->descripcion_sexo }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tipo_prueba_incidencia',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tipo prueba incidencia</td>
                      <td>
                        <select name="id_tipo_prueba_incidencia" placeholder="id_tipo_prueba_incidencia" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_prueba_incidencia as $obj_item)
                                @if($obj_tabla->id_tipo_prueba_incidencia == $obj_item->id_tipo_prueba_incidencia)
                                    <option value="{{ $obj_item->id_tipo_prueba_incidencia }}" selected>{{ $obj_item->tipo_prueba_incidencia }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_prueba_incidencia }}">{{ $obj_item->tipo_prueba_incidencia }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tratamiento',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tratamiento</td>
                      <td>
                        <select name="id_tratamiento" placeholder="id_tratamiento" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tratamiento as $obj_item)
                                @if($obj_tabla->id_tratamiento == $obj_item->id_tratamiento)
                                    <option value="{{ $obj_item->id_tratamiento }}" selected>{{ $obj_item->desc_tratamiento }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tratamiento }}">{{ $obj_item->desc_tratamiento }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_tratamiento_tb',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Tratamiento td</td>
                      <td>
                        <select name="id_tratamiento_tb" placeholder="id_tratamiento_tb" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tratamiento_tb as $obj_item)
                                @if($obj_tabla->id_tratamiento_tb == $obj_item->id_tratamiento_tb)
                                    <option value="{{ $obj_item->id_tratamiento_tb }}" selected>{{ $obj_item->desc_tratamiento_tb }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tratamiento_tb }}">{{ $obj_item->desc_tratamiento_tb }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('id_cant_servicios',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Servicios</td>
                      <td>
                        <select name="id_cant_servicios" placeholder="id_cant_servicios" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_cant_servicios as $obj_item)
                                @if($obj_tabla->id_cant_servicios == $obj_item->id_cant_servicios)
                                    <option value="{{ $obj_item->id_cant_servicios }}" selected>{{ $obj_item->desc_cant_servicios }} </option>
                                @else
                                    <option value="{{ $obj_item->id_cant_servicios }}">{{ $obj_item->desc_cant_servicios }} </option>
                                @endif  
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    @endif
                    @if(in_array('col_sitesting',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Servicio de Index Testing</td>
                      <td>
                        <select name="col_sitesting" id="col_sitesting" placeholder="col_sitesting" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            <option value="2" @if ($obj_tabla -> id_indicador == 2) selected @endif >Ofrecen</option>
                            <option value="3" @if ($obj_tabla -> id_indicador == 3) selected @endif >Aceptan</option>
                        </select>
                      </td>
                    </tr>
                    @endif

                    @if(in_array('cant_personas',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cantidad Personal</td>
                      <td><input type="text" maxlength="6" class="form-control" name="cant_personas" id="cant_personas" placeholder="Solo Numeros Enteros" pattern="^[1-9]\d*$" step="0.01" value="{{ $obj_tabla->cant_personas }}" required ></td>
                    </tr>
                    @endif
                    @if(in_array('gasto',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Gasto Total</td>
                      <td><input type="text" maxlength="12" class="form-control" name="gasto" id="gasto" placeholder="Solo Numeros, 2 decimales maximo" pattern="^[0-9]+\.?[0-9]*$" value="{{ $obj_tabla->gasto }}" required ></td>
                    </tr>
                    @endif
                    @if(in_array('cant_servi_prueba',$obj_param->def_columns['name_col']))
                    <tr>
                      <td>Cantidad</td>
                      <td><input type="text" maxlength="6" class="form-control" name="cant_servi_prueba" id="cant_servi_prueba" placeholder="Solo Numeros Enteros" pattern="^[1-9]\d*$" value="{{ $obj_tabla->cant_servi_prueba }}" required ></td>
                    </tr>
                    @endif

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('ropanual/index_datosanuales')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


