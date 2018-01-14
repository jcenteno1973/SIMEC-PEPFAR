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
<p ALIGN=center>nuevo_rol.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Nuevo Rol</h4>  
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>    
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/reporte_usuario" class="list-group-item">Reporte de usuarios</a>
    <a class="list-group-item active">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="../administracion/consultar_archivo_datos" class="list-group-item">Consultar archivos</a>
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">         
        <!--Crear nuevo rol-->
        <div class="col-lg-8">
             {!! Form::open(['route' => 'administracion/nuevo_rol', 'class' => 'form']) !!}
                <table class="table table-condensed">
                    <tr>                       
                      <td>Nombre del Rol* </td>
                      <td><input type="text" maxlength="25" class="form-control" name="nombre_rol" placeholder="Nombre del rol" required autofocus></td>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n* </td>
                      <td><input type="text" maxlength="25" class="form-control" name="descripcion" placeholder="Descripci&oacute;n" required></td>
                    </tr>                    
                </table>
        <!-- fin crear nuevo rol-->        
                <table class="table table-condensed">
                    <tr>               
                      <td align="left">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>                 
                          @include('ayuda/ayuda_nuevo_rol')               
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


