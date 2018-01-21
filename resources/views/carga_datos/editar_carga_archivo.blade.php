<!-- 
     * Nombre del archivo:editar_carga_archivo.blade.php
     * Descripción:Vista para recibir los archivos fuentes de datos
     * Fecha de creación:05/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>editar_carga_archivo.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario}}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla editar carga de archivo</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../carga/nueva_carga" class="list-group-item ">Nueva carga de archivo</a>
    <a href="../../carga/buscar_carga" class="list-group-item">Buscar carga de archivo</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
        <div class="panel-body">
        {!! Form::open(['route' => 'carga/update_carga','class' => 'form'])!!}
            <table class="table table-condensed">    
            <tbody>
                <tr>
                    <td>
                       Id 
                    </td>
                    <td>
                       <input type="text" class="form-control" name="id_archivo_datos" value="{{$obj_archivo_datos->id_archivo_datos}}" readonly="true"> 
                    </td>
                </tr>
               <tr>
                <td>País *</td>
                <td> 
                    @if(Auth::user()->role_id==1)<!--Verifica si es un administrador -->
                    <select name="region_sica" class="form-control">
                        @foreach($obj_region_sica as $paises)
                        @if($obj_archivo_datos->id_region_sica==$paises->id_region_sica)
                        <option selected="true">{{$paises->nombre_pais}}</option>
                        @else
                        <option>{{$paises->nombre_pais}}</option>
                        @endif
                        @endforeach 
                   </select>
                    
                    @else <!--No podra seleccionar país -->
                    <select name="region_sica" class="form-control">
                        @foreach($obj_region_sica as $paises)
                        @if(Auth::user()->id_region_sica==$paises->id_region_sica )
                        <option>{{$paises->nombre_pais}}</option>
                        @endif
                        @endforeach                      
                   </select>
                    @endif
                </td>
                <td>
                    
                </td>
              </tr>
              <tr>
                  <td>Año *</td>
                <td>
                   <select name="anio_notificacion" class="form-control" >
                       @foreach($obj_anio as $obj_anios)
                       @if($obj_archivo_datos->id_anio_notificacion==$obj_anios->id_anio_notificacion)
                        <option selected="true">{{$obj_anios->digitos_anio}}</option>
                       @else
                       <option>{{$obj_anios->digitos_anio}}</option>
                       @endif 
                        @endforeach  
                   </select>
                </td>
              </tr>
              <tr>
                  <td>Evento *</td>
                <td>
                   {!! Form::select('eventos',$obj_evento_epi,$obj_archivo_datos->id_evento_epi,['id'=>'eventos','class' => 'form-control','required' => 'required']) !!}
                </td>
              </tr>
              <tr>
                 <td>Código indicador *</td>
                <td>
                   {!! Form::select('codigos',$codigo_archivo,$obj_archivo_datos->id_archivo_fuente,['id'=>'codigos','class' => 'form-control','required' => 'required']) !!}
                </td> 
              </tr>
              <tr>
                  <td>Archivo *</td>
                  <td>
                      <input type="text" class="form-control" name="file" value="{{$obj_archivo_datos->nombre_archivo}}" readonly="true">                      
                  </td>  
              </tr>
            </tbody>
          </table>       
    <div>
       <table class="table">
        <tr>
          <td>
             <button type="submit" class="btn btn-primary">Guardar</button>  
              <a href="../../carga/buscar_carga" class="btn btn-primary"> Regresar</a>
              @include('ayuda/ayuda_editar_carga_archivo') 
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
