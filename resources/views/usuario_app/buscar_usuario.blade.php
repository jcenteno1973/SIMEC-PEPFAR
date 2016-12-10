<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripcion:
     * Fecha de creacion:20/11/2016
     * Creado por: Juan Carlos Centeno Borja
     * modificado por: yamileth Campos
     * Fecha de modificacion:1/12/16
     *
     * Modificado por: Karla Barrera 
     * Fecha modificación: 1/12/2016
     * Descripción: Rutas agregadas al submenu

     * Modificado por: Yamileth Campos 
     * Fecha modificacion: 08/12/2016
     * Descripción: botones de ayuda

-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Buscar usuario</h4>
    <!--<h4 class="text-center">Pantalla buscar usuario</h4> -->
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="" class="list-group-item">Cambio de contraseña</a>
    <a href="" class="list-group-item">Nuevo rol</a>
    <a href="" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <!-- filtro busqueda de usuario, los "&nbsp; son espacios"-->
        {!! Form::open(['route' => 'administracion/buscar_usuario', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
        
                <div class="form-group" >
                    Nombre de usuario
                  {!!Form::text('nombre_usuario',null,['class'=>'form-control', 'placeholder'=>'Nombre de usuario'])!!}
                  &nbsp;&nbsp;Roles
                  <!--{!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Roles'])!!} Borrar ya que roles es una lista  -->
                </div>
                 <select name="rol_usuario" class="form-control" >
                     <option> </option>
                        @foreach($obj_role as $obj_roles)
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endforeach
                 </select>
                &nbsp;&nbsp; &nbsp;
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="estado_usuario" id="estado_usuario" value="1" checked>                     
                     Activo
                    </label>
                  </div>
                &nbsp;&nbsp;<button type="submit" class="btn btn-default"> Buscar</button>
   {!! Form::close() !!}
    <!-- fin filtro busqueda usuario -->
    {!! Form::open(['route' => 'administracion/editar_usuario', 'class' => 'form']) !!}
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
         @foreach($obj_role as $obj_roles)
          @if($obj_roles->id_rol_usuario==$obj_usuarios->id_rol_usuario)
        <td>{{$obj_roles->nombre_rol}}</td>
        @endif
         @endforeach
        <td>
            @if($obj_usuarios->estado_usuario==1)
            Activo
            @else
            Bloqueado
            @endif
        </td>        
        <td>
        {!! Form::radio('seleccionar',$obj_usuarios->id_usuario_app, ['class' => 'form-control' , 'required' => 'required']) !!}        
        </td>         
      </tr>   
   @endforeach   
    </tbody>   
  </table>   
     <div align="center"> 
              {!!$obj_usuario->render()!!}
   </div>
    <div>
       <table class="table">
        <tr>
          <td>
               {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}
             <!--<a href="{{ route ('administracion/editar_usuario',[])}}" class="btn btn-primary">Editar </a>--> 
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
              <!--Boton de ayuda-->
              @include('usuario_app/ayuda_usuario/ayuda_busca_usuario') 
              <!--FIN Boton de ayuda-->
          </td>
        </tr>        
        </table> 
    </div>
    {!! Form::close() !!}    
</div>
@stop   
