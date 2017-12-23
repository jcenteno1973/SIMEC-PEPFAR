<!-- 
     * Nombre del archivo:buscar_archivo_fuente.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_archivo_fuente.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar archivo fuente</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('configuracion/nuevo_indicador')}}" class="list-group-item">Nuevo indicador</a>
    <a href="{{route('configuracion/buscar_indicador')}}" class="list-group-item">Buscar indicador</a>
    <a class="list-group-item active">Buscar archivo fuente</a>
</div>
@stop
@section('filtros_consulta')
{!! Form::model(Request::all(),['route' => 'configuracion/buscar_af', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
<div class="panel-collapse">
    <table class="table table-bordered">    
            <tbody>
               <tr>
                 <td>Código evento</td>
                <td>
                   <input type="text" class="form-control" name="codigo" maxlength="20"  required>
                </td>
               <td>Nombre evento</td>
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
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        <th><center>Id</center></th>
        <th><center>Codigo</center></th>
        <th><center>Descripción</center></th>
        <th><center>Ver componentes</center></th>
        <th><center>Asignar desglose</center></th>
        <th><center>Ver desglose</center></th>
        <th><center>Borrar desglose</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_archivo_fuente as $obj_archivo_fuentes)
            <tr> 
                <td><center>{{$obj_archivo_fuentes->id_archivo_fuente}}</center></td>
                <td><center>{{$obj_archivo_fuentes->codigo_archivo_fuente}}</center></td>
                <td>{{$obj_archivo_fuentes->descripcion_archivo_fuente}}</td>
                
                <td><center>   
                <a href="{{route('configuracion/buscar_componente',$obj_archivo_fuentes->id_archivo_fuente)}}" class="btn btn-warning"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
                </center></td>
                <td><center><a href="{{route('configuracion/nuevo_desglose',$obj_archivo_fuentes->id_archivo_fuente)}}"  class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></center></td>
                <td><center><a href="{{route('configuracion/buscar_desglose',$obj_archivo_fuentes->id_archivo_fuente)}}"  class="btn btn-warning"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></center></td>
                <td><center><a href="{{route('configuracion/eliminar_desglose_asig',$obj_archivo_fuentes->id_archivo_fuente)}}"  class="btn btn-danger"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a></center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div> 
    <div class="panel-footer">
        {!!$obj_archivo_fuente->appends(Request::all())->render()!!} 
    </div>
     <div>
          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')   
        </div>
</div>
@stop   
