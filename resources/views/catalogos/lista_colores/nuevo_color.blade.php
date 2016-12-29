<!-- 
     * Nombre del archivo: nueva_color.php
     * Descripcion: 
     * Fecha de creacion:25/12/2016
     * Creado por: Yamileth Campos
-->

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Nueva nuevo color</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../administracion/color " class="list-group-item">Buscar color</a>
    <a href="#" class="list-group-item active">Nueva color</a>
    <a href="../../administracion/catalogos" class="list-group-item"> <span class="glyphicon glyphicon-chevron-left"></span> Regresar a Catalogos</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
   <div class="panel-body">
    <div class="col-sm-6">
    {!! Form::open(['route' => 'administracion.color.store','method'=>'POST']) !!}
    <table class="table table-condensed">    
        <tbody>
           <tr>
               <td>Nombre Color*</td>
            <td>
                {!! Form::text('desc_color', null,['class' => 'form-control' , 'placeholder'=>'nombre del color', 'required' => 'required']) !!}
            </td>
            </tr>
            <tr>
                <td>Estado*</td>                 
                <td>
                        <select name="estado_registro" class="form-control">
                            <option value="1" >Activo </option>
                            <option value="0">Inactivo </option>
                        </select>                    
                </td>                
            </tr>           
        </tbody>
     </table>
    </div>
    <!-- Botones"-->       
    <div><br />
       <table class="table">
        <tr>
          <td>
              {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}              
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
              @include('catalogos/ayuda_catalogos/ayuda_color/ayuda_nuevo_color')  
       </td>
        </tr>               
      </table>         
    </div>
    <!-- Fin botones-->
 {!! Form::close()!!} 
   
    </div>
</div>
@stop   
