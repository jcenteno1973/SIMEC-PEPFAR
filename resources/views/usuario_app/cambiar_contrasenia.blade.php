<!-- 
     * Nombre del archivo:cambiar_contrasenia.blade.php
     * Descripción: Formulario para cambiar contrasenia
     * Fecha de creación:1/12/2016
     * Creado por:Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p align=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>cambiar_contrasenia.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla cambio de contrase&ntilde;a</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>   
    <a href="../administracion/buscar_usuario"class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/reporte_usuario" class="list-group-item">Reporte de usuarios</a> 
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="../administracion/consultar_archivo_datos" class="list-group-item">Consultar archivos</a>
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
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
                <div class="col-xs-12 clearfix">
                   <button type="submit" class="btn btn-primary">Guardar</button>   
                   <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>
                   @include('usuario_app/ayuda_usuario/ayuda_cambio_clave')
                </div>
                
                <p>*Campo requerido</p>
                <br>
           <!-- </form> -->
            {!! Form::close()!!}
        </div>
    </div><br><br>
</div>
@stop