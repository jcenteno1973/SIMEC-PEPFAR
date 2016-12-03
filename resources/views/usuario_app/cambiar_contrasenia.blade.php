<!-- 
     * Nombre del archivo:cambiar_contrasenia.blade.php
     * Descripción: Pantalla para cambiar contrasenia
     * Fecha de creación:1/12/2016
     * Creado por: Karla Barrera
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p align=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop  
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Cambiar contrase&ntilde;a</h4>
    <!--<h4 class="text-center">Pantalla buscar usuario</h4> -->
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../administracion/buscar_usuario"class="list-group-item">Buscar usuarios</a>
    <a href="../../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a class="list-group-item active">Cambio de contraseña</a>
    <a href="../../admin/rol/create" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
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
                <!-- Ingresar nombre de usuario -->
                  {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
        
                <div class="form-group" >
                    Usuario*&nbsp;&nbsp;
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre de usuario'])!!}
                  &nbsp;&nbsp;Contrase&ntilde;a*&nbsp;&nbsp;
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nueva contrase&ntilde;a'])!!}
                </div>
                 &nbsp;&nbsp; &nbsp;                
   {!! Form::close() !!}
    <!-- fin filtro busqueda usuario-->

                
                <table class="table table-responsive">
                    <tr>
                      <td align="left">
                          <button type="submit" class="btn btn-primary">Guardar</button>  
                      </td>
                      <td align="left">
                          <a href="../../administracion/buscar_usuario" class="btn btn-primary">Regresar</a>
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
                <p>*Campo requerido</p>
                <br>
            </form>
        </div>
    </div><br><br>
</div>
@stop