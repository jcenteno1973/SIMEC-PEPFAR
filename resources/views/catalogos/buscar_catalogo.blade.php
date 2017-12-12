<!-- 
     * Nombre del archivo:buscar_catalogo.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_catalogo.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar catálogo</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item ">Nuevo evento</a>
    <a href="#" class="list-group-item ">Buscar evento</a>
    <a href="#" class="list-group-item">Nuevo catalogo</a>
    <a class="list-group-item active">Buscar catalogo</a>
    <a href="#" class="list-group-item">Nuevo indicador</a>
    <a href="#" class="list-group-item">Buscar indicador</a>
    <a href="#" class="list-group-item">Nuevo componente</a>
    <a href="#" class="list-group-item">Buscar componente</a>
</div>
@stop
@section('filtros_consulta')
{!! Form::model(Request::all(),['route' => 'catalogos/buscar_catalogo', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
<div class="panel-collapse">
    <table class="table table-condensed">    
            <tbody>
               <tr>
               <td>Nombre catálogo</td>
                <td>
                   <input type="text" class="form-control" name="nombre" maxlength="35" required> 
                </td> 
                <td>
                   <button type="submit" class="btn btn-default"> Buscar</button> 
                </td>
              </tr>
            </tbody>
          </table> 
</div>
{!! Form::close() !!}
@stop
@section('contenido')
<div class="panel panel-default">
   <div class="panel-body">
    <table class="table table-condensed">
        <thead>
        <tr>
        <th><center>Id</center></th>
        <th><center>Nombre catálogo</center></th> 
        <th><center>Desglose</center></th>
       <th><center>Ver desglose</center></th>
        <th><center>Editar</center></th>
        <th><center>Borrar</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_catalogo as $obj_catalogos)
            <tr> 
                <td><center>{{$obj_catalogos->id_catalogo}}</center></td>
                <td><center>{{$obj_catalogos->nombre_catalogo}}</center></td>
                <td><center>   
                <a href="{{route('catalogos/nuevo_desglose',$obj_catalogos->id_catalogo)}}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
                </center></td>
                <td><center>   
                <a href="{{route('catalogos/buscar_desglose',$obj_catalogos->id_catalogo)}}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
                </center></td>
                <td><center>   
                <a href="{{route('catalogos/editar_catalogo',$obj_catalogos->id_catalogo)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                </center></td>
                <td><center>
                <a href="{{route('catalogos/eliminar_catalogo',$obj_catalogos->id_catalogo)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div> 
    <div class="panel-footer">
        {!!$obj_catalogo->appends(Request::all())->render()!!} 
    </div>
     <div>
          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')   
        </div>
</div>
@stop   

