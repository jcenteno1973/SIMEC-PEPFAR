<!-- 
     * Nombre del archivo:reportes_inicio.blade.php
     * Descripción: Vista para menu reportes
     * Fecha de creación:12/12/2016
     * Creado por: 
-->
@extends('plantillas.plantilla_sin_columna')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('nombre_pantalla')
<h4 class="text-center">Pantalla de reportes</h4>
@stop 
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">Reportes</div>
    <div class="panel-body">
        <!-- la tabla del menu-->
        <div class="container">
            <iframe src="http://34.223.215.84:8080/pentaho/api/repos/%3Acascada.prpt/viewer?userid=admin&password=password" width="100%" height="700px">
        </div>
        <!--fin tabla de menu-->

    </div>
</div>

@stop   
