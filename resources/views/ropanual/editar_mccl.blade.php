<!-- 
     * Nombre del archivo:editar_catalogo.blade.php
     * Descripción: Modificación de un nuevo catalogo
     * Fecha de creación:10/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>editar_catalogo.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla editar catálogo</h4>
@stop 
@section('menu_lateral')
<div class="list-group">

</div>
@stop
@section('contenido')
    <p>hi</p>
@stop   
