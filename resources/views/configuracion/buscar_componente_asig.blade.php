<!-- 
     * Nombre del archivo:buscar_componente_asig.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:17/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_componente_asig.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla editar componentes asignados</h4>
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
       {!! Form::open(['route' => 'configuracion/update_componente','class' => 'form']) !!}
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th><center></center></th>
        <th><center>Id</center></th>
        <th><center>Componente</center></th> 
        <th><center>Fila archivo fuente</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_componente_asig as $obj_componente_asigs)
            <tr> 
                <td><center>{!! Form::hidden('id_archivo_fuente[]', $obj_componente_asigs->id_archivo_fuente,['class' => 'form-control', 'readonly' => 'true'])!!}</center></td>
                <td><center>{!! Form::text('id_componente[]', $obj_componente_asigs->id_componente,['class' => 'form-control', 'readonly' => 'true'])!!}</center></td>
                @foreach($obj_componente as $obj_componentes)
                @if($obj_componente_asigs->id_componente==$obj_componentes->id_componente)
                <td>{{$obj_componentes->descripcion_componente}}</td>
                @endif
                @endforeach
                <td>
                 {!! Form::number('fila[]', $obj_componente_asigs->fila_archivo_fuente)!!}
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div> 
     <div>
         <button type="submit" class="btn btn-primary">Guardar</button>  
          <a href="{{route('configuracion/buscar_af')}}" class="btn btn-primary"> Regresar</a>
          @include('ayuda/ayuda_nuevo_usuario')   
        </div>
    {!! Form::close() !!}      
</div>
@stop   