{{-- 
     * Nombre del archivo: nueva_ubicacion_org.blade.php
     * Descripción: Crear nueva ubicacion organizacional
     * Fecha de creación:5/12/2016
     * Creado por: Karla Barrera 

     * Modificacion: Funcionalidad para crear usuario
     * Fecha de creación:19/12/16
     * Creado por: Yamileth Campos
--}}

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla nueva ubicaci&oacute;n organizacional</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../administracion/buscar_ubicacion" class="list-group-item">Buscar ubicaci&oacute;n organizacional</a>
    <a href="#" class="list-group-item active">Nueva ubicaci&oacute;n organizacional</a>
    <a href="../../administracion/catalogos" class="list-group-item"> <span class="glyphicon glyphicon-chevron-left"></span> Regresar a Cat&aacute;logos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
    {!! Form::open(['route' => 'administracion.buscar_ubicacion.store','method'=>'POST']) !!}
    <table class="table table-bordered">    
        <tbody>
           <tr>
            <td>C&oacute;digo *</td>
            <td>
                {!! Form::text('codigo_unidad_dep', null, ['class' => 'form-control' , 'placeholder'=>'C&oacute;digo de la Unidad y Depto.', 'required' => 'required']) !!}
            </td>
            <td>Unidad o Departamento *</td>
            <td>
                {!! Form::text('nombre_unidad_dep',null, ['class' => 'form-control' , 'placeholder'=>'Nombre de la Unidad y Depto.', 'required' => 'required']) !!}
             </td>
            </tr>
            <tr>
                <td>Responsable *</td>
                <td>  
                    {!! Form::text('nombre_responsable',null, ['class' => 'form-control', 'placeholder'=>'Responsable', 'required' => 'required']) !!}
                </td>
                <td>Alquilado *</td>                 
                <td>
                        <select name="alquilado" class="form-control">
                            <option value="0">No </option>
                            <option value="1" >Si </option>
                        </select>                    
                </td>                
            </tr>
            <tr>
                <td>Dentro del inmueble *</td>                 
                <td>
                        <select name="dentro_inmueble" class="form-control">
                            <option value="1" >Si </option>
                            <option value="0">No </option>                            
                        </select>                    
                </td>                 
                <td>Estado *</td> 
                <td>
                        <select name="estado_registro" class="form-control">
                            <option value="1">Activo </option>
                            <option value="0">Inactivo</option>
                        </select>                    
                </td>
            </tr>            
        </tbody>
     </table>  
       <!-- Botones"--> 
    <div><br />
       <table class="table">
        <tr>
          <td>
              {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}              
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
              @include('catalogos/ayuda_catalogos/ayuda_ubicacion/ayuda_nueva_ubicacion') 
       </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
        
    
    </div>
 {!! Form::close()!!} 
   * Campo requerido
    </div>
</div>
@stop   
