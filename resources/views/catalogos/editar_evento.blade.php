<!-- 
     * Nombre del archivo:editar_evento.blade.php
     * Descripción: Modificar un evento
     * Fecha de creación:10/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>editar_evento.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla editar evento</h4>
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
        {!! Form::open(['route' => 'catalogos/update_evento','class' => 'form']) !!}
            <table class="table table-condensed">    
            <tbody>
              <tr>
                  <td>Id</td>
                <td>
                    <input type="text" value="{{$obj_evento_epi->id_evento_epi}}" class="form-control" name="id" readonly="true">
                </td>
              </tr>
              <tr>
                  <td>Código *</td>
                <td>
                    <input type="text" value="{{$obj_evento_epi->codigo_evento}}" class="form-control" name="codigo" maxlength="20"  required>
                </td>
              </tr>
              <tr>
                 <td>Nombre evento *</td>
                <td>
                   <input type="text" value="{{$obj_evento_epi->nombre_evento}}" class="form-control" name="nombre" maxlength="35" required>  
                </td> 
              </tr>
              <tr>
                  <td>Descripción *</td>
                  <td>
                      <input type="text" value="{{$obj_evento_epi->descripcion_evento}}" class="form-control" name="descripcion" maxlength="100" required>                      
                  </td>  
              </tr>
            </tbody>
          </table> 
        
    <div>
       <table class="table">
        <tr>
          <td>
             <button type="submit" class="btn btn-primary">Guardar</button>  
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
              @include('ayuda/ayuda_editar_evento') 
          </td>
        </tr>        
        </table>
        </div>
        <div class="panel-footer">
          <p>* Campo requerido</p>   
        </div>
    </div>
    {!! Form::close() !!}        
  
</div>
@stop   

