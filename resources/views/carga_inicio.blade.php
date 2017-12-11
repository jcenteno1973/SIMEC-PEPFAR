<!-- 
     * Nombre del archivo:carga_inicio.blade.php
     * Descripción: Vista de menu carga de archivo
     * Fecha de creación:24/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>carga_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="carga/nueva_carga" class="list-group-item">Nueva carga de archivos</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar carga de archivo</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">Carga de archivo</div>
    <center>
        <br>
        <img src="{{asset('images/carga.jpg')}}" height="100px" width="100px" alt="Carga de archivo"/><br>
        Usted se encuentra en el m&oacute;dulo Carga de archivo.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   

