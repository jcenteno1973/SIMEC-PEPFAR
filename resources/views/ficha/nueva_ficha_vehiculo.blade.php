<!-- 
     * Nombre del archivo:nueva_ficha_vehiculo.blade.php
     * Descripción: 
     * Fecha de creación:24/12/16
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Buscar ficha</a>
    <a href="#" class="list-group-item">Nueva ficha inmueble</a>
    <a href="#" class="list-group-item">Nueva ficha mueble</a>
    <a class="list-group-item active">Nueva ficha veh&iacute;culo</a>
</div>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla nueva ficha vehiculo</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
    
    
</div>
@stop   