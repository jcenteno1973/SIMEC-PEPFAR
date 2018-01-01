<!-- 
     * Nombre del archivo:get_parametros.blade.php
     * Descripción:Formulario para generar el reporte de bitacora
     * Fecha de creación:21/12/2016
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
<p ALIGN=center>get_parametros.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla consultar bitácora</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>   
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a class="list-group-item active">Consultar bit&aacute;cora</a>
    <a href="../administracion/consultar_archivo_datos" class="list-group-item">Consultar documentos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/consultar_bitacora']) !!}
    <div class="panel-body">
      <table class="table table-condensed">    
            <tbody>
                <tr>
                    <td>
                      Código de usuario  
                    </td>
                    <td>
                      {!!Form::text('nombre_usuario',null,['class'=>'form-control', 'placeholder'=>'Código de usuario'])!!}   
                    </td>
                </tr>
                <tr>
                    <td>
                       Desde 
                    </td>
                     <td>
                       {!!Form::text('fecha_inicio',null,['class'=>'form-control datepicker', 'placeholder'=>'Fecha inicio dd/mm/aaaa', 'required' => 'required'])!!} 
                    </td>
                    <td>
                       Hasta  
                    </td>
                     <td>
                      {!!Form::text('fecha_fin',null,['class'=>'form-control datepicker', 'placeholder'=>'Fecha fin dd/mm/aaaa', 'required' => 'required'])!!}  
                    </td>
                </tr>
     </table> 
    </div>
    <div>
        {!! Form::submit('Generar reporte',['class'=>'btn btn-primary'])!!}
        <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')   
    </div>
   {!! Form::close() !!}
   <div class="panel-footer">
         * Campo requerido
    </div>
</div>
<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
@stop
