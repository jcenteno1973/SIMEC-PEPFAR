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
             {!! Form::open(['route' => 'administracion/create_tablagen', 'class' => 'form','autocomplete'=>'off']) !!}
                <input type="hidden" id="id_template" name="id_template" value="{{ $obj_filtro }}">
                <table class="table table-condensed">
                    
        @if(count($obj_param->columns['name_col']) > 0)
            @foreach($obj_param->columns['name_col'] as $obj_idx=>$obj_col)
                    <tr>
                        @if( $obj_param->columns['type_col'][$obj_idx] == "number")
                            <tr>
                                <td>{{ $obj_param->columns['label_col'][$obj_idx] }}</td>
                                <td><input type="text" maxlength="6" class="form-control" name="{{$obj_param->columns['name_col'][$obj_idx]}}" id="{{$obj_param->columns['name_col'][$obj_idx]}}" placeholder="Solo Numeros Enteros" pattern="^[0-9]\d*$" ></td>
                            </tr>
                        @endif
                        
                        @if( $obj_param->columns['type_col'][$obj_idx] == "text")
                            <tr>
                                <td>{{ $obj_param->columns['label_col'][$obj_idx] }}</td>
                                <td><input type="text" class="form-control" name="{{$obj_param->columns['name_col'][$obj_idx]}}" id="{{$obj_param->columns['name_col'][$obj_idx]}}" placeholder="Ingrese un Texto" ></td>
                            </tr>
                        @endif
                        
                        @if( $obj_param->columns['type_col'][$obj_idx] == "select")
                        <td>{{ $obj_param->columns['label_col'][$obj_idx] }}</td>
                        <td>
                        <select name="{{$obj_param->columns['name_col'][$obj_idx]}}" placeholder="{{$obj_param->columns['name_col'][$obj_idx]}}" class="form-control" >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach($obj_select_cat as $obj_item)
                                <option value="{{ $obj_item->id }}">{{ $obj_item->nombre }} </option>
                            @endforeach
                        </select>
                        </td>
                        @endif

                    </tr>
            @endforeach
        @endif

                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('administracion/index_tablagen')}}/{{ $obj_filtro }}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>
                      </td>
                    </tr>
                </table>
                <p>* Todos los Campos son requeridos</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


