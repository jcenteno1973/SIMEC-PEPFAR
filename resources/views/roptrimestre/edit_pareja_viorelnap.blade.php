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
             {!! Form::open(['route' => 'roptrimestre/edit_pareja_viorelnap', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_tabla->id_index_testing }}">
                <input type="hidden" id="ind_id_index_testing" name="ind_id_index_testing" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    <tr>
                      <td>Tipo de Violencia</td>
                      <td>
                        <select name="id_tipo_violencia" id="id_tipo_violencia" class="form-control" required>
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_violencia as $obj_item)
                                @if($obj_tabla->id_tipo_violencia == $obj_item->id_tipo_violencia)
                                    <option value="{{ $obj_item->id_tipo_violencia }}" selected>{{ $obj_item->desc_tipo_violencia }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_violencia }}">{{ $obj_item->desc_tipo_violencia }} </option>
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
                          <a href="{{route('roptrimestre/index_pareja')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


