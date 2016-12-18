<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripci�n:
     * Fecha de creaci�n:08/12/2016
     * Creado por: Yamileth Campos

-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Editar Rol</h4>
    <!--<h4 class="text-center">Pantalla buscar usuario</h4> -->
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/cambiar_contrasenia" class="list-group-item">Cambio de contrase&ntilde;a</a>
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a class="list-group-item active">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">         
        <!--Crear nuevo rol-->             
        <div class="col-lg-8">
            <form class="form-signin" action="" method="POST">
                <br>
                <table class="table">
                    <tr>                       
                      <td>Rol* </td>
                      <td>
                          <select name="nuevorol" class="form-control">
                              
                          </select>
                      </td>
                    </tr>
               
                    <tr>
                        <td>Descripci&oacute;n* </td>
                      <td>
                          <input type="text" maxlength="25" class="form-control" name="descripcion" placeholder="Descripci&oacute;n" required autofocus>
                      </td>
                    </tr>                    
                </table>
       
                <table class="table table-responsive">
                    <tr>               
                        <td align="left">
                          <a href="../administracion/contrasenia_cambio" class="btn btn-primary">Guardar</a>                      
                          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>              
                          @include('usuario_app/ayuda_usuario/ayuda_editar_rol')               
                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
            </form>
        </div>
    </div><br><br>
</div>
@stop   



