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
             {!! Form::open(['route' => 'roptrimestre/edit_pareja', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_index_testing" name="id_index_testing" value="{{ $obj_tabla->id_index_testing }}">
                <input type="hidden" id="ind_id_index_testing" name="ind_id_index_testing" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    <tr>
                      <td>Nombres</td>
                      <td><input type="text" maxlength="30" class="form-control" name="nombres" placeholder="nombres" value="{{ $obj_tabla->nombres }}" ></td>
                    </tr>
                    <tr>
                      <td>Apellidos</td>
                      <td><input type="text" maxlength="30" class="form-control" name="apellidos" placeholder="apellidos" value="{{ $obj_tabla->apellidos }}" ></td>
                    </tr>
                    <tr>
                      <td>Tipo Pareja</td>
                      <td>
                        <select name="id_tipo_pareja" placeholder="id_tipo_pareja" class="form-control" >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_tipo_pareja as $obj_item)
                                @if($obj_tabla->id_tipo_pareja == $obj_item->id_tipo_pareja)
                                    <option value="{{ $obj_item->id_tipo_pareja }}" selected>{{ $obj_item->tipo_pareja }} </option>
                                @else
                                    <option value="{{ $obj_item->id_tipo_pareja }}">{{ $obj_item->tipo_pareja }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Nivel Riesgo</td>
                      <td>
                        <select name="id_nivel_riesgo" placeholder="id_nivel_riesgo" class="form-control" >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_nivel_riesgo as $obj_item)
                                @if($obj_tabla->id_nivel_riesgo == $obj_item->id_nivel_riesgo)
                                    <option value="{{ $obj_item->id_nivel_riesgo }}" selected>{{ $obj_item->desc_nivel_riesgo }} </option>
                                @else
                                    <option value="{{ $obj_item->id_nivel_riesgo }}">{{ $obj_item->desc_nivel_riesgo }} </option>
                                @endif
                            @endforeach
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>edad</td>
                      <td><input type="number" min="0" max="120" class="form-control" name="edad" id="edad" value="{{ $obj_tabla->edad }}" ></td>
                    </tr>
                    <tr>
                      <td>sexo</td>
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


