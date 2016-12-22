@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla consultar bitácora</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>   
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a class="list-group-item active">Consultar bit&aacute;cora</a>
    <a href="../administracion/catalogos" class="list-group-item">Catálogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
            
                <div class="form-group" >
                    <br /><br />Código de usuario
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Código de usuario'])!!}
                  &nbsp;&nbsp;<br /><br /><br />Fecha:&nbsp;&nbsp;&nbsp;&nbsp;Desde                  
                  {!!Form::text('name',null,['class'=>'form-control datepicker', 'placeholder'=>'Fecha inicio'])!!}
                  &nbsp;&nbsp;Hasta
                  {!!Form::text('name',null,['class'=>'form-control datepicker', 'placeholder'=>'Fecha fin'])!!}
                </div>
                 &nbsp;&nbsp; &nbsp;
                <br /><br /><br />
   {!! Form::close() !!}
    
</div>
<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
@stop