<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:20/11/2016
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
  <h4 class="text-center">Buscar usuario</h4>
    <!--<h4 class="text-center">Pantalla buscar usuario</h4> -->
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar usuarios</a>
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
    <!-- filtro busqueda de usuario, los "&nbsp; son espacios"-->
        {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
        
                <div class="form-group" >
                    Nombre de usuario
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre de usuario'])!!}
                  &nbsp;&nbsp;Roles
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Roles'])!!}
                </div>
                 &nbsp;&nbsp; &nbsp;
                <div class="checkbox">
                    <label>
                      <input type="checkbox" name="opciones" id="opciones_1" value="opcion_1" checked>
                     Activo
                    </label>
                  </div>
                &nbsp;&nbsp;<button type="submit" class="btn btn-default"> Buscar</button>
   {!! Form::close() !!}
    <!-- fin filtro busqueda usuario-->
     
    {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'form']) !!}
    <table class="table">   
    <thead>
      <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Seleccionar</th>        
      </tr>
    </thead>
    <tbody>
  @foreach($obj_usuario as $obj_usuarios)
      <tr>
        <td>{{$obj_usuarios->id_usuario_app}}</td>
        <td>{{$obj_usuarios->nombre_usuario}}</td>
        <td></td>
        <td>
            @if($obj_usuarios->estado_usuario==1)
            Activo
            @else
            Bloqueado
            @endif
        </td>        
        <td>{!! Form::radio('seleccionar', null, ['class' => 'form-control' , 'required' => 'required']) !!}</td>       
      </tr>
   @endforeach   
    </tbody>
  </table>
    <div>
       <table class="table">
        <tr>
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
    </div>
 {!! Form::close() !!}
</div>
@stop   
