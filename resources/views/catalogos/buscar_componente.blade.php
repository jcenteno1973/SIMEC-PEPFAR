<!-- 
     * Nombre del archivo:buscar_componente.blade.php
     * Descripción:Vista para buscar los componentes
     * Fecha de creación:12/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_componente.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar componente</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('catalogos/nuevo_evento')}}" class="list-group-item">Nuevo evento</a>
    <a href="{{route('catalogos/buscar_evento')}}" class="list-group-item">Buscar evento</a>
    <a href="{{route('catalogos/nuevo_catalogo')}}" class="list-group-item">Nuevo catalogo</a>
    <a href="{{route('catalogos/buscar_catalogo')}}" class="list-group-item">Buscar catalogo</a>
    <a href="{{route('catalogos/nuevo_componente')}}" class="list-group-item">Nuevo componente</a>
    <a class="list-group-item active">Buscar componente</a>
</div>
@stop
@section('filtros_consulta')
{!! Form::model(Request::all(),['route' => 'catalogos/buscar_componente', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
<div class="panel-collapse">
    <table class="table table-bordered">    
            <tbody>
               <tr>
                 <td>Código componente</td>
                <td>
                   <input type="text" class="form-control" name="codigo" maxlength="20"  required>
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
        <th><center>Código</center></th>
        <th><center>Descripción</center></th>  
        <th><center>Editar</center></th>
        <th><center>Borrar</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_componente as $obj_componentes)
            <tr> 
                <td><center>{{$obj_componentes->id_componente}}</center></td>
                <td><center>{{$obj_componentes->codigo_componente}}</center></td>
                <td>{{$obj_componentes->descripcion_componente}}</td>
                
              
                <td><center>   
                <a href="{{route('catalogos/editar_componente',$obj_componentes->id_componente)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                </center></td>
                <td><center><a href="{{route('catalogos/eliminar_componente',$obj_componentes->id_componente)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div> 
    <div class="panel-footer">
        {!!$obj_componente->appends(Request::all())->render()!!} 
    </div>
     <div>
          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')   
        </div>
</div>
@stop   
