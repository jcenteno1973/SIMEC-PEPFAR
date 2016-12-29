{{-- 
     * Nombre del archivo: nueva_verif_fisica.blade.php
     * Descripción: Pantalla para nueva verificacion física
     * Fecha de creación: 28/12/2016
     * Creado por: Karla Barrera
--}}

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla nueva verificaci&oacute;n f&iacute;sica</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../administracion/verificacion_fisica" class="list-group-item">Buscar verificaci&oacute;n f&iacute;sica</a>
    <a href="#" class="list-group-item active">Nueva verificaci&oacute;n f&iacute;sica</a>
    <a href="#" class="list-group-item">Buscar ficha de descargo</a>
    <a href="#" class="list-group-item">Ejecutar destino</a>
    <a href="#" class="list-group-item">Revertir destino</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
        <div class="panel-body">       
        {!! Form::open(['route' => 'administracion.verificacion_fisica.store','method'=>'POST']) !!}
            <table class="table table-condensed">    
            <tbody>
              <tr>
                <td>Fecha a realizarse verificaci&oacute;n f&iacute;sica </td>
                <td>       
                <?=date('d/m/Y');?>          
              {{--        {!! Form::text('fecha_verificacion_fisica', null, ['class' => 'form-control', 'placeholder'=>'fecha de verificaci&oacute;n f&iacute;sica']) !!}    --}}
                </td>  
              </tr>  
              <tr> 
                <td>Nombre responsable *</td>
                <td align="left">           
                    {!!Form::text('nombre_responsable',null,['class'=>'form-control', 'required' => 'required', 'placeholder'=>'nombre de responsable'])!!} 
                </td>               
              </tr>            
              <tr> 
                <td>Nombre encargado de realizar la verificaci&oacute;n *</td>
                <td align="left">           
                    {!!Form::text('nombre_verificador',null,['class'=>'form-control', 'required' => 'required', 'placeholder'=>'nombre de verificador'])!!} 
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
              @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario') 
          </td>
        </tr>        
        </table> 
        <p>* Campo requerido</p>
    </div>
    {!! Form::close() !!}        
  </div>
</div>
@stop 