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
<p ALIGN=center>ropanual_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>{{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('menu_lateral')
<div class="list-group">
    <a href="roptrimestre/index_indextesting" class="list-group-item">Indicadores</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">ROP Cascada</div>
    <div class="panel-body">
    <center>
        <br>
        <img src="{{asset('images/admins.jpg')}}"/><br>
        Usted se encuentra en el m&oacute;dulo ROP Cascada.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop  