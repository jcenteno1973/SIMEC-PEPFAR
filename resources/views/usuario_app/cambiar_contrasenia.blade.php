<!-- 
     * Nombre del archivo:cambiar_contrasenia.blade.php
     * Descripción: Pantalla para cambiar contrasenia
     * Fecha de creación:1/12/2016
     * Creado por: Karla Barrera


     * Fecha modificacion:8/12/2016
     * Modificado por: Yamileth Campos
     * Descripcion: cambio en botones
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p align=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop  
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla cambio de contrase&ntilde;a</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario"class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a class="list-group-item active">Cambio de contraseña</a>
    <a href="../admin/rol/create" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">        
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'administracion/cambiar_contrasenia', 'class' => 'form']) !!}
          <!--  <form class="form-signin" action="" method="POST"> -->
                <br>
                <table class="table table-condensed">
                    <tr>                       
                      <td>Id* </td>
                      <td>
                         {!! Form::text('id_usuario_app',$obj_usuario->id_usuario_app, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!} 
                      </td>
                    </tr> 
                    <tr>                       
                      <td>Código de usuario* </td>
                      <td>
                         {!! Form::text('nombre_usuario',$obj_usuario->nombre_usuario, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!} 
                      </td>
                    </tr> 
                    <tr>                       
                      <td>Contrase&ntilde;a* </td>
                      <td><input type="password" maxlength="25" style="width:100%" class="form-control" name="password" placeholder="Nueva contrase&ntilde;a" required autofocus></td>
                    </tr>                    
                </table> 
                <table class="table table-condensed">
                    <tr>
                 <!--     <td align="left">
                          <button type="submit" class="btn btn-primary">Guardar</button>  
                      </td>  -->
                      <td align="left">
                        <button type="submit" class="btn btn-primary">Guardar</button>                          
                      </td>

                      <td align="left">
                          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
                      </td>
                      <td align="left">
                       @include('usuario_app/ayuda_usuario/ayuda_cambio_clave')

                      </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>
                <br>
           <!-- </form> -->
            {!! Form::close()!!}
        </div>
    </div><br><br>
</div>
@stop