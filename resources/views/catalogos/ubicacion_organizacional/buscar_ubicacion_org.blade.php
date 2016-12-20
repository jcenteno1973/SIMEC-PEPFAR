{{-- 
     * Nombre del archivo: buscar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 4/12/2016
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
  <h4 class="text-center">Buscar ubicación organizacional</h4>
@stop 
<div>
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ubicaci&oacute;n organizacional</a>
    <a href="../administracion/nueva_ubicacion" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <!-- filtro busqueda de ubicacion, los "&nbsp; son espacios"-->
<table class="table table-responsive">
{!! Form::open(['route' => 'administracion.buscar_ubicacion.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
  <div class="form-group" >
      <table class="table table-responsive"> 
                    <tr border="0">
                      <td>C&oacute;digo&nbsp;</td> 
                      <td>  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'C&oacute;digo de Unidad/Depto'])!!}</td> 
                        &nbsp;<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unidad/Departamento&nbsp;</td>
                      <td>
                        <select name="id_ubicacion_org" class="form-control" placeholder="Unidad o Departamento">
                          <option disabled selected>Unidad/Depto</option>
                        </select>
                      </td> 
         <!--       </div>   -->
                    </tr>
                    <tr>
                        &nbsp;<td>Responsable&nbsp;</td>
                      <td>   {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Responsable'])!!}</td> 
                
                        &nbsp;<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default"> Buscar</button></td>
                    </tr>
                  </table>
                </div>
                    
                  
<!--   {!! Form::close() !!}  -->
    <!-- fin filtro busqueda ubicacion organizacional -->
<div class="form-group" >     
<table class="table table-responsive">
    <table class="table table-condensed">  
    <thead>
      <tr>
        <th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>C&oacute;digo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Unidad/Departamento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Responsable&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Alquilado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Estado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Seleccionar</th>        
      </tr>
    </thead>
    <tbody> 
             @foreach($ubicacion_org as $ubicacion)
            <tr> 
        
                <td>{{$ubicacion->id_ubicacion_org}}</td>
                <td>{{$ubicacion->codigo_unidad_dep}}</td>
                <td>{{$ubicacion->nombre_unidad_dep}}</td>
                <td>{{$ubicacion->nombre_responsable}}</td>
                <td>&nbsp;&nbsp;{{$ubicacion->alquilado}}</td>
                <td>&nbsp;&nbsp;{{$ubicacion->estado_registro}}</td>
                <td><center>
          {{--          <a href="{{route('administracion/editar_ubicacion',$ubicacion->id_ubicacion_org)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> </a> 
                    <a href="{{route('administracion/eliminar_ubicacion',$ubicacion->id_ubicacion_org)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
            --}}        </center>
                </td>
        
                <!--<td><center>{!! Form::radio('seleccionar',$ubicacion->id_ubicacion_org, ['class' => 'form-control' , 'required' => 'required']) !!}</center></td>                      -->
            </tr>
           @endforeach
      </tbody>
    </table>
   
{!! Form::close() !!} 
</table>
</div>

<!-- Botones"--> 
    <div><br /><br />
       <table class="table">
        <tr>
          <td>
              <a href="../administracion/editar_ubicacion" class="btn btn- btn-primary">Editar</a>
              <a href="../administracion/eliminar_ubicacion" class="btn btn-primary">Borrar</a> 
              <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
             @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  

          </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
    </div>
</div>
</div>
@stop   
