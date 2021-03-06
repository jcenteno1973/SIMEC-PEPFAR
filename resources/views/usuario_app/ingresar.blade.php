<!-- 
     * Nombre del archivo:ingresar.blade.php
     * Descripción:
     * Fecha de creación:06/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_inicio')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=left>ingresar.blade.php</p>
@stop 
@section('contenido')
<div class="panel panel-primary">
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
       Por favor corregir los siguientes errores:
          @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
          @endforeach
        </div>
        @endif
        </strong>
        </h4>

        <div class="col-md-6 col-md-offset-3 animated zoomIn">        
            <div class="col-md-6 col-md-offset-3">
                <img class="profile-img" src="{{asset('images/logo_login2.png')}}" width="150" height="150"> 
            </div>
            <form class="form-signin" action="{{ url('usuario_app/ingresar') }}" method="POST" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table class="table">
                <tr>
                  <td>Código de usuario</td>
                  <td><input type="text" class="form-control" name="nombre_usuario" placeholder="Código de usuario" required autofocus></td>
                </tr>
                <tr>
                  <td>Contraseña</td>
                  <td><input type="password" class="form-control" name="password" placeholder="Contraseña" required> </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <button type="submit" class="btn btn-primary">Ingresar</button>  
                    </td>
                    <td class="text-center">
                        <a href="{{ url('password/email') }}" class="btn btn-primary">Restablecer contraseña</a>
                    </td>
                </tr>
                {{-- <!--
                <tr>
                    <td>
                       @include('ayuda/ayuda_ingreso')	
                    </td>
                </tr> --> --}}
                </table>
            </form>
        </div>
    </div>
    <div class="panel-footer"><h5 class="text-center">Derechos Reservados &copy; 2019, SE-COMISCA</h5></div>
</div>
@stop