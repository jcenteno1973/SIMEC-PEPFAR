{{-- 
     * Nombre del archivo: buscar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 4/12/2016
     * Creado por: Karla Barrera
     
     * Descripcion: renderizado y bonton de editar
     * Fecha de modificacion: 21/12/16
     * Modificado por: Yamileth Campos
     
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
    <a href="../administracion/buscar_ubicacion/create" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a> 
    <a href="../administracion/catalogos" class="list-group-item">Men&uacute; cat&aacute;logos</a> 
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
                      <td>C&oacute;digo</td> 
                      <td>  {!!Form::text('codigo_unidad_dep',null,['class'=>'form-control', 'placeholder'=>'C&oacute;digo de Unidad/Depto'])!!}</td> 
                        <td>&nbsp;&nbsp;Unidad/<br />Departamento</td>
                   {{--   <td>{!! Form::select('type', ['' => 'Unidad/Depto', 'activo fijo' => 'Activo Fijo', 'informatica' => 'Informática'], null, ['class' => 'form-control']) !!} </td>  --}}
                        <td><select name="rol_usuario" class="form-control" >
                        @foreach($ubicacion_org as $ubicacion)
                        <option>{{$ubicacion->nombre_unidad_dep}}</option>
                        @endforeach
                      </select></td>
                        <td>Responsable</td>
                      <td>   {!!Form::text('nombre_responsable',null,['class'=>'form-control', 'placeholder'=>'Responsable'])!!}</td> 
                
                        <td>&nbsp;&nbsp;<button type="submit" class="btn btn-default"> Buscar</button></td>
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
                <td>
                    <center>
                    <a href="{{route('administracion.buscar_ubicacion.edit',$ubicacion->id_ubicacion_org)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a> 
                    <a href="{{route('administracion.buscar_ubicacion.destroy',$ubicacion->id_ubicacion_org)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </center>
                </td>
        
                <!--<td><center>{!! Form::radio('seleccionar',$ubicacion->id_ubicacion_org, ['class' => 'form-control' , 'required' => 'required']) !!}</center></td>                      -->
            </tr>
           @endforeach
      </tbody>
    </table>
            <center></center>
{!! Form::close() !!} 
</table>
</div>

<!-- Botones"--> 
    <div class="col-xs-8 col-sm-6"><br /><br />
       <table class="table">
        <tr>
          <td>{!! $ubicacion_org->render() !!}</td>
          <td>
             {{-- <a href="../administracion/editar_ubicacion" class="btn btn- btn-primary">Editar</a>
              <a href="../administracion/eliminar_ubicacion" class="btn btn-primary">Borrar</a> --}}
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
