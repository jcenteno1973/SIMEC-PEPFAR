<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:08/01/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla reporte ficha inmueble</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
   <a href="../ficha/buscar_ficha" class="list-group-item">Buscar ficha</a>
   <a href="../ficha/nueva_ficha_inmueble" class="list-group-item">Nueva ficha inmueble</a>
   <a href="../ficha/nueva_ficha_mueble" class="list-group-item">Nueva ficha mueble</a>
    <a href="../ficha/nueva_ficha_vehiculo" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop
@section('contenido')
<iframe src="{{$reporte_generado}}" width="100%" height="500px">   
</iframe> 
@stop   
