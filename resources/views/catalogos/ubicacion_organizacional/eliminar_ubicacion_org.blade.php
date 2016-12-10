<!-- 
     * Nombre del archivo: eliminar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 8/12/2016
     * Creado por: Karla Barrera
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Borrar ubicación organizacional</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ubicaci&oacute;n organizacional</a>
    <a href="../administracion/nueva_ubicacion" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <!-- filtro busqueda de ubicacion, los "&nbsp; son espacios"-->     


    <table class="table">   
    <thead>
      <tr>
        <th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>C&oacute;digo de Unidad/Departamento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Unidad/Departamento&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Responsable&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Alquilado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Estado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Seleccionar</th>        
      </tr>
    </thead>



  </table>
   
<!--  {!! Form::close() !!}  -->

<!-- Botones"--> 
    <div><br /><br />
       <table class="table">
        <tr>
          <td>
              <button type="reset" class="btn btn-primary">Borrar</button>     
              <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
             @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  

          </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
    </div>
</div>
@stop   
