<!-- 
     * Nombre del archivo:create.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
     * Modificado por: Karla Barrera 
     * Fecha modificación: 2/12/2016
     * Descripción: Rutas agregadas al submenu
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
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a class="list-group-item active">Nuevo usuario</a>
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
        {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'form']) !!}
            <table class="table table-bordered">    
            <tbody>
              <tr>
                <td>No DUI *</td>
                <td>                 
                      {!! Form::text('numero_dui', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Unidad o Departamento *</td>
                <td>
                    <select name="id_ubicacion_org" class="form-control">
                        @foreach($obj_ubicacion_org as $obj_ubicaciones_org)
                        <option>{{$obj_ubicaciones_org->nombre_unidad_dep}}</option>
                        @endforeach
                   </select>
                </td>
              </tr>
              <tr>
                <td>Nombres *</td>
                <td>                     
                      {!! Form::text('nombres_usuario', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Apellidos *</td>
                <td>                 
                      {!! Form::text('apellidos_usuario', null, ['class' => 'form-control' , 'required' => 'required']) !!}                   
                </td>
              </tr>
              <tr>
                <td>Correo electrónico *</td>
                <td>
                      {!! Form::email('email_usuario', null, ['class' => 'form-control' , 'required' => 'required']) !!}                   
                </td>
                <td> Contraseña *</td>
                <td>                    
                    <input type="password" class="form-control" name="password" required>                                  
                </td>
              </tr>
               <tr>
                <td>Rol *</td>
                <td>
                   <select name="rol_usuario" class="form-control" >
                        @foreach($obj_role as $obj_roles)
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endforeach
                   </select>
                </td>
                <td>Cargo *</td>
                <td>                 
                    <select name="cargo_emp" class="form-control">
                        @foreach($obj_cargo_emp as $obj_cargos_emp)
                        <option>{{$obj_cargos_emp->nombre_cargo}}</option>
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
          </td>
          <td>
              <button type="reset" class="btn btn-primary">Regresar</button> 
          </td>
        </tr>        
        </table> 
        <p>* Campo requerido</p>
    </div>
    {!! Form::close() !!}        
        </div>
</div>
@stop   
