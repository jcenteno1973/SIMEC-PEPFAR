<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:28/11/2016
     * Creado por: Yamileth Campos
-->
@extends('plantillas.plantilla_inicio')
@section('fecha_sistema')
<p align=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop  
@section('contenido')
<div class="panel panel-primary">
  <div class="panel-heading"  >
      <h5 class="text-center">Solicitud de Credenciales</h5>
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
            <form class="form-signin" action="" method="POST">
                <br>
                <p align="center">Por favor Ingrese su correo electr&oacute;nico:</p>
                <table class="table table-bordered">
                    <tr>                       
                      <td>Correo Electr&oacute;nico* </td>
                      <td><input type="text" class="form-control" name="email" placeholder="Correo Electronico" required autofocus></td>
                    </tr>                    
                </table> 
                <table class="table">
                    <tr>
                      <td align="right">
                          <button type="submit" class="btn btn-primary">Enviar</button>  
                      </td>
                      <td align="center">
                          <a href="/" class="btn btn-primary">Regresar</a>
                      </td>
                      <td align="left">
                        <a href="#ventana1" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
                        <div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <br>
            </form>
        </div>
    </div><br><br>
    <div class="panel-footer"><h5 class="text-center">Derechos Reservados &copy; 2016, Universidad de El Salvador</h5></div>
</div>
@stop