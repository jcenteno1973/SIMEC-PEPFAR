<!-- 
     * Nombre del archivo: buscar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 4/12/2016
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
  <h4 class="text-center">Buscar ubicacion organizacional</h4>
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

    
                <div class="form-group" >
                  <table class="table"> 
                    <tr border="0">
                      <td>C&oacute;digo de Unidad/Departamento&nbsp;</td> 
                      <td>  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'C&oacute;digo de Unidad/Departamento'])!!}</td> 
                        &nbsp;<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unidad/Departamento&nbsp;</td>
                      <td>
                        <select name="id_ubicacion_org" class="form-control" placeholder="Unidad o Departamento">
                          <option disabled selected>Unidad o Departamento</option>
                        </select>
                      </td> 
         <!--       </div>   -->
                    </tr>
                    <tr>
                        &nbsp;<td>Responsable&nbsp;</td>
                      <td>   {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Responsable'])!!}</td> 
                
                        &nbsp;<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default"> Buscar</button></td>
                    </tr>
                  </table>
                </div>
                    
                  
<!--   {!! Form::close() !!}  -->
    <!-- fin filtro busqueda ubicacion organizacional -->
     


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
              <a href="../administracion/editar_ubicacion" class="btn btn- btn-primary">Editar</a>
              <button type="reset" class="btn btn-primary">Borrar</button>             
              <button type="reset" class="btn btn-primary">Regresar</button>
             @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  

          </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
    </div>
</div>
@stop   
