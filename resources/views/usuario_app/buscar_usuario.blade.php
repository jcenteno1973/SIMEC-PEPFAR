<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:20/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar usuario</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="#" class="list-group-item">Cambio de contraseña</a>
    <a href="#" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'form']) !!}
    <table class="table">   
    <thead>
      <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Seleccionar</th>        
      </tr>
    </thead>
    <tbody>
  @foreach($obj_usuario as $obj_usuarios)
      <tr>
        <td>{{$obj_usuarios->id_usuario_app}}</td>
        <td>{{$obj_usuarios->nombre_usuario}}</td>
        <td></td>
        <td>
            @if($obj_usuarios->estado_usuario==1)
            Activo
            @else
            Bloqueado
            @endif
        </td>        
        <td>{!! Form::radio('seleccionar', null, ['class' => 'form-control' , 'required' => 'required']) !!}</td>       
      </tr>
   @endforeach   
    </tbody>
  </table>
 {!! Form::close() !!}
</div>
@stop   
