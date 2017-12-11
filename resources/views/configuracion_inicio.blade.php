<!-- 
     * Nombre del archivo:configuracion_inicio.blade.php
     * Descripción: Vista de menu carga de archivo
     * Fecha de creación:10/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>configuracion_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="carga/nueva_carga" class="list-group-item">Nuevo archivo fuente</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar archivo fuente</a>
    <a href="carga/nueva_carga" class="list-group-item">Nuevo indicador</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar indicador</a>
    <a href="carga/nueva_carga" class="list-group-item">Asignar componente</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar asignacion de componente</a>
    <a href="carga/nueva_carga" class="list-group-item">Asignar desglose</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar asignar desglose</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">Configuración</div>
    <center>
        <br>
        <img src="{{asset('images/configuracion.png')}}" height="100px" width="100px" alt="Configuración"/><br>
        Usted se encuentra en el m&oacute;dulo Configuración.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   