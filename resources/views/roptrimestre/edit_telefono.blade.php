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
             {!! Form::open(['route' => 'roptrimestre/edit_telefono', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_telefono" name="id_telefono" value="{{ $obj_tabla->id_telefono }}">
                <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    <tr>
                      <td>Numero de telefono o Referencia</td>
                      <td><input type="text" maxlength="30" class="form-control" name="numero_telefono" id="numero_telefono" placeholder="numero_telefono" value="{{ $obj_tabla->numero_telefono }}" required autofocus></td>
                    </tr>
                    <tr>
                      <td>Tipo</td>
                      <td>
                        <select name="id_tipo" placeholder="id_tipo" class="form-control" >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo as $obj_item)
                                @if($obj_tabla->id_tipo == $obj_item->id_tipo)
                                    <option value="{{ $obj_item->id_tipo }}" selected>{{ $obj_item->descripcion_tipo }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo }}">{{ $obj_item->descripcion_tipo }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Enviar SMS</td>
                      <td><input type="checkbox" class="custom-control-input" name="enviar_sms" id="enviar_sms" value="1" @if ($obj_tabla -> enviar_sms != 0) checked @endif></td>
                    </tr>
                    <tr>
                      <td>Telefono Principal</td>
                      <td><input type="checkbox" class="custom-control-input" name="principal" id="principal" value="1" @if ($obj_tabla -> principal != 0) checked @endif></td>
                    </tr>

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('roptrimestre/index_telefono')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


