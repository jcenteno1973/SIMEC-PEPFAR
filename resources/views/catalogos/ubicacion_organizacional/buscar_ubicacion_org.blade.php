{{-- 
     * Nombre del archivo: buscar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 4/12/2016
     * Creado por: Karla Barrera
     
     * Descripcion: renderizado, bonton de editar, y agrega filtro unidad/depto
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

@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ubicaci&oacute;n organizacional</a>
    <a href="../administracion/buscar_ubicacion/create" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a> 
    <a href="../administracion/catalogos" class="list-group-item"><span class="glyphicon glyphicon-chevron-left"></span> Regresar a Cat&aacute;logos</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
<!-- filtro busqueda de ubicacion, los "&nbsp; son espacios"-->
<br>
{!! Form::open(['route' => 'administracion.buscar_ubicacion.index', 'method' => 'GET', 'class' => 'form-inline', 'role' => 'search']) !!}
    <div class="form-inline" >
        <label>&nbsp;&nbsp;C&oacute;digo</label> 
        {!!Form::text('codigo_unidad_dep',null,['class'=>'form-control', 'placeholder'=>'C&oacute;digo de Unidad/Depto'])!!}
        <label>&nbsp;&nbsp;Unidad/Depto</label>
        {!!Form::text('nombre_unidad_dep',null,['class'=>'form-control', 'placeholder'=>'Unidad o departamento'])!!}
        <label>&nbsp;&nbsp;Responsable</label>
         {!!Form::text('nombre_responsable',null,['class'=>'form-control', 'placeholder'=>'Responsable'])!!}
        <button type="submit" class="btn btn-default"> Buscar</button> 
    </div>                                             
<!--   {!! Form::close() !!}  -->
<br><br>
<!-- fin filtro busqueda ubicacion organizacional -->    
<table class="table table-responsive">
    <table class="table table-condensed">  
    <thead>
      <tr>
        <th><center>#</center></th>
        <th><center>C&oacute;digo</center></th>
        <th><center>Unidad/Departamento</center></th>
        <th><center>Responsable</center></th>
        <th><center>Alquilado</center></th>
    
        <th><center>Opciones</center></th>        
      </tr>
    </thead>
    <tbody> 
             @foreach($ubicacion_org as $ubicacion)
            <tr> 
        
                <td><center>{{$ubicacion->id_ubicacion_org}}</center></td>
                <td><center>{{$ubicacion->codigo_unidad_dep}}</center></td>
                <td><center>{{$ubicacion->nombre_unidad_dep}}</center></td>
                <td><center>{{$ubicacion->nombre_responsable}}</center></td>
                <td><center>
                    @if ($ubicacion->alquilado == 0)
                        No
                    @else
                        Si
                    @endif
                    </center>
                </td>           
                <td>
                    <center>
                    <a href="{{route('administracion.buscar_ubicacion.edit',$ubicacion->id_ubicacion_org)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a> 
                    <a href="{{route('administracion.buscar_ubicacion.destroy',$ubicacion->id_ubicacion_org)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
              <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
             @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  
          </td>
        </tr>        
    <!-- Fin botones-->
      </table> 
    </div>
</div>
@stop   
