<!-- 
     * Nombre del archivo:reporte_usuarios.blade.php
     * Descripción:Vista para visualizar el reporte de los usuarios
     * Fecha de creación:12/01/2018
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_reportes_admin')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>reporte_usuarios.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla reporte de usuarios</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>  
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a class="list-group-item active">Reporte de usuarios</a> 
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="../administracion/consultar_archivo_datos" class="list-group-item">Consultar archivos</a>
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<iframe src="{{$reporte_generado}}" width="100%" height="800px">  
</iframe> 
@stop   
