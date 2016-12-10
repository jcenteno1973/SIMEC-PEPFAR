<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     *
     * Modificado por: Karla Barrera 
     * Fecha modificación: 1/12/2016
     * Descripción: Rutas agregadas al submenu
     *
     * Modificado por: Yamileth Campos
     * Fecha modificación: 5/12/2016
     * Descripción: Agregar campos de edicion de usuario
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla Editar usuario</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/contrasenia/cambiar" class="list-group-item">Cambio de contraseña</a>
    <a href="../admin/rol/create" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bitacora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
       <!-- Aqui deberia ir el formulario-->
       {!! Form::open(['route' => 'administracion/guardar_usuario', 'class' => 'form']) !!}
       <table class="table table-bordered">    
        <tbody>
            <tr>
                <td>Id</td>
            <td>
                {!! Form::text('id_usuario_app',$obj_usuario->id_usuario_app, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!}
               
            </td>
           <td>Nombre de usuario </td>
           <td>
               {!! Form::text('nombre_usuario',$obj_usuario->nombre_usuario, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!} 
            </td>
            </tr>
           <tr>            
            <td> No DUI*</td>
            <td>
                {!! Form::text('numero_dui',$obj_usuario->numero_dui, ['class' => 'form-control' , 'required' => 'required']) !!}
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
                {!! Form::email('email_usuario',$obj_usuario->email_usuario, ['class' => 'form-control' , 'required' => 'required']) !!}                   
            </td>
            <td> Contraseña *</td>
            <td>                    
                <input type="password" class="form-control" name="password" required="true" >                                  
            </td>
            </tr>
            <tr>
              <td>Rol *</td>
                <td>
                    <select name="rol_usuario" class="form-control" >
                       @foreach($obj_role as $obj_roles)
                       @if($obj_roles->id_rol_usuario==$obj_usuario->id_rol_usuario)
                       <option selected="true">{{$obj_roles->nombre_rol}}</option>
                        @else
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endif
                        @endforeach    
                    </select>
                </td>
              <td>Cargo *</td>
                 <td>                 
                    <select name="cargo_emp" class="form-control">
                    @foreach($obj_cargo_emp as $obj_cargos_emp)
                    @if($obj_cargos_emp->id_cargo_emp==$obj_usuario->id_cargo_emp)
                    <option selected="true">{{$obj_cargos_emp->nombre_cargo}}</option>
                    @else
                         <option>{{$obj_cargos_emp->nombre_cargo}}</option>
                    @endif
                    @endforeach                           
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Unidad o Departamento *
                </td>
                <td>                    
                <select name="id_ubicacion_org" class="form-control">
                    @foreach($obj_ubicacion_org as $obj_ubicaciones_org)
                    @if($obj_ubicaciones_org->id_ubicacion_org==$obj_usuario->id_ubicacion_org)
                    <option selected="true">{{$obj_ubicaciones_org->nombre_unidad_dep}}</option>
                    @else
                    <option>{{$obj_ubicaciones_org->nombre_unidad_dep}}</option>
                    @endif
                    @endforeach
                 </select>
                </td>
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
        </tbody>
     </table>  
       <!-- Botones"--> 
    <div>
       <table class="table">
        <tr>
          <td>
              <button type="submit" class="btn btn-primary">Guardar</button>             
              <button type="reset" class="btn btn-primary">Regresar</button>
              @include('usuario_app/ayuda_usuario/ayuda_edit_usuario')
       </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
    </div>
    {!! Form::close()!!}
 
    </div>
</div>
@stop   
