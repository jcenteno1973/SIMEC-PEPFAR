<!-- 
     * Nombre del archivo:nuevo_rol.blade.php
     * Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>nuevo_bitacora.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Nuevo Bitacora</h4>  
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>    
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>    
    <a class="list-group-item active">Nuevo Bitacora</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>    
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">         
        <!--Crear nuevo rol-->
        <div class="col-lg-8">
             {!! Form::open(['route' => 'administracion/nuevo_bitacora', 'class' => 'form']) !!}
                <table class="table table-condensed">
                    <tr>
                      <td>Usuario APP </td>
                      <td><input type="text" maxlength="25" class="form-control" name="id_usuario_app" placeholder="id_usuario_app" required autofocus></td>
                    </tr>
                    <tr>                       
                      <td>Fecha Hora Transaccion </td>
                      <td><input type="text" maxlength="25" class="form-control" name="fecha_hora_transaccion" placeholder="fecha_hora_transaccion" required ></td>
                    </tr>
                    <tr>                       
                      <td>transaccion_realizada</td>
                      <td><input type="text" maxlength="25" class="form-control" name="transaccion_realizada" placeholder="transaccion_realizada" required ></td>
                    </tr>
                    <tr>                       
                      <td>id_dispositivo</td>
                      <td><input type="text" maxlength="25" class="form-control" name="ip_dispositivo" placeholder="ip_dispositivo" required ></td>
                    </tr>
                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                          <a href="{{route('administracion')}}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>                 
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
<link rel="stylesheet" href="http://localhost/rop/public/assets/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stop   


