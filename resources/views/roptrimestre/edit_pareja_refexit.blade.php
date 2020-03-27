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
             {!! Form::open(['route' => 'roptrimestre/edit_pareja_refexit', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_tabla->id_index_testing }}">
                <input type="hidden" id="ind_id_index_testing" name="ind_id_index_testing" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    <tr>
                      <td>Resultado de la prueba VIH</td>
                      <td>
                        <select name="id_tipo_diagnostico" placeholder="id_tipo_diagnostico" class="form-control" >
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
                      <td>Fecha segun resultado</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_resultado_dx" id="fecha_resultado_dx" placeholder="dd/mm/aaaa" value="{{ $obj_tabla -> fecha_resultado_dx }}"></td>
                    </tr>
                    
                    <tr>
                      <td>Fecha segun entrega resultado</td>
                      <td><input type="text" maxlength="10" class="form-control datepicker" name="fecha_entrega" id="fecha_entrega" placeholder="dd/mm/aaaa" value="{{ $obj_tabla -> fecha_entrega }}"></td>
                    </tr>

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('roptrimestre/index_pareja')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
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
</script>
@stop   
