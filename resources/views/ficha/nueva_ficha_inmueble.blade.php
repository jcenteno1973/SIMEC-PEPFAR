<!-- 
     * Nombre del archivo:nueva_ficha_inmueble.blade.php
     * Descripción: 
     * Fecha de creación:24/12/16
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Buscar ficha</a>
    <a class="list-group-item active">Nueva ficha inmueble</a>
    <a href="#" class="list-group-item">Nueva ficha mueble</a>
    <a href="#" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla nueva ficha inmueble</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
    <table class="table table-condensed">    
            <tbody>
              <tr>
                <td>Departamento *</td>
                <td>                 
                      {!! Form::select('departamento',$departamentos,6,['id'=>'departamento']) !!}
                </td>
                <td>Municipio *</td>
                <td>                    
                   {!! Form::select('municipio',$municipios,104,['id'=>'municipio']) !!}
                </td>
              </tr>
              <tr>
                <td>Unidad o departamento *</td>
                <td>                     
                      {!! Form::text('nombres_usuario', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Clase del bien *</td>
                <td>                 
                      {!! Form::text('apellidos_usuario', null, ['class' => 'form-control' , 'required' => 'required']) !!}                   
                </td>
              </tr>
              <tr>
                <td>Fuente financiamiento *</td>
                <td>
                      {!! Form::email('email', null, ['class' => 'form-control' , 'required' => 'required']) !!}                   
                </td>
                <td> Tipo bienes *</td>
                <td>                    
                     {!! Form::text('descripcion', null, ['class' => 'form-control' , 'required' => 'required']) !!}                               
                </td>
              </tr>
               <tr>
                   <td>Descripción *</td>
                <td>                 
                   {!! Form::text('descripcion', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Estado *</td>
                <td>
                   {!! Form::text('descripcion', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>                
              </tr>
              <tr>
               
              </tr>
            </tbody>
          </table>       
</div>
@stop   