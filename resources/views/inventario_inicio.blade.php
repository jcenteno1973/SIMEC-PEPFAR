{{-- 
     * Nombre del archivo:inventario_inicio.blade.php
     * Descripción: Vista de menu inventario
     * Fecha de creación:12/12/2016
     * Creado por: Yamileth Campos
     *
     * Modificado por: Karla Barrera
     * Descripción: Rutas verificaci&oacute;n f&iacute;sica
     * Fecha de modificación:28/12/2016
--}}

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="administracion/verificacion_fisica" class="list-group-item">Buscar verificaci&oacute;n f&iacute;sica</a>
    <a href="administracion/verificacion_fisica/create" class="list-group-item">Nueva verificaci&oacute;n f&iacute;sica</a>
    <a href="#" class="list-group-item">Buscar ficha de descargo</a>
    <a href="#" class="list-group-item">Ejecutar destino</a>
    <a href="#" class="list-group-item">Revertir destino</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">INVENTARIO</div>
    <center>
        <br>
        <img src="{{asset('images/inventario.jpg')}}" alt="inventario"/><br>
        Usted se encuentra en el m&oacute;dulo Inventario.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
</div>
@stop   
