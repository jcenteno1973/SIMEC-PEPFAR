<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:30/11/2016
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
  <h4 class="text-center">Nuevo Rol</h4>
    <!--<h4 class="text-center">Pantalla buscar usuario</h4> -->
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="#" class="list-group-item">Cambio de contraseña</a>
    <a href="#" class="list-group-item active">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
    <!-- crear nuevo rol-->
    <table class="table table-striped">
     
   
    <!-- fin Crear nuevo rol-->
    {!! Form::open(['route'=>'admin.rol.store','method'=>'POST'])!!}
    <div class="form-group">
    <table>
        <tr>        
            <td>{!! Form::label('rol','Nombre del rol *')!!}</td>
            <td ><font color="white">...</font></td><!--genera el espacio-->
            <td>{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre Rol','required']) !!}</td>
        </tr>
     </table>
    </div>

    <!-- Botones"--> 
    <div>
       <table class="table">
        <tr>
          <td>
              {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}              
              <button type="reset" class="btn btn-primary">Regresar</button>
                <!--Boton de ayuda-->
                <a href="#buscarusuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
                 <div class="modal fade" id="buscarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content"> 
                              <!--header de la ventana-->
                              <div class="modal-header">                    
                                  <p class="modal-title"> Ayuda para nuevo rol</p>
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
        
    </div>
    <!-- Fin botones-->
    
    {!! Form::close()!!}
    </table>
    </div>
</div>
@stop   


