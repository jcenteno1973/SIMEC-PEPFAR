<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:06/11/2016
     * Creado por: Juan Carlos Centeno Borja
     * 
     * Fecha de modificación: 28/11/2016
     * Modificado por: Yamileth Campos
     * Descripción: se agrega funcionalidad en boton de ayuda y boton de solicitud de contraseña  
-->
@extends('plantillas.plantilla_inicio')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop  
@section('contenido')
<div class="panel panel-primary">
  <div class="panel-heading"  >
      <h5 class="text-center">Pantalla de ingreso</h5>
  </div> 
    <div class="panel-body">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-md-6 col-md-offset-3">
            <img class="profile-img" src="/sicafam/public/images/logo_login2.png" width="150" height="150"> 
            </div>
        <form class="form-signin" action="{{ url('usuario_app/ingresar') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-condensed">
        <tr>
          <td>Código de usuario* </td>
          <td><input type="text" class="form-control" name="nombre_usuario" placeholder="Código de usuario*" required autofocus></td>
        </tr>
        <tr>
          <td>Contraseña*</td>
          <td><input type="password" class="form-control" name="password" placeholder="Contraseña*" required> </td>
        </tr>
        </table> 
        <table class="table">
        <tr>
          <td>
              <button type="submit" class="btn btn-primary">Ingresar</button>  
          </td>
          <td>              
              <button type="reset" class="btn btn-primary">Cancelar</button> 
          </td>
          <td>
              
              <a href="usuario_app/solicitar_credenciales" class="btn btn-primary">Restablecer contraseña</a>
              
          </td>
          
          <td>
               @include('usuario_app/ayuda_usuario/ayuda_ingreso')			
          </td>
        </tr>
        </table>
        <p>*Campo requerido</p>
        </form>
        </div>
    </div>
    <div class="panel-footer"><h5 class="text-center">Derechos Reservados &copy; 2016, Universidad de El Salvador</h5></div>
</div>
@stop