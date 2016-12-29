{{-- 
     * Nombre del archivo: buscar_verif_fisica.blade.php
     * Descripción: Pantalla para buscar verificacion física
     * Fecha de creación: 27/12/2016
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
  <h4 class="text-center">Pantalla Buscar verificación física</h4>
@stop 
<div>
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar verificaci&oacute;n f&iacute;sica</a>
    <a href="../administracion/verificacion_fisica/create" class="list-group-item">Nueva verificaci&oacute;n f&iacute;sica</a>
    <a href="#" class="list-group-item">Buscar ficha de descargo</a>
    <a href="#" class="list-group-item">Ejecutar destino</a>
    <a href="#" class="list-group-item">Revertir destino</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
  <!--  <div class="panel-body">   -->
    <!-- filtro busqueda de verificacion_fisica"-->

<table class="table table-responsive">
	{!! Form::open(['route' => 'administracion.verificacion_fisica.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
  	<div class="form-group" >
      <table class="table table-responsive"> 
        <tr border="0">
          <td>Desde</td> 
          <td>  {!!Form::text('fecha_verificacion_fisica',null,['class'=>'form-control', 'placeholder'=>'fecha de verificaci&oacute;n f&iacute;sica'])!!}</td> 
          <td>Hasta</td> 
          <td>  {!!Form::text('fecha_verificacion_fisica',null,['class'=>'form-control', 'placeholder'=>'fecha de verificaci&oacute;n f&iacute;sica'])!!}</td> 
          <td>Nombre de<br />verificador</td> 
          <td>  {!!Form::text('nombre_verificador',null,['class'=>'form-control', 'placeholder'=>'nombre de verificador'])!!}</td> 
          <td><button type="submit" class="btn btn-default"> Buscar</button></td>
        </tr>
      </table>
    </div>


<div class="form-group" >     
<table class="table table-responsive">
    <table class="table table-condensed">  
    <thead>
      <tr>
        <th>#</th>
        <th>Fecha</th>
        <th>Verificador</th>    
      </tr>
    </thead>
    <tbody> 
      @foreach($verificacion_fisica as $verificacion)
      <tr>         
        <td>{{$verificacion->id_verificacion_fisica}}</td>
        <td>{{$verificacion->fecha_verificacion_fisica}}</td>
        <td>{{$verificacion->nombre_verificador}}</td>
      
        <td>
                    <center>
                    <a href="{{route('administracion.verificacion_fisica.edit',$verificacion->id_verificacion_fisica)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a> 
                    <a href="{{route('administracion.verificacion_fisica.destroy',$verificacion->id_verificacion_fisica)}}" onclick="return confirm('¿Seguro desea eliminar la verificaci&oacute;n f&iacute;sica?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </center>
        </td>
        
         {{--        <td><center>{!! Form::radio('seleccionar',$verificacion->id_verificacion_fisica, ['class' => 'form-control' , 'required' => 'required']) !!}</center></td>    --}}                 
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
          <td>{!! $verificacion_fisica->render() !!}</td>
          <td> 
              <button type="submit" class="btn btn-primary"> Verificar</button>
              <button type="submit" class="btn btn-primary"> Reporte viñetas </button>            
              <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
     {{--        @include('../usuario_app/ayuda_usuario/ayuda_edit_usuario')   --}}
          </td>
        </tr>        
    <!-- Fin botones-->
      </table> 
    </div>
</div>
</div>
@stop   