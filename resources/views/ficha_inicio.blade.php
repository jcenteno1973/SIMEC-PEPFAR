<!-- 
     * Nombre del archivo:ficha_inicio.blade.php
     * Descripción: Vista de menu ficha
     * Fecha de creación:12/12/16
     * Creado por: Yamileth Campos
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="ficha/buscar_ficha" class="list-group-item">Buscar ficha</a>
    <a href="ficha/nueva_ficha_inmueble" class="list-group-item">Nueva ficha inmueble</a>
    <a href="ficha/nueva_ficha_mueble" class="list-group-item">Nueva ficha mueble</a>
    <a href="ficha/nueva_ficha_vehiculo" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">FICHA</div>
    <center>
        <br>
        <img src="{{asset('images/ficha.jpg')}}" alt="Ficha"/><br>
        Usted se encuentra en el m&oacute;dulo ficha.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   
