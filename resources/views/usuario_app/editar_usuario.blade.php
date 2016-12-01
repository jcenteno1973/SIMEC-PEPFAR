<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla nuevo usuario</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item active">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="#" class="list-group-item">Cambio de contraseña</a>
    <a href="#" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
      <!--  {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'form']) !!}
               
      -->
       <table class="table">
        <tr>
          <td>
              <td>
              <button type="submit" class="btn btn-primary">editar</button>  
              <button type="reset" class="btn btn-primary">Regresar</button>
              <!--Boton de ayuda-->
              <a href="#buscarusuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
               <div class="modal fade" id="buscarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <!--header de la ventana-->
                            <div class="modal-header">                    
                                <p class="modal-title"> Ayuda para buscar usuario</p>
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
              <!--FIN Boton de ayuda-->
          </td>
        </tr>        
        </table> 
    <!--
    </div>
    {!! Form::close() !!}      -->  
    </div>
</div>
@stop   
