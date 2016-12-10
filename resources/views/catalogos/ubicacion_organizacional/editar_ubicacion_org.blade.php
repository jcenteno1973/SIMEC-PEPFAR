<!-- 
     * Nombre del archivo: editar_ubicacion_org.blade.php
     * Descripción: Editar ubicación organizacional
     * Fecha de creación:6/12/2016
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
<h4 class="text-center">Editar ubicación organizacional</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ubicaci&oacute;n organizacional</a>
    <a href="../administracion/nueva_ubicacion" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
      


<table class="table table-bordered">    
        <tbody>
           <tr>
            <td>C&oacute;digo de Unidad/Departamento *</td>
            <td>
                {!! Form::text('codigo_unidad_dep', null, ['class' => 'form-control' , 'placeholder'=>'C&oacute;digo de Unidad/Departamento', 'required' => 'required']) !!}
            </td>
            <td>Unidad o Departamento *</td>
            <td>
                <select name="id_ubicacion_org" class="form-control" placeholder="Unidad o Departamento">
                        <option disabled selected>Unidad o Departamento</option>
                </select>
             </td>
            </tr>
            <tr>
            <td>Responsable *</td>
            <td>  
                {!! Form::text('nombre_responsable', null, ['class' => 'form-control', 'placeholder'=>'Responsable', 'required' => 'required']) !!}
            </td>
            <td>Alquilado *</td>
            <td>                 
                                        
                
                  <div class="checkbox">
                    <label>
                    <input type="checkbox" name="alquilado" id="alquilado" value="1" checked>                     
                     
                    </label>
                  </div>
                </td>
            </tr>
            <tr>
            
        </tbody>
     </table>  


       <!-- Botones"--> 
    <div><br />
       <table class="table">
        <tr>
          <td>
              {!! Form::submit('Guardar cambios',['class'=>'btn btn-primary'])!!}              
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
              @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  
       </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
    </div>
<!--    {!! Form::close()!!}      -->

      
    <!--
    </div>
    {!! Form::close() !!}      -->  
    </div>
</div>
@stop   


