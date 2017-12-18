<!-- 
     * Nombre del archivo:editar_componente_asig.blade.php
     * Descripción:Formulario para crear un nuevo indicador
     * Fecha de creación:17/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>editar_componente_asig.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario}}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla editar componente asignado</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('configuracion/nuevo_indicador')}}" class="list-group-item">Nuevo indicador</a>
    <a href="{{route('configuracion/buscar_indicador')}}" class="list-group-item">Buscar indicador</a>
    <a href="{{route('configuracion/buscar_af')}}" class="list-group-item">Buscar archivo fuente</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
        <div class="panel-body">
        {!! Form::open(['route' => 'configuracion/update_componente','class' => 'form']) !!}
            <table class="table table-condensed">    
            <tbody>
                
                <tr>
                  <td>Id archivo fuente *</td>
                  <td>
                      <input type="text" value="{{$obj_componente[0]->id_archivo_fuente}}" class="form-control" name="id_archivo_fuente" readonly="true">                      
                  </td>  
              </tr>
               <tr>
                  <td>Id componente *</td>
                  <td>
                      <input type="text" value="{{$obj_componente[0]->id_componente}}" class="form-control" name="id_componente" readonly="true">                      
                  </td>  
              </tr>
               <tr>
                  <td>Fila *</td>
                  <td>
                      <input type="number" value="{{$obj_componente[0]->fila_archivo_fuente}}"  class="form-control" name="fila" required="true">                      
                  </td>  
              </tr>
            </tbody>
          </table>       
    <div>
       <table class="table">
        <tr>
          <td>
             <button type="submit" class="btn btn-primary">Guardar</button>  
              <a href="{{route('configuracion/buscar_af')}}" class="btn btn-primary"> Regresar</a>
              @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario') 
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

