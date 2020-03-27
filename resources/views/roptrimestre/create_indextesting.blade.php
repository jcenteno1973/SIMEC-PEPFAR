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
             {!! Form::open(['route' => 'roptrimestre/create_indextesting', 'class' => 'form','autocomplete'=>'off']) !!}
                <table class="table table-condensed">
                    <tr>
                      <td>Pais </td>
                      <td>
                        <select name="id_region_sica" placeholder="id_region_sica" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_region_sica as $obj_item)
                                @if(Auth::user()->id_region_sica == $obj_item->id_region_sica)
                                    <option codigo="{{ $obj_item->id_region_sica }}" value="{{ $obj_item->id_region_sica }}" selected>{{ $obj_item->nombre_pais }} </option>
                                @else
                                    <option codigo="{{ $obj_item->id_region_sica }}" value="{{ $obj_item->id_region_sica }}">{{ $obj_item->nombre_pais }} </option>
                                @endif
                            @endforeach
                        </select>

                      </td>
                    </tr>
                    <tr>
                      <td>Departamento</td>
                      <td>
                          <select onchange="cambiar();" id="id_departamento" name="id_departamento" placeholder="id_departamento" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_departamento as $obj_item)
                            <option codigo="{{ $obj_item->id_departamento }}" value="{{ $obj_item->id_departamento }}">{{ $obj_item->nombre_departamento }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Municipio</td>
                      <td>
                        <select id="id_municipio" name="id_municipio" placeholder="id_municipio" class="form-control" required>
                            <option codigo="" value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_municipio as $obj_item)
                            <option codigo="{{ $obj_item->id_departamento }}" value="{{ $obj_item->id_municipio }}">{{ $obj_item->nombre_municipio }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>direccion</td>
                      <td><input type="text" maxlength="150" class="form-control" name="direccion" placeholder="direccion" autofocus></td>
                    </tr>
                    <tr>
                      <td>No. Expediente</td>
                      <td><input type="text" maxlength="30" class="form-control" name="no_expediente" placeholder="no_expediente" autofocus></td>
                    </tr>
                    <tr>
                      <td>No. Documento</td>
                      <td><input type="text" maxlength="30" class="form-control" name="no_documento" placeholder="no_documento" ></td>
                    </tr>
                    <tr>
                      <td>Nombres</td>
                      <td><input type="text" maxlength="30" class="form-control" name="nombres" placeholder="nombres" required></td>
                    </tr>
                    <tr>
                      <td>Apellidos</td>
                      <td><input type="text" maxlength="30" class="form-control" name="apellidos" placeholder="apellidos" required></td>
                    </tr>
                    <tr>
                      <td>edad</td>
                      <td><input type="number" min="0" max="120" class="form-control" name="edad" required></td>
                    </tr>
                    <tr>
                      <td>sexo</td>
                      <td>
                        <select onchange="ifGenero(event);" id="id_sexo" name="id_sexo" placeholder="id_sexo" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_sexo as $obj_item)
                            <option value="{{ $obj_item->id_sexo }}">{{ $obj_item->descripcion_sexo }} </option>
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
                            <option value="{{ $obj_item->id_orientacion_sexual }}">{{ $obj_item->desc_orientacion_sexual }} </option>
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
                            <option value="{{ $obj_item->id_poblacion_meta }}">{{ $obj_item->desc_poblacion_meta }} </option>
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
                            <option value="{{ $obj_item->id_tipo_diagnostico }}">{{ $obj_item->tipo_diagnostico }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Clinica donde realizo el Diagnostico</td>
                      <td><input type="text" maxlength="100" class="form-control" name="clinica_diagnostico" placeholder="clinica_diagnostico" ></td>
                    </tr>
                    <tr>
                      <td>Fecha de Resultado</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_resultado_dx" id="fecha_resultado_dx" placeholder="dd/mm/aaaa" ></td>
                    </tr>
                    <tr>
                      <td>Fecha de Entrega del Diagnostico</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_entrega" id="fecha_entrega" placeholder="dd/mm/aaaa" ></td>
                    </tr>
                    <tr>
                      <td>Fecha de abordaje index testing</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_abordaje" id="fecha_abordaje" placeholder="dd/mm/aaaa" ></td>
                    </tr>
                    <tr>
                      <td>Caso indice fue pareja referida</td>
                      <td><input type="checkbox" class="custom-control-input" name="pareja_referida" value="1"></td>
                    </tr>
                    <tr>
                      <td>Oferta de index testing previa</td>
                      <td><input type="checkbox" class="custom-control-input" name="index_testing_previa" value="1"></td>
                    </tr>
                    <tr>
                      <td>En falla Virologica</td>
                      <td><input type="checkbox" class="custom-control-input" name="falla_virologica" value="1"></td>
                    </tr>
                    <tr>
                      <td>VIH con ITS</td>
                      <td><input type="checkbox" class="custom-control-input" name="vih_its" value="1"></td>
                    </tr>
                    <tr>
                      <td>Embarazada</td>
                      <td><input type="checkbox" class="custom-control-input"  id="embarazada" name="embarazada" value="1" disabled></td>
                    </tr>
                    <tr>
                      <td>Lactancia</td>
                      <td><input type="checkbox" class="custom-control-input" id="lactancia" name="lactancia" value="1" disabled></td>
                    </tr>
                    
                    <tr>
                      <td>Acepta NAP/C</td>
                      <td><input onclick="ifChk_AceptaNAP(event);" type="checkbox" class="custom-control-input" id="index_testing_previa" name="index_testing_previa" value="1"></td>
                    </tr>
                    
                    <tr>
                      <td>Motivo Rechazo NAP/C</td>
                      <td>
                        <select id="id_motivo_rechazo_index" name="id_motivo_rechazo_index" placeholder="id_motivo_rechazo_index" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_motivo_rechazo_index as $obj_item)
                            <option value="{{ $obj_item->id_motivo_rechazo_index }}">{{ $obj_item->motivo_rechazo_index }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Numero de parejas no referidas por riesgo de violencia</td>
                      <td><input type="number" min="0" max="120" class="form-control" name="no_referenciadas" id="no_referenciadas" ></td>
                    </tr>
                    <tr>
                      <td>Resultado prueba de incidencia</td>
                      <td>
                        <select name="id_resultado_incidencia" placeholder="id_resultado_incidencia" class="form-control">
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_resultado_incidencia as $obj_item)
                            <option value="{{ $obj_item->id_resultado_incidencia }}">{{ $obj_item->resultado_incidencia }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Fecha de Prueba Incidencia</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_prueba_incidencia" id="fecha_prueba_incidencia" placeholder="dd/mm/aaaa" ></td>
                    </tr>
                    <tr>
                      <td>Tipo de prueba de incidencia</td>
                      <td>
                        <select name="id_tipo_prueba_incidencia" placeholder="id_tipo_prueba_incidencia" class="form-control">
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_prueba_incidencia as $obj_item)
                            <option value="{{ $obj_item->id_tipo_prueba_incidencia }}">{{ $obj_item->tipo_prueba_incidencia }} </option>
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
    
    function ifChk_AceptaNAP(event)
    {
        if ($('#index_testing_previa').is(":checked"))
        {
            document.getElementById("id_motivo_rechazo_index").value = "";
            $('#id_motivo_rechazo_index').attr('disabled', true);
        }
        else
        {
            $('#id_motivo_rechazo_index').attr('disabled', false);
        }
    }
</script>

@stop   
