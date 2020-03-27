<!-- 
     * Nombre del archivo:editar_rol.blade.php
     *  Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_reportes_admin')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>editar_bitacora.blade.php</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla Editar Bitacora</h4>    
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>    
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a class="list-group-item active">Editar Bitacora</a>    
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">                    
        <div class="col-lg-6">
            {!! Form::open(['route' => 'administracion/editar_bitacora', 'class' => 'form']) !!}
                <table class="table table-condensed">
                    <tr>                       
                      <td>usuario * </td>
                      <td>

                          <select>

                            @foreach($obj_usuario as $obj_item)
                                <option value="{{ $obj_item->nombre_usuario }}"> {{ $obj_item->nombres_usuario }} {{ $obj_item->apellidos_usuarios }} </option>
                            @endforeach
</select>

                        
                        <p>{{ $obj_bitacora->id_bitacora }} {{ $obj_bitacora->ip_dispositivo }} {{ $obj_bitacora->usuario->nombres_usuario }} {{ $obj_bitacora->usuario->apellidos_usuarios }} "{{ $obj_bitacora->fecha_hora_transaccion }}" "{{ $obj_bitacora->transaccion_realizada }}"</p>
                        
                        
                      </td>
                    </tr>
                    <tr>
                        <td>fecha_hora_transaccion</td>
                      <td>
<input type="text" maxlength="25" class="form-control" name="fecha_hora_transaccion" id="result2" value="{{$obj_bitacora->fecha_hora_transaccion}}" placeholder="Nombre del rol">
                      </td>
                    </tr>
                    <tr>
                        <td>transaccion_realizada * </td>
                      <td>
<input type="text" maxlength="25" class="form-control" name="transaccion_realizada" id="result3" placeholder="Descripci&oacute;n" value="{{$obj_bitacora->transaccion_realizada}}" required>
                      </td>
                    </tr>
                    <tr>
                        <td>ip_dispositivo * </td>
                      <td>
                          <input type="text" maxlength="25" class="form-control" name="ip_dispositivo" id="result3" placeholder="Descripci&oacute;n" value="{{$obj_bitacora->ip_dispositivo}}" required>
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
                        <a href="{{route('administracion/consultar_bitacora')}}" class="btn btn-primary"> Regresar</a>
                    </td>
                </tr>
            </table>

            <p>* Campo requerido</p>
        </div>
    </div>
</div>
@stop   



