<!-- 
     * Nombre del archivo:administracion_inicio.blade.php
     * Descripción:Pantalla del modulo de administración
     * Fecha de creación:11/12/2016
     * Creado por: 

-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>administracion_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('menu_lateral')
<div class="list-group">
    <a href="administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>    
    <a href="administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="administracion/consultar_archivo_datos" class="list-group-item">Consultar archivo</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">ADMINISTRACION</div>
    <div class="panel-body">
    <center>
        <br>
        <img src="{{asset('images/admins.jpg')}}"/><br>
        Usted se encuentra en el m&oacute;dulo Administraci&oacute;n.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop  