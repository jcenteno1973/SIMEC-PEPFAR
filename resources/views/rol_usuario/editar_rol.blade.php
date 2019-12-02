<!-- 
     * Nombre del archivo:editar_rol.blade.php
     *  Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>editar_rol.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Editar rol</h4>    
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>    
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a class="list-group-item active">Editar rol</a>    
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">                    
        <div class="col-lg-6">
            {!! Form::open(['route' => 'administracion/editar_rol', 'class' => 'form']) !!}
                <table class="table table-condensed">
                    <tr>                       
                      <td>Rol* </td>
                      <td>
                        <select name="rol_usuario" class="form-control" onchange="myFunction(this.value)">
                        <option></option>
                        @foreach($obj_role as $obj_roles)
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endforeach 
                        </select>
                      </td>
                    </tr>
                     <tr>
                        <td>Nombre del rol </td>
                      <td>
                          <input type="text" maxlength="25" class="form-control" name="nombre_rol" id="result2" placeholder="Nombre del rol">
                      </td>
                    </tr>
                    <tr>
                        <td>Descripci&oacute;n* </td>
                      <td>
                          <input type="text" maxlength="25" class="form-control" name="descripcion" id="result3" placeholder="Descripci&oacute;n" required>
                      </td>
                    </tr>                    
                </table>
       
                <table class="table table-responsive">
                    <tr>               
                          <td align="left">
                          <button type="submit" class="btn btn-primary">Guardar</button> 
                          {!! Form::close() !!}
                          </td>
                          <td>
                             {!! Form::open(['route' => 'administracion/asignar_permiso', 'class' => 'form','method' => 'get']) !!}     
                             <input type="hidden" name="nombre_rol" id="result" >  
                             {!! Form::submit('Asignar permisos', array('class'=> 'btn btn-primary'))!!}
                             {!! Form::close()!!} 
                          </td>
                          <td>
                            <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>    
                          </td>
                          <td>
                             @include('ayuda/ayuda_editar_rol') 
                          </td>
                    </tr>
                </table>
                <p>*Campo requerido</p>              
        </div>
    </div>
</div>
<script>
function myFunction(rol_usuario) {
    document.getElementById("result").value = rol_usuario;
    document.getElementById("result2").value = rol_usuario;
}   
</script>
@stop   



