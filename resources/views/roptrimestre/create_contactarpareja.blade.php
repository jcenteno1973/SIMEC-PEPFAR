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
             {!! Form::open(['route' => 'roptrimestre/create_contactarpareja', 'class' => 'form','autocomplete'=>'off']) !!}
             <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_filtro }}">
             
                <table class="table table-condensed">
                    <tr>
                      <td>Modalidad</td>
                      <td>
                        <select onchange="ifSelected(event);" id="id_tipo_referencia" name="id_tipo_referencia" placeholder="id_tipo_referencia" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_referencia as $obj_item)
                            <option value="{{ $obj_item->id_tipo_referencia }}">{{ $obj_item->tipo_referencia }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    
                    <tr>
                      <td>Fecha Limite</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_limite" id="fecha_limite" placeholder="dd/mm/aaaa" disabled></td>
                    </tr>

                    <tr>
                      <td>¿Contacto con Exito?</td>
                      <td><input type="checkbox" onclick="ifChecked(event);" class="custom-control-input" name="contacto_exito" id="contacto_exito" value="1"></td>
                    </tr>
                    <tr>
                      <td>Fecha Contacto</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_contacto" id="fecha_contacto" placeholder="dd/mm/aaaa" disabled></td>
                    </tr>
                    
                    <tr>
                      <td>Pareja Acepto Realizar Prueba de VIH</td>
                      <td> 
                        <input type="radio" id="male" name="acepta" value="1" onchange="ifOption('male')" disabled>
                        <label for="male" disabled>Si</label><br>
                        <input type="radio" id="female" name="acepta" value="0" onchange="ifOption('female')" disabled>
                        <label for="female" disabled>No</label><br></td>
                    </tr>
                    
                    <tr>
                      <td>Motivo Rechazo (Obligatorio en NO)</td>
                      <td>
                          <select name="id_motivo_rechazo_index" id="id_motivo_rechazo_index" class="form-control" disabled>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_motivo_rechazo_index as $obj_item)
                            <option value="{{ $obj_item->id_motivo_rechazo_index }}">{{ $obj_item->motivo_rechazo_index }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td>Observacion</td>
                      <td><input type="text" maxlength="30" class="form-control" name="observacion" id="observacion" placeholder="observacion" disabled ></td>
                    </tr>

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('roptrimestre/index_contactarpareja')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>

<script>
    /*
     * Validar la fecha inicial y final
     */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
    
    function ifSelected(event)
    {
        var l_seleccion = document.getElementById("id_tipo_referencia").value;
        
        document.getElementById("fecha_limite").value = "" ;
        
        if (l_seleccion == 5)
        { 
            $('#fecha_limite').attr('disabled', false); 
            $('#fecha_limite').attr('required', true);
        }
        else
        { 
            $('#fecha_limite').attr('disabled', true); 
            $('#fecha_limite').attr('required', false);
        }
    }
    
    function ifChecked(event)
    {
        if ($('#contacto_exito').is(":checked"))
        {
            //quitamos los seleccionados
            $('#fecha_contacto').attr('disabled', false);
            $('#male').attr('disabled', false);
            $('#female').attr('disabled', false);
            $('#id_motivo_rechazo_index').attr('disabled', false);
            $('#observacion').attr('disabled', false);
            
            $('#fecha_contacto').attr('required', true);
            $('#male').attr('required', true);
        }
        else
        {
            document.getElementById("fecha_contacto").value = "" ;
            document.getElementById("male").value = "" ;
            document.getElementById("female").value = "" ;
            document.getElementById("id_motivo_rechazo_index").value = "" ;
            document.getElementById("observacion").value = "" ;
            
            //seleccionamos
            $('#fecha_contacto').attr('disabled', true);
            $('#male').attr('disabled', true);
            $('#female').attr('disabled', true);
            $('#id_motivo_rechazo_index').attr('disabled', true);
            $('#observacion').attr('disabled', true);
            
            $('#fecha_contacto').attr('required', false);
            $('#male').attr('required', false);
            
            $('#id_motivo_rechazo_index').attr('required', false);
        }
    }
    
    function ifOption(event)
    {
        if (val == "female")
        { $('#id_motivo_rechazo_index').attr('required', true); }
        else
        { $('#id_motivo_rechazo_index').attr('required', false); }
    }
    
</script>
@stop   


