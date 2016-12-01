<!-- 
     * Nombre del archivo:ficha_buscar.blade.php
     * Descripción: Vista para buscar ficha
     * Fecha de creación:28/11/2016
     * Creado por: KB
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar ficha</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ficha</a>
    <a href="#" class="list-group-item">Nueva ficha inmueble</a>
    <a href="#" class="list-group-item">Nueva ficha mueble</a>
    <a href="#" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop
<!--
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'form']) !!}
    <table class="table">   
    <thead>
      <tr>
        <th>#</th>
        <th>C&oacute;digo de inventario</th>
        <th>Descripci&oacute;n</th>
        <th>Unidad o Departamento</th>
        <th>Seleccionar</th>        
      </tr>
    </thead>
    <tbody> 
        -->
        <!--
  @foreach($obj_usuario as $obj_usuarios)
      <tr>
        <td>{{$obj_usuarios->id_usuario_app}}</td>
        <td>{{$obj_usuarios->nombre_usuario}}</td>
        <td></td>
        <td>
            @if($obj_usuarios->estado_usuario==1)
            Activo
            @else
            Bloqueado
            @endif
        </td>        
        <td>{!! Form::radio('seleccionar', null, ['class' => 'form-control' , 'required' => 'required']) !!}</td>       
      </tr>
   @endforeach   
    </tbody>  -->
  </table>
 {!! Form::close() !!}
</div>
@stop   
