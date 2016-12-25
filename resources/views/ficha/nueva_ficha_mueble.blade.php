<!-- 
     * Nombre del archivo:nueva_ficha_muebles.blade.php
     * Descripción: 
     * Fecha de creación:24/12/16
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
  <h4 class="text-center">Pantalla nueva ficha mueble</h4>    
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Buscar ficha</a>
    <a href="#" class="list-group-item">Nueva ficha inmueble</a>
    <a class="list-group-item active">Nueva ficha mueble</a>
    <a href="#" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    <table class="table table-condensed">    
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
</div>
@stop   
