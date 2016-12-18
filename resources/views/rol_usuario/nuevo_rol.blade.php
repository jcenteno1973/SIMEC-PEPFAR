<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripci�n:
     * Fecha de creaci�n:30/11/2016
     * Creado por: Yamileth Campos
     * Modificado por: Karla Barrera 
     * Fecha modificaci�n: 1/12/2016
     * Descripci�n: Rutas agregadas al submenu
     * Modificado por: Juan Carlos Centeno
     *Fecha modificación: 17/12/2016
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Nuevo Rol</h4>  
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>    
    <a class="list-group-item active">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="../administracion/catalogos" class="list-group-item">Catalogos</a>
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
                          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>                 
                          @include('usuario_app/ayuda_usuario/ayuda_nuevo_rol')               
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            {!! Form::close() !!} 
        </div>
    </div><br><br>
</div>
@stop   


