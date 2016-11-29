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
         @if($errors->any())
            <div class="alert alert-warning" role="alert">
            <p>Por favor corregir los siguientes errores</p>
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            </div>
          @endif 
        <div class="col-md-4 col-md-offset-4">
            <div class="col-md-4 col-md-offset-4">
            <img class="profile-img" src="/sicafam/public/images/logo_login2.png" width="150" height="150"> 
            </div>
        <form class="form-signin" action="{{ url('usuario_app/ingresar') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered">
        <tr>
          <td>Nombre de usuario* </td>
          <td><input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre de usuario*" required autofocus></td>
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
              <!-- <button type="button" class="btn btn-primary">Solicitar contraseña</button> -->
              <a href="administracion/solicitar_credenciales" class="btn btn-primary">Solicitar credenciales</a>
              
          </td>
          <td>
              <!-- <button type="button" class="btn btn-primary">Ayuda</button> -->
             <a href="#ingreso" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
               <div class="modal fade" id="ingreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <!--header de la ventana-->
                            <div class="modal-header">                    
                                <p class="modal-title"> Ayuda para ingresar al sistema</p>
                            </div>
                            <!-- Contenido de la ventana -->
                            <div class="modal-body">
                                 <table> 
                                    <tr>
                                        <td>
                                            <img src="{{asset('images/informativo.png')}}" alt="informativo" class="img-thumbnail"/>                                
                                        </td>
                                        <td>
                                             <p ><font color="white">...</font></p>
                                        </td>
                                        <td>
                                             <p>contenido de la ventana</p>
                                        </td>
                                    </tr>

                                </table>  

                            </div>
                            <!--footer de la ventana-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
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