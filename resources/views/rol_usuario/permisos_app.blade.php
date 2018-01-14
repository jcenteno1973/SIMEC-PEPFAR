<!-- 
     * Nombre del archivo:permisos_app.blade.php
     *  Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>permiso_app.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Asignar permisos</h4>    
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
   <a href="../administracion/reporte_usuario" class="list-group-item">Reporte de usuarios</a>     
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="../administracion/consultar_archivo_datos" class="list-group-item">Consultar archivos</a>
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel panel-heading">
     <h5 class="text-center">Asignar permisos al rol {{$nombre_rol}}</h5>    
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => 'administracion/asignar_permiso', 'class' => 'form']) !!}
        <input type="hidden" name="nombre_rol" value={{$nombre_rol}} > 
        <table class="table table-striped table-bordered">   
    <thead>
      <tr>
        <th>Nombre del permiso</th>
        <th><center>Seleccionar</center></th>
      </tr>
    </thead>
    <tbody>        
      @foreach($obj_permiso_app as $obj_permisos_app)
      <tr>
      <td>
         {{ $obj_permisos_app->nombre_mostrar }} 
      </td>
      <td>
        <center>
        {!! Form::checkbox('permisos[]', $obj_permisos_app->id_permiso_app, in_array($obj_permisos_app->id_permiso_app, $rolePermissions) ? true : false)!!}
        </center>
      </td>
      </tr>   
   @endforeach   
    </tbody>   
  </table> 
  <button type="submit" class="btn btn-primary">Guardar</button> 
  <a href="{{route('administracion/editar_rol')}}" class="btn btn-primary"> Regresar</a>
  @include('usuario_app/ayuda_usuario/ayuda_permiso_app')   
  {!! Form::close() !!}
  </div>
</div> 
@stop
