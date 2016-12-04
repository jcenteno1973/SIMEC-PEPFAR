<!--      
     * Nombre del archivo:parametros_consultar_bitacora.blade.php
     * Descripción: Parámetros para consultar bitácora
     * Fecha de creación:3/12/2016
     * Creado por: Karla Barrera    
-->

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Par&aacute;metros para Reporte de bit&aacute;cora</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/contrasenia/cambiar" class="list-group-item">Cambio de contraseña</a>
    <a href="../admin/rol/create" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="administracion/parametros_bitacora" class="list-group-item active">Consultar bit&aacute;cora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">    
        <!-- filtro busqueda de usuario, los "&nbsp; son espacios"-->
        {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
            
                <div class="form-group" >
                    <br /><br />Nombre de usuario
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre de usuario'])!!}
                  &nbsp;&nbsp;<br /><br /><br />Fecha&nbsp;&nbsp;&nbsp;&nbsp;Desde
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Fecha inicio'])!!}
                  &nbsp;&nbsp;Hasta
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Fecha fin'])!!}
                </div>
                 &nbsp;&nbsp; &nbsp;
                
   {!! Form::close() !!}
    <!-- fin filtro busqueda usuario-->
     
</div>
@stop   