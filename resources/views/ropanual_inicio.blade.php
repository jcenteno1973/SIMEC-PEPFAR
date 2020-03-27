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
<div class="list-group animated fadeInLeft">
    <a href="ropanual/index_datosanuales/34" class="list-group-item">Mejora Continua de la Calidad en Laboratorios</a>
    <a href="ropanual/index_datosanuales/35" class="list-group-item">Mejora Continua de la calidad en Sitios de Prueba basado en puntos de Atención - POCT</a>
    <a href="ropanual/index_datosanuales/36" class="list-group-item">Prueba de Proeficiencia - PT - en laboratorios</a>
    <a href="ropanual/index_datosanuales/37" class="list-group-item">Prueba de Proeficiencia - PT - en POCT</a>
    <a href="ropanual/index_datosanuales/38" class="list-group-item">Numero de muestras para laboratorio</a>
    <a href="ropanual/index_datosanuales/39" class="list-group-item">Numero de Muestras para pruebas en sitios de Prueba basado en puntos de Atencion</a>
    <a href="ropanual/index_datosanuales/40" class="list-group-item">HRH_Curr</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">ROP ANUAL</div>
    <div class="panel-body">
    <center>
        <br>
        <img src="{{asset('images/admins.jpg')}}"/><br>
        Usted se encuentra en el m&oacute;dulo ROP Anual.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop  