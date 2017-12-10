<!-- 
     * Nombre del archivo:nueva_carga_archivo.blade.php
     * Descripción:Vista para recibir los archivos fuentes de datos
     * Fecha de creación:24/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>nueva_carga_archivo.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario}}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla nueva carga de archivo</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Nueva carga de archivo</a>
    <a href="../carga/buscar_carga" class="list-group-item">Buscar carga de archivo</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
        <div class="panel-body">
        {!! Form::open(['route' => 'carga/nueva_carga','class' => 'form','enctype'=>'multipart/form-data']) !!}
            <table class="table table-condensed">    
            <tbody>
               <tr>
                <td>País *</td>
                <td> 
                    @if(Auth::user()->role_id==1)<!--Verifica si es un administrador -->
                    <select name="region_sica" class="form-control">
                        @foreach($obj_region_sica as $paises)
                        <option>{{$paises->nombre_pais}}</option>
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
              </tr>
              <tr>
                  <td>Año *</td>
                <td>
                   <select name="anio_notificacion" class="form-control" >
                       <option>Seleccionar</option>
                       @foreach($obj_anio as $obj_anios)
                        <option>{{$obj_anios->digitos_anio}}</option>
                        @endforeach  
                   </select>
                </td>
              </tr>
              <tr>
                  <td>Evento *</td>
                <td>
                   {!! Form::select('eventos',$obj_evento_epi,0,['id'=>'eventos','class' => 'form-control','required' => 'required']) !!}
                </td>
              </tr>
              <tr>
                 <td>Código archivo *</td>
                <td>
                   {!! Form::select('codigos',$codigo_archivo,0,['id'=>'codigos','class' => 'form-control','required' => 'required']) !!}
                </td> 
              </tr>
              <tr>
                  <td>Archivo *</td>
                  <td>
                      <input type="file" class="form-control" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>                      
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
        </div>
        <div class="panel-footer">
          <p>* Campo requerido</p>   
        </div>
    </div>
    {!! Form::close() !!}        
  
</div>
@stop   

