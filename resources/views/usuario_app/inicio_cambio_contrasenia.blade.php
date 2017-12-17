<!-- 
     * Nombre del archivo: inicio_cambio_contrasenia.blade.php
     * Descripción: Pantalla para cambiar contrasenia
     * Fecha de creación:2/12/2016
     * Creado por: Karla Barrera
-->
@extends('plantillas.plantilla_sin_columna')
@section('fecha_sistema')
<p align=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=left>inicio_cambio_contrasenia.blade.php</p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla cambiar contrase&ntilde;a</h4>
    <!--<h4 class="text-center">Pantalla buscar usuario</h4> -->
@stop 

@section('contenido')
<div class="panel panel-default">
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
            <form class="form-signin" action="" method="POST">
                <br>
               

    <table class="table table-responsive" border-style= "none">
                    <tr>                       
                      <td>Contrase&ntilde;a* </td>
                      <td><input type="text" maxlength="25" style="width:100%" class="form-control" name="usuario" placeholder="Nueva Contrase&ntilde;a" required autofocus></td>
                    </tr> 
                    <tr>                       
                      <td>Repetir contrase&ntilde;a* </td>
                      <td><input type="text" maxlength="25" style="width:100%" class="form-control" name="contrasenia" placeholder="Vuelva a digitar la contrase&ntilde;a" required autofocus></td>
                    </tr>                    
                </table> 

              <div class= "table-responsive"> 
                <table class="table">
                    <tr>
                      <td align="left">
                          <button type="submit" class="btn btn-primary">Guardar</button>  
                      </td>
                  <!--    <td align="left">
                          <a href="../../Controllers/usuario_appController" class="btn btn-primary">Cancelar</a>
                      </td>
                      <td align="left">
                          <a href="../../administracion/buscar_usuario" class="btn btn-primary">Regresar</a>
                      </td>  -->
                      <td align="left">
                          <a href="../administracion/buscar_usuario" class="btn btn-primary">Regresar</a>
                      </td>
                      <td align="left">
                        <a href="#ventana1" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
                        <div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content"> 
                                     <!--header de la ventana-->
                                     <div class="modal-header">                    
                                         <p class="modal-title"> Ayuda para cambio de contrase&ntilde;a</p>
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
              </div>
                <p>*Campo requerido</p>
                <br>
            </form>
        </div>
    </div><br><br>
</div>
@stop