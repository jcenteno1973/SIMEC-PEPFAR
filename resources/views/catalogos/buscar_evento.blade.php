<!-- 
     * Nombre del archivo:buscar_evento.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_evento.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar evento</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('catalogos/nuevo_evento')}}" class="list-group-item">Nuevo evento</a>
    <a class="list-group-item active">Buscar evento</a>
    <a href="{{route('catalogos/nuevo_catalogo')}}" class="list-group-item">Nuevo catalogo</a>
    <a href="{{route('catalogos/buscar_catalogo')}}" class="list-group-item">Buscar catalogo</a>
    <a href="{{route('catalogos/nuevo_componente')}}" class="list-group-item">Nuevo componente</a>
    <a href="{{route('catalogos/buscar_componente')}}" class="list-group-item">Buscar componente</a>
</div>
@stop
@section('filtros_consulta')

@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::model(Request::all(),['route' => 'catalogos/buscar_evento', 'class' => 'form-row align-items-center', 'role'=>'search']) !!}
<div class="panel-collapse">
    <table class="table table-bordered">    
            <tbody>
               <tr>
                 <td>Código evento</td>
                <td>
                    <input type="hidden" value="1" class="form-control" name="bandera">
                    <input type="text" value="{{$request->codigo}}" class="form-control" name="codigo" maxlength="20" >
                </td>
               <td>Nombre evento</td>
                <td>
                   <input type="text" value="{{$request->nombre}}" class="form-control" name="nombre" maxlength="35" > 
                </td> 
                <td>
                   <button type="submit" class="btn btn-default"> Buscar</button> 
                </td>
              </tr>
            </tbody>
          </table> 
</div>
{!! Form::close() !!}
   <div class="panel-body">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th><center>Id</center></th>
        <th><center>Codigo evento</center></th>
        <th><center>Nombre evento</center></th>
        <th><center>Descripción</center></th>  
        <th><center>Editar</center></th>
        <th><center>Borrar</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_evento_epi as $obj_evento_epis)
            <tr> 
                <td><center>{{$obj_evento_epis->id_evento_epi}}</center></td>
                <td><center>{{$obj_evento_epis->codigo_evento}}</center></td>
                <td><center>{{$obj_evento_epis->nombre_evento}}</center></td>
                <td>{{$obj_evento_epis->descripcion_evento}}</td>
                
              
                <td><center>   
                <a href="{{route('catalogos/editar_evento',$obj_evento_epis->id_evento_epi)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                </center></td>
                <td><center><a href="{{route('catalogos/eliminar',$obj_evento_epis->id_evento_epi)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a></center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
       <div class="col-md-8 col-md-offset-4">
          {!!$obj_evento_epi->appends(Request::all())->render()!!}  
       </div>
</div> 
    <div class="panel-footer">
        <a href="{{route('catalogos/buscar_evento')}}" class="btn btn-primary"> Regresar</a>
          @include('ayuda/ayuda_buscar_evento') 
    </div>
     
</div>
@stop   
