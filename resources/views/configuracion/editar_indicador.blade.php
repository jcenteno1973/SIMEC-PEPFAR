<!-- 
     * Nombre del archivo:editar_indicador.blade.php
     * Descripción:Formulario para crear un nuevo indicador
     * Fecha de creación:14/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>editar_indicador.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario}}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla ditar indicador</h4>
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
        {!! Form::open(['route' => 'configuracion/update_indicador','class' => 'form']) !!}
            <table class="table table-condensed">    
            <tbody>
                <tr>
                  <td>Id</td>
                  <td>
                      <input type="text" value="{{$obj_indicador->id_indicador}}" class="form-control" name="id" readonly="true">                      
                  </td>  
              </tr>
               <tr>
                <td>Evento *</td>
                <td> 
                    {!! Form::select('eventos',$obj_evento_epi,$obj_indicador->id_evento_epi,['id'=>'eventos','class' => 'form-control','required' => 'required']) !!}
                </td>
              </tr>
               <tr>
                  <td>Código indicador *</td>
                  <td>
                      <input type="text" value="{{$obj_indicador->codigo_indicador}}" class="form-control" name="codigo" readonly="true">                      
                  </td>  
              </tr>
               <tr>
                  <td>Descripción *</td>
                  <td>
                      <input type="text" value="{{$obj_indicador->descripcion_indicador}}"  class="form-control" name="descripcion" required="true">                      
                  </td>  
              </tr>
              <tr>
                  <td>Numerador *</td>
                <td>
                   {!! Form::select('numerador',$obj_componente,$obj_indicador->id_componente,['id'=>'numerador','class' => 'form-control','required' => 'required']) !!}
                </td>
              </tr>
              <tr>
                  <td>Denominador</td>
                <td>
                    @if($obj_indicador->com_id_componente==null)
                   {!! Form::select('denominador',$obj_componente,0,['id'=>'denominador','class' => 'form-control']) !!}
                   @else
                   {!! Form::select('denominador',$obj_componente,$obj_indicador->com_id_componente,['id'=>'denominador','class' => 'form-control']) !!}
                   @endif
                </td>
              </tr>
              <tr>
                 <td>Tipo indicador *</td>
                <td>
                    {!! Form::select('tipo',$obj_tipo_indicador,$obj_indicador->id_tipo_indicador,['id'=>'tipo','class' => 'form-control']) !!}
                </td> 
              </tr>
              <tr>
                  <td>Multiplicador *</td>
                  <td>
                      <input type="number" value="{{$obj_indicador->multiplicador}}" min="1" class="form-control" name="multiplicador" >                      
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
              @include('usuario_app/ayuda_usuario/ayuda_editar_indicador') 
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

