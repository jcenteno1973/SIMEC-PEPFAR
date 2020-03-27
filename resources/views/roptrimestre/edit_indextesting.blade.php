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
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">{{ $obj_param->nombre_opcion }}</h4>  
@stop 
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">         
        <!--Crear nuevo rol-->
        <div class="col-lg-8">
             {!! Form::open(['route' => 'roptrimestre/edit_indextesting', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_tabla->id_index_testing }}">
                <table class="table table-condensed">
                    <tr>
                      <td>Pais</td>
                      <td><input type="text" maxlength="150" class="form-control" name="pais" placeholder="pais" value="{{ $obj_tabla -> get_municipio -> get_departamento -> get_region_sica -> nombre_pais  }}" disabled></td>
                    </tr>
                    <tr>
                      <td>Departamento</td>
                      <td>
                        <select onchange="cambiar();" id="id_departamento" name="id_departamento" placeholder="id_departamento" class="form-control">
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_departamento as $obj_item)
                                @if($obj_tabla->get_municipio->get_departamento->id_departamento == $obj_item->id_departamento)
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
                        <select id="id_municipio" name="id_municipio" placeholder="id_municipio" class="form-control">
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_municipio as $obj_item)
                                @if($obj_tabla->id_municipio == $obj_item->id_municipio)
                                    <option value="{{ $obj_item->id_municipio }}" selected>{{ $obj_item->nombre_municipio }} </option>
                                @else
                                    <option value="{{ $obj_item->id_municipio }}">{{ $obj_item->nombre_municipio }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>direccion</td>
                      <td><input type="text" maxlength="150" class="form-control" name="direccion" placeholder="direccion" value="{{ $obj_tabla -> direccion }}"></td>
                    </tr>
                    <tr>
                      <td>No. Expediente</td>
                      <td><input type="text" maxlength="30" class="form-control" name="no_expediente" placeholder="no_expediente" value="{{ $obj_tabla -> no_expediente }}"></td>
                    </tr>
                    <tr>
                      <td>No. Documento</td>
                      <td><input type="text" maxlength="30" class="form-control" name="no_documento" placeholder="no_documento" value="{{ $obj_tabla -> no_documento }}"></td>
                    </tr>
                    <tr>
                      <td>Nombres</td>
                      <td><input type="text" maxlength="30" class="form-control" name="nombres" placeholder="nombres" value="{{ $obj_tabla -> nombres }}"></td>
                    </tr>
                    <tr>
                      <td>Apellidos</td>
                      <td><input type="text" maxlength="30" class="form-control" name="apellidos" placeholder="apellidos" value="{{ $obj_tabla -> apellidos }}"></td>
                    </tr>
                    <tr>
                      <td>edad</td>
                      <td><input type="number" min="0" max="120" class="form-control" name="edad" value="{{ $obj_tabla -> edad }}" required></td>
                    </tr>
                    <tr>
                      <td>sexo</td>
                      <td>
                        <select onchange="ifGenero(event);" id="id_sexo" name="id_sexo" placeholder="id_sexo" class="form-control" required>
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
                    <tr>
                      <td>Orientacion Sexual</td>
                      <td>
                        <select name="id_orientacion_sexual" placeholder="id_orientacion_sexual" class="form-control">
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_orientacion_sexual as $obj_item)
                                @if($obj_tabla->id_orientacion_sexual == $obj_item->id_orientacion_sexual)
                                    <option value="{{ $obj_item->id_orientacion_sexual }}" selected>{{ $obj_item->desc_orientacion_sexual }} </option>
                                @else
                                    <option value="{{ $obj_item->id_orientacion_sexual }}">{{ $obj_item->desc_orientacion_sexual }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Poblacion Meta</td>
                      <td>
                        <select name="id_poblacion_meta" placeholder="id_poblacion_meta" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_poblacion_meta as $obj_item)
                                @if($obj_tabla->id_poblacion_meta == $obj_item->id_poblacion_meta)
                                    <option value="{{ $obj_item->id_poblacion_meta }}" selected>{{ $obj_item->desc_poblacion_meta }} </option>
                                @else
                                    <option value="{{ $obj_item->id_poblacion_meta }}">{{ $obj_item->desc_poblacion_meta }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Tipo Diagnostico</td>
                      <td>
                        <select name="id_tipo_diagnostico" placeholder="id_tipo_diagnostico" class="form-control">
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
                    <tr>
                      <td>Clinica donde realizo el Diagnostico</td>
                      <td><input type="text" maxlength="100" class="form-control" name="clinica_diagnostico" placeholder="clinica_diagnostico" value="{{ $obj_tabla -> clinica_diagnostico }}" ></td>
                    </tr>
                    <tr>
                      <td>Fecha de Entrega del Diagnostico</td>
                      <td><input type="text" maxlength="30" class="form-control" name="fecha_entrega" placeholder="fecha_entrega" value="{{ $obj_tabla -> fecha_entrega }}" ></td>
                    </tr>
                    <tr>
                      <td>Fecha de abordaje index testing</td>
                      <td><input type="text" maxlength="30" class="form-control" name="fecha_abordaje" placeholder="fecha_abordaje" value="{{ $obj_tabla -> fecha_abordaje }}" ></td>
                    </tr>
                    <tr>
                      <td>Caso indice fue pareja referida</td>
                      <td><input type="checkbox" class="custom-control-input" name="pareja_referida" @if ($obj_tabla -> pareja_referida != 0) checked @endif ></td>
                    </tr>
                    <tr>
                      <td>Oferta de index testing previa</td>
                      <td><input type="checkbox" class="custom-control-input" name="index_testing_previa" @if ($obj_tabla -> index_testing_previa != 0) checked @endif ></td>
                    </tr>
                    <tr>
                      <td>En falla Virologica</td>
                      <td><input type="checkbox" class="custom-control-input" name="falla_virologica" @if ($obj_tabla -> falla_virologica != 0) checked @endif ></td>
                    </tr>
                    <tr>
                      <td>VIH con ITS</td>
                      <td><input type="checkbox" class="custom-control-input" name="vih_its" @if ($obj_tabla -> vih_its != 0) checked @endif ></td>
                    </tr>
                    <tr>
                      <td>Embarazada</td>
                      <td><input type="checkbox" class="custom-control-input" name="embarazada" @if ($obj_tabla -> embarazada != 0) checked @endif ></td>
                    </tr>
                    <tr>
                      <td>Lactancia</td>
                      <td><input type="checkbox" class="custom-control-input" name="lactancia" @if ($obj_tabla -> lactancia != 0) checked @endif ></td>
                    </tr>
                    <tr>
                      <td>Motivo Rechazo index testing</td>
                      <td>
                        <select name="id_motivo_rechazo_index" placeholder="id_motivo_rechazo_index" class="form-control">
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_motivo_rechazo_index as $obj_item)
                                @if($obj_tabla->id_motivo_rechazo_index == $obj_item->id_motivo_rechazo_index)
                                    <option value="{{ $obj_item->id_motivo_rechazo_index }}" selected>{{ $obj_item->motivo_rechazo_index }} </option>
                                @else
                                    <option value="{{ $obj_item->id_motivo_rechazo_index }}">{{ $obj_item->motivo_rechazo_index }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Numero de parejas no referidas por riesgo de violencia</td>
                      <td><input type="number" min="0" max="120" class="form-control" name="no_referenciadas" value="{{ $obj_tabla -> no_referenciadas }}" ></td>
                    </tr>
                    <tr>
                      <td>Resultado prueba de incidencia</td>
                      <td>
                        <select name="id_resultado_incidencia" placeholder="id_resultado_incidencia" class="form-control">
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
                    <tr>
                      <td>Tipo de prueba de incidencia</td>
                      <td>
                        <select name="id_tipo_prueba_incidencia" placeholder="id_tipo_prueba_incidencia" class="form-control">
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

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('roptrimestre/index_indextesting')}}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>

<script type="text/javascript">
    /*
     * Validar la fecha inicial y final
     */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });


    // Definición de la función cambiar()
    function cambiar()
    {
        var id1 = document.getElementById("id_departamento");
        var id2 = document.getElementById("id_municipio");
        
        for (var i = 0; i < id2.options.length; i++)
        {
            // -- Inicio del comentario -- 
            // Muestra solamente los id2 que sean iguales a los id1 seleccionados, según la propiedad display
            if(id2.options[i].getAttribute("codigo") == id1.options[id1.selectedIndex].getAttribute("codigo") || id2.options[i].getAttribute("codigo") == "")
            { id2.options[i].style.display = "block"; }
            else
            { id2.options[i].style.display = "none"; }
            // -- Fin del comentario --
        }
        id2.value = "";
    }

    function ifGenero(val)
    {
        if (document.getElementById("id_sexo").value == "F")
        {
            $('#embarazada').attr('disabled', false);
            $('#lactancia').attr('disabled', false);
        }
        else
        {
            document.getElementById("embarazada").value = "";
            document.getElementById("lactancia").value = "";
            
            $('#embarazada').attr('disabled', true);
            $('#lactancia').attr('disabled', true);
        }
        
        // $('#id_sexo').attr('required', true);
        // $('#id_sexo').attr('required', false);
        // $('#id_sexo').attr('disabled', false);
        // document.getElementById("id_sexo").value = "" ;
    }
</script>
@stop   


