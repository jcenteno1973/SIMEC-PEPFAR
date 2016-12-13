<!-- 
     * Nombre del archivo:solicitud_inicio.blade.php
     * Descripción: inicio para modulo solicitud
     * Fecha de creación:11/12/2016
     * Creado por: Yamileth Campos
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Buscar solicitud de movimiento</a>
    <a href="#" class="list-group-item">Nueva solicitud de movimiento</a>
    <a href="#" class="list-group-item">Buscar solicitud de descargo</a>
    <a href="#" class="list-group-item">Nueva solicitud de descargo</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">SOLICITUDES</div>
    <center>
        <br>
        <img src="{{asset('images/solicitudes.jpg')}}" alt="solicitudes"/><br>
        Usted se encuentra en el m&oacute;dulo Solicitudes.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   
