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
<h4 class="text-center">Editar usuario</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item active">Buscar usuarios</a>
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
                           
                    </select>
                </td>
              <td>Cargo *</td>
                 <td>                 
                    <select name="cargo_emp" class="form-control">
                                         
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
              {!! Form::submit('Guardar cambios',['class'=>'btn btn-primary'])!!}              
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
