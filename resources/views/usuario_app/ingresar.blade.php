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
        <h4>
       <strong>
         @if (session('flash_notification.level')=='warning')
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('flash_notification.message') !!}
        </div>
         @endif
        @if($errors->any())
        <div class="alert-danger" role="alert">
       Por favor corregir los siguientes errores
           @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
          @endforeach
        </div>
        @endif
        </strong>
        </h4>
        <div class="col-md-6 col-md-offset-3">        
            <div class="col-md-6 col-md-offset-3">
            <img class="profile-img" src="{{asset('images/logo_login2.png')}}" width="150" height="150"> 
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
              <a href="{{ url('password/email') }}" class="btn btn-primary">Restablecer contraseña</a>
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
    <div class="panel-footer"><h5 class="text-center">Derechos Reservados &copy; 2016, UES/FIA/EISI</h5></div>
</div>
@stop