<!-- 
     * Nombre del archivo:buscar_indicador.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_indicador.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar indicador</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('configuracion/nuevo_indicador')}}" class="list-group-item">Nuevo indicador</a>
    <a href="{{route('configuracion/buscar_indicador')}}" class="list-group-item active">Buscar indicador</a>
    <a href="{{route('configuracion/buscar_af')}}" class="list-group-item">Buscar archivo fuente</a>
</div>
@stop
@section('filtros_consulta')

@stop
@section('contenido')
<div class="panel panel-default">
 {!! Form::model(Request::all(),['route' => 'configuracion/buscar_indicador', 'class' => 'form-row align-items-center', 'role'=>'search']) !!}
 
<div class="panel-collapse">
    <table class="table table-bordered">    
            <tbody>
               <tr>
                 <td>Código evento</td>
                <td>
                 {!! Form::select('evento',$obj_evento,$request->evento,['id'=>'evento','class' => 'form-control']) !!}
                </td>
               <td>Codigo indicador</td>
                <td>
                    <input type="text" value="{{$request->indicador}}" class="form-control" name="indicador" maxlength="35"> 
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
        <th><center>Codigo indicador</center></th>
        <th><center>Descripción</center></th>
        <th><center>Muliplicador</center></th>
        <th><center>Editar</center></th>
        <th><center>Borrar</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_indicador as $obj_indicadores)
            <tr> 
                <td><center>{{$obj_indicadores->id_indicador}}</center></td>
                <td><center>{{$obj_indicadores->codigo_indicador}}</center></td>
                <td>{{$obj_indicadores->descripcion_indicador}}</td>
                <td><p ALIGN=right>{{$obj_indicadores->multiplicador}}</p></td>
                <td><center>   
                <a href="{{route('configuracion/editar_indicador',$obj_indicadores->id_indicador)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                </center></td>
                <td><center><a href="{{route('configuracion/eliminar_indicador',$obj_indicadores->id_indicador)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a></center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
       <div class="col-md-8 col-md-offset-4">
        {!!$obj_indicador->appends(Request::all())->render()!!}  
       </div>
</div> 
    <div class="panel-footer">
        <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario') 
    </div>
    
</div>
@stop   
