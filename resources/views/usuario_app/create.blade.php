<!-- 
     * Nombre del archivo:create.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>create.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla nuevo usuario</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Nuevo usuario</a>
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>     
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>   
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
        <div class="panel-body">
        {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'form']) !!}
            <table class="table table-condensed">    
            <tbody>
              <tr>
                <td>Nombres *</td>
                <td> 
                  {!! Form::text('nombres_usuario', null, ['class' => 'form-control','pattern'=>'[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{3,25}' , 'required' => 'required']) !!}
                </td>
                <td>Apellidos *</td>
                <td> 
                    {!! Form::text('apellidos_usuario', null, ['class' => 'form-control','pattern'=>'[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{4,25}' , 'required' => 'required']) !!}
                    
                </td>
              </tr>
              <tr>
                <td>Correo electrónico *</td>
                <td>
                      {!! Form::email('email', null, ['class' => 'form-control' , 'required' => 'required']) !!}                   
                </td>
                <td> Contraseña *</td>
                <td>                    
                    <input type="password" class="form-control" name="password" required>                                  
                </td>
              </tr>
               <tr>
                <td>Rol *</td>
                <td>
                   <select name="rol_usuario" class="form-control" required>
                        @foreach($obj_role as $obj_roles)
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endforeach
                   </select>
                </td>
                </tr>
                <tr>
                <td>País *</td>
                <td>                 
                    <select name="id_region_sica" class="form-control" required>
                        @foreach($obj_region_sica as $paises)
                            <option value="{{$paises->id_region_sica}}">{{$paises->nombre_pais}}</option>
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
                            <option value="{{$obj_item->id_hospital}}">{{$obj_item->nombre_hospital}}</option>
                        @endforeach                      
                   </select>
                </td>
              </tr>
              <tr>
                <td>Laboratorio *</td>
                <td>                 
                    <select name="id_laboratorios" class="form-control">
                        <option value="" >-- Seleccionar -- </option>
                        @foreach($obj_select_laboratorios as $obj_item)
                        <option value="{{$obj_item->id_laboratorios}}">{{$obj_item->nombre_laboratorio}}</option>
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
                        <option value="{{$obj_item->id_municipio}}">{{$obj_item->nombre_municipio}}</option>
                        @endforeach                      
                   </select>
                </td>
              </tr>
            </tbody>
          </table>       
    <div>
       <table class="table">
        <tr>
          <td>
             <button type="submit" class="btn btn-primary">Guardar</button>  
              <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>
              @include('ayuda/ayuda_nuevo_usuario') 
          </td>
        </tr>        
        </table>
        </div>
        <div class="panel-footer">
          <p>* Campo requerido</p>   
        </div>
    </div>
    {!! Form::close() !!}        
  
</div>
@stop   
