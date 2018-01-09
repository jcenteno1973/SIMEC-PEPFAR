<!-- 
     * Nombre del archivo:copia_seguridad.blade.php
     * Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>copia_seguridad.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('nombre_pantalla')
<h4 class="text-center">Pantalla de copia de seguridad</h4>
@stop
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>    
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="../administracion/consultar_archivo_datos" class="list-group-item">Consultar archivo</a>
    <a class="list-group-item active">Copias de seguridad</a>
</div>
@stop
@section('contenido')
    <div class="row">
        <div class="col-xs-12">
            @if (count($backups))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Fecha</th>
                        <th>Descargar</th>
                        <th>Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $backup)
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ $backup['file_size'] }}</td>
                            <td>
                                {{ $backup['last_modified'] }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-default"
                                   href="{{route('administracion/descargar_copia',$backup['file_name'])}}"><i
                                        class="fa fa-cloud-download"></i> Download</a>
                            </td>
                            <td class="text-right">
                              <a class="btn btn-xs btn-danger" data-button-type="delete"
                                   href="{{ route('administracion/borrar_copia',$backup['file_name']) }}"><i class="fa fa-trash-o"></i>
                                    Delete</a>  
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div class="col-xs-12 clearfix">
            <a id="create-new-backup-button" href="{{ route('administracion/copia_seguridad') }}" class="btn btn-primary pull-left"
               style="margin-bottom:2em;"><i
               class="fa fa-plus"></i> Crear copia de seguridad
            </a>
        </div>
            @else
                <div class="well">
                    <h4>There are no backups</h4>
                </div>
            @endif
        </div>
    </div>
@endsection