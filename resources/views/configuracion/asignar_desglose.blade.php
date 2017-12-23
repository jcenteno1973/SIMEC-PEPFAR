<!-- 
     * Nombre del archivo:asignar_desglose.blade.php
     * Descripción: Creacion de un nuevo catalogo
     * Fecha de creación:10/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p> 
@stop 
@section('nombre_plantilla')
<p ALIGN=center>asignar_desglose.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla asignar desglose</h4>
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
        {!! Form::open(['route' => 'configuracion/nuevo_desglose_guardar','class' => 'form']) !!}
            <table class="table table-condensed">    
            <tbody>
                <tr>
                 <td>Archivo fuente</td>
                <td>
                    <input type="hidden" value="{{$obj_archivo_fuente->id_archivo_fuente}}" class="form-control" name="id" readonly="true"> 
                    <input type="text" value="{{$obj_archivo_fuente->codigo_archivo_fuente}}" class="form-control" name="archivo_fuente" readonly="true"> 
                </td>
               
              </tr>
              <tr>
                 <td>Desglose primer nivel *</td>
                <td>
                    {!! Form::select('primer',$lista_catalogo,0,['id'=>'primer','class' => 'form-control','required' => 'required']) !!}
                     
                </td> 
              </tr>
              <tr>
                 <td>Desglose segundo nivel</td>
                <td>
                   {!! Form::select('segundo',$lista_catalogo,0,['id'=>'segundo','class' => 'form-control','required' => 'required']) !!}
                </td> 
              </tr>
            </tbody>
          </table>       
    <div>
       <table class="table">
        <tr>
          <td>
             <button type="submit" class="btn btn-primary">Guardar</button>  
              <a href="{{route('catalogos/buscar_catalogo')}}" class="btn btn-primary"> Regresar</a>
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
