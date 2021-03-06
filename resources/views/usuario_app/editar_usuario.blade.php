<!-- 
     * Nombre del archivo:editar_usuario.blade.php
     * Descripción:Formulario para editar el usuario
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
@section('nombre_plantilla')
<p ALIGN=center>editar_usuario.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla Editar usuario</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>    
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>    
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>    
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
       <!-- Aqui deberia ir el formulario-->
       {!! Form::open(['route' => 'administracion/guardar_usuario', 'class' => 'form']) !!}
       <table class="table table-condensed">    
        <tbody>
            <tr>
                <td>Id</td>
            <td>
                {!! Form::text('id_usuario_app',$obj_usuario->id_usuario_app, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!}
               
            </td>
           <td>Código de usuario </td>
           <td>
               {!! Form::text('nombre_usuario',$obj_usuario->nombre_usuario, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!} 
            </td>
            </tr>
           <tr>            
            <td>
            Estado usuario *
            </td>
                <td>
                  @if($obj_usuario->estado_usuario==1)
                  <select name="estado_usuario" class="form-control">
                      <option value="1" >Activo </option>
                      <option value="0">Bloqueado </option>
                  </select>                    
                  @else
                 <select name="estado_usuario" class="form-control">
                     <option value="0">Bloqueado </option>
                     <option value="1">Activo </option>
                  </select> 
                  @endif
                </td>
            </tr>
            <tr>
            <td>Nombres *</td>
            <td>  
                {!! Form::text('nombres_usuario',$obj_usuario->nombres_usuario , ['class' => 'form-control' , 'required' => 'required']) !!}
            </td>
            <td>Apellidos *</td>
            <td>                 
                {!! Form::text('apellidos_usuario',$obj_usuario->apellidos_usuario, ['class' => 'form-control' , 'required' => 'required']) !!}                   
            </td>
            </tr>
            <tr>
            <td>Correo electrónico *</td>
            <td>
                {!! Form::email('email',$obj_usuario->email, ['class' => 'form-control' , 'required' => 'required']) !!}                   
            </td>
            <td> Contraseña</td>
            <td>                    
                <input type="password" class="form-control" name="password">                                  
            </td>
            </tr>
            <tr>
              <td>Rol *</td>
                <td>
                    <select name="rol_usuario" class="form-control" >
                       @foreach($obj_role as $obj_roles)
                       @if($obj_roles->role_id==$obj_usuario->role_id)
                       <option selected="true">{{$obj_roles->nombre_rol}}</option>
                        @else
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endif
                        @endforeach    
                    </select>
                </td>
              <td>País *</td>
                 <td>                 
                    <select name="id_region_sica" class="form-control">
                    @foreach($obj_region_sica as $paises)
                        @if($paises->id_region_sica==$obj_usuario->id_region_sica)
                            <option value="{{$paises->id_region_sica}}" selected>{{$paises->nombre_pais}}</option>
                        @else
                            <option value="{{$paises->id_region_sica}}" >{{$paises->nombre_pais}}</option>
                        @endif
                    @endforeach                           
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hospital *</td>
                <td>                 
                    <select name="id_hospital" class="form-control">
                        <option value="" >-- Seleccionar -- </option>
                        @foreach($obj_select_hospital as $obj_item)
                            @if($obj_usuario->id_hospital == $obj_item->id_hospital)
                            <option value="{{$obj_item->id_hospital}}" selected>{{$obj_item->nombre_hospital}}</option>
                            @else
                                <option value="{{$obj_item->id_hospital}}">{{$obj_item->nombre_hospital}}</option>
                            @endif
                        @endforeach                      
                   </select>
                </td>
            </tr>
            <tr>
                <td>Laboratorios *</td>
                <td>                 
                    <select name="id_laboratorios" class="form-control">
                        <option value="" >-- Seleccionar -- </option>
                        @foreach($obj_select_laboratorios as $obj_item)
                            @if($obj_usuario->id_laboratorios == $obj_item->id_laboratorios)
                            <option value="{{$obj_item->id_laboratorios}}" selected>{{$obj_item->nombre_laboratorio}}</option>
                            @else
                                <option value="{{$obj_item->id_laboratorios}}">{{$obj_item->nombre_laboratorio}}</option>
                            @endif
                        @endforeach                      
                   </select>
                </td>
            </tr>
            <tr>
                <td>Municipio *</td>
                <td>                 
                    <select name="id_municipio" class="form-control">
                        <option value="" >-- Seleccionar -- </option>
                        @foreach($obj_select_municipio as $obj_item)
                            @if($obj_usuario->id_municipio == $obj_item->id_municipio)
                            <option value="{{$obj_item->id_municipio}}" selected>{{$obj_item->nombre_municipio}}</option>
                            @else
                                <option value="{{$obj_item->id_municipio}}">{{$obj_item->nombre_municipio}}</option>
                            @endif
                        @endforeach                      
                   </select>
                </td>
            </tr>
           
        </tbody>
     </table>  
       <!-- Botones"--> 
    <div>
       <table class="table">
        <tr>
          <td>
              <button type="submit" class="btn btn-primary">Guardar</button>             
              <a href="../administracion/buscar_usuario" class="btn btn-primary"> Regresar</a>
              @include('ayuda/ayuda_edit_usuario')
       </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
    </div>
    {!! Form::close()!!}
 
    </div>
</div>
@stop   
