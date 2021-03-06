<!-- 
     * Nombre del archivo:reporte_archivo_datos.blade.php
     * Descripción:Formulario para generar el reporte de bitacora
     * Fecha de creación:26/12/2017
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
<p ALIGN=center>reporte_archivo_datos.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla consultar archivo datos</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>   
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/reporte_usuario" class="list-group-item">Reporte de usuarios</a>   
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item ">Consultar bit&aacute;cora</a>
    <a class="list-group-item active">Consultar archivos</a>
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/consultar_archivo_datos']) !!}
    <div class="panel-body">
      <table class="table table-condensed">    
            <tbody>
                <tr>
                    <td>
                       Desde * 
                    </td>
                     <td>
                       {!!Form::text('fecha_inicio',null,['class'=>'form-control datepicker', 'placeholder'=>'dd/mm/aaaa', 'required' => 'required'])!!} 
                    </td>
                    <td>
                       Hasta * 
                    </td>
                     <td>
                      {!!Form::text('fecha_fin',null,['class'=>'form-control datepicker', 'placeholder'=>'dd/mm/aaaa', 'required' => 'required'])!!}  
                    </td>
                </tr>
     </table> 
    </div>
    <div>
        {!! Form::submit('Generar reporte',['class'=>'btn btn-primary'])!!}
        <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>
          @include('ayuda/ayuda_reporte_archivo_datos')   
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
