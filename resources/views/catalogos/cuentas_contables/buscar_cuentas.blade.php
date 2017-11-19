<!-- 
     * Nombre del archivo: buscar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 4/12/2016
     * Creado por: Karla Barrera
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Buscar cuenta contable</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item active">Buscar cuenta contable</a>
    <a href="../administracion/contable/create" class="list-group-item">Nueva cuenta contable</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <!-- filtro busqueda de ubicacion, los "&nbsp; son espacios"-->
    {!! Form::open(['route' => 'administracion.contable.index', 'class' => 'navbar-form navbar-left', 'method'=>'GET']) !!}
        <div class="form-group">
          <label for="codigo">C&oacute;digo de la cuenta Contable :</label>
          {!!Form::text('codigo',null,['class'=>'form-control', 'placeholder'=>'Codigo cuenta contable'])!!}
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}
    <!-- fin filtro -->
    
    <!--lista de ubicacion organizacional-->        
    <br><br>
    
    <div class="form-group" >
        
        <table class="table table-condensed">
        <thead>
            <th><center> #</center></th>
            <th> <center>C&oacute;digo</center></th>
            <th> <center>Nombre de Cuenta</center></th>
            <th><center>Estado</center></th>
            <th><center>Opciones</center></th>

        </thead>
        <tbody> 
             @foreach($cuenta as $cuentas)
            <tr> 
                <td><center>{{$cuentas->id_cuenta_contable}}</center></td>
                <td><center>{{$cuentas->cta_contable_activo_fijo}}</center></td>
                <td><center>{{$cuentas->cta_contable_depreciacion}}</center></td>        
                <td><center>{{$cuentas->estado_registro}}</center></td>
                <td><center>
                    <a href="{{route('administracion.contable.edit',$cuentas->id_cuenta_contable)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a> 
                    <a href="{{route('administracion.contable.destroy',$cuentas->id_cuenta_contable)}}" onclick="return confirm('¿Seguro desea cambiar el estado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </center>
                </td>
        
                
            </tr>
           @endforeach
        </tbody>
    </table>          <!-- Renderizado-->
    </div>
    
<!-- Botones"--> 
<div class="col-xs-8 col-sm-8"><br /><br />
       <table class="table">
        <tr>
          <td>{!! $cuenta->render() !!}</td>
          <td>
             {{-- <a href="#" class="btn btn- btn-primary">Editar</a>
              <a href="#" class="btn btn-primary">Borrar</a> --}}
              <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
             @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  
          </td>
        </tr>        
    <!-- Fin botones-->
      </table> 
    </div>
    <!-- Fin botones-->
   {!! Form::close() !!}  
</div>
@stop   
