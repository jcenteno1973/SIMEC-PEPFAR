<!-- 
     * Nombre del archivo:procesos_inicio.blade.php
     * Descripción: Vista menu procesos
     * Fecha de creación:12/12/2016
     * Creado por: Yamileth Campos
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Calcular depreciaci&oacute;n</a>
    <a href="#" class="list-group-item">Cierre mensual</a>
    <a href="#" class="list-group-item">Consultar cierre mensual</a>
    <a href="#" class="list-group-item">Revertir cierre mensual</a>
    <a href="#" class="list-group-item">Entrega y recepci&oacute;n por inventario</a>
    <a href="#" class="list-group-item">Conciliaci&oacute;n de inventarios</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">PROCESOS</div>
    <center>
        <br>
        <img src="{{asset('images/proceso.jpg')}}" alt="procesos"/><br>
        Usted se encuentra en el m&oacute;dulo Procesos.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   
