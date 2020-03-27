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
             {!! Form::open(['route' => 'roptrimestre/create_agenda', 'class' => 'form','autocomplete'=>'off']) !!}
             <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    <tr>
                      <td>Tipo</td>
                      <td>
                        <select name="id_tipo_mensaje" placeholder="id_tipo_mensaje" class="form-control" >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_mensaje as $obj_item)
                            <option value="{{ $obj_item->id_tipo_mensaje }}">{{ $obj_item->descripcion_tipo_mensaje }} </option>
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>fecha_agenda</td>
                      <td><input type="text" maxlength="30" class="form-control" name="fecha_agenda" id="numero_telefono" placeholder="0000-00-00" ></td>
                    </tr>
                    <tr>
                      <td>Observacion</td>
                      <td><input type="text" maxlength="30" class="form-control" name="observacion" id="observacion" placeholder="Ingrese una Observacion" ></td>
                    </tr>
                    
                    <tr>
                      <td>Cancelada</td>
                      <td><input type="checkbox" class="custom-control-input" name="cancelada" id="cancelada" value="1"></td>
                    </tr>
                    <tr>
                      <td>Realizada</td>
                      <td><input type="checkbox" class="custom-control-input" name="realizada" id="realizada" value="1"></td>
                    </tr>

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('roptrimestre/index_agenda')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


