<!-- 
     * Nombre del archivo:reportes.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_reportes')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>reportes.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla de reportes</h4>
@stop 
@section('contenido')
<iframe src="{{$reporte_generado}}" width="100%" height="800px">  
</iframe> 
@stop   
