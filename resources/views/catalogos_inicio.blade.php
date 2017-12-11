<!-- 
     * Nombre del archivo:catalogos_inicio.blade.php
     * Descripción: Vista de menu carga de archivo
     * Fecha de creación:10/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>catalogos_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="catalogos/nuevo_evento" class="list-group-item">Nuevo evento</a>
    <a href="catalogos/buscar_evento" class="list-group-item">Buscar evento</a>
    <a href="carga/nueva_carga" class="list-group-item">Nuevo catalogo</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar catalogo</a>
    <a href="carga/nueva_carga" class="list-group-item">Nuevo indicador</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar indicador</a>
    <a href="carga/nueva_carga" class="list-group-item">Nuev componente</a>
    <a href="carga/buscar_carga" class="list-group-item">Buscar componente</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">Configuración</div>
    <center>
        <br>
        <img src="{{asset('images/catalogo.png')}}" height="100px" width="100px" alt="Configuración"/><br>
        Usted se encuentra en el m&oacute;dulo de Catálogos.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   
