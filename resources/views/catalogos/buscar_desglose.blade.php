<!-- 
     * Nombre del archivo:buscar_desglose.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_desglose.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar desglose</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('catalogos/nuevo_evento')}}" class="list-group-item">Nuevo evento</a>
    <a href="{{route('catalogos/buscar_evento')}}" class="list-group-item">Buscar evento</a>
    <a href="{{route('catalogos/nuevo_catalogo')}}" class="list-group-item">Nuevo catalogo</a>
    <a href="{{route('catalogos/buscar_catalogo')}}" class="list-group-item">Buscar catalogo</a>
    <a href="{{route('catalogos/nuevo_componente')}}" class="list-group-item">Nuevo componente</a>
    <a href="{{route('catalogos/buscar_componente')}}" class="list-group-item">Buscar componente</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
   <div class="panel-body">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th><center>Id</center></th>
        <th><center>Desglose</center></th> 
        <th><center>Editar</center></th>
        <th><center>Borrar</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_catalogo as $obj_catalogos)
            <tr> 
                <td><center>{{$obj_catalogos->id_catalogo}}</center></td>
                <td><center>{{$obj_catalogos->desglose}}</center></td>
                <td><center>   
                <a href="{{route('catalogos/editar_desglose',$obj_catalogos->id_catalogo)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                </center></td>
                <td><center>
                <a href="{{route('catalogos/eliminar_desglose',$obj_catalogos->id_catalogo)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a>
                </center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
       {!!$obj_catalogo->appends(Request::all())->render()!!} 
</div> 
    <div class="panel-footer">
        <a href="{{route('catalogos/buscar_catalogo')}}" class="btn btn-primary"> Regresar</a>
        @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')  
    </div>
     
</div>
@stop   