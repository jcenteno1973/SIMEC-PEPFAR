<!-- 
     * Nombre del archivo:buscar_desglose_asig.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:19/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_desglose_asig.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla editar desglose asignados</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('configuracion/nuevo_indicador')}}" class="list-group-item">Nuevo indicador</a>
    <a href="{{route('configuracion/buscar_indicador')}}" class="list-group-item">Buscar indicador</a>
    <a href="{{route('configuracion/buscar_af')}}" class="list-group-item">Buscar archivo fuente</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
   <div class="panel-body">
       {!! Form::open(['route' => 'configuracion/update_desglose','class' => 'form']) !!}
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th><center>Id</center></th>
        <th><center>Desglose primer nivel</center></th> 
        <th><center>Desglose segundo nivel</center></th> 
        <th><center>Columna archivo fuente</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_desglose_asig as $obj_desglose_asigs)
            <tr>
                <td><center>{!! Form::text('id_asignar_desglose[]', $obj_desglose_asigs->id_asignar_desglose,['class' => 'form-control', 'readonly' => 'true'])!!}</center></td>
                @foreach($obj_catalogo as $obj_catalogos)
                @if($obj_desglose_asigs->id_catalogo==$obj_catalogos->id_catalogo)
                <td>{{$obj_catalogos->desglose}}</td>
                @endif
                @endforeach
                @if($obj_desglose_asigs->cat_id_catalogo==null)
                <td></td>
                @else
                @foreach($obj_catalogo as $obj_catalogos)
                @if($obj_desglose_asigs->cat_id_catalogo==$obj_catalogos->id_catalogo)
                <td>{{$obj_catalogos->desglose}}</td>
                @endif
                @endforeach
                @endif
                <td>
                 {!! Form::number('columna[]', $obj_desglose_asigs->columna_archivo_fuente)!!}
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div> 
     <div>
         <button type="submit" class="btn btn-primary">Guardar</button>  
          <a href="{{route('configuracion/buscar_af')}}" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')   
        </div>
    {!! Form::close() !!}      
</div>
@stop   