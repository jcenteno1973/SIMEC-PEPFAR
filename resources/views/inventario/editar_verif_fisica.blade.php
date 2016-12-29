{{-- 
     * Nombre del archivo: editar_verif_fisica.blade.php
     * Descripción: Pantalla para editar verificacion física
     * Fecha de creación: 28/12/2016
     * Creado por: Karla Barrera
--}}

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Editar verificaci&oacute;n f&iacute;sica</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../../administracion/verificacion_fisica" class="list-group-item">Buscar verificaci&oacute;n f&iacute;sica</a>
    <a href="../../../administracion/verificacion_fisica/create" class="list-group-item">Nueva verificaci&oacute;n f&iacute;sica</a>
    <a href="#" class="list-group-item">Buscar ficha de descargo</a>
    <a href="#" class="list-group-item">Ejecutar destino</a>
    <a href="#" class="list-group-item">Revertir destino</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">      

{!! Form::open(['route' => ['administracion.verificacion_fisica.update',$verificacion_fisica],'method'=>'PUT']) !!}
    <table class="table table-condensed">    
        <tbody>
           <tr> 
              <td>Id</td>
              <td>
                {!! Form::text('id_verificacion_fisica', $verificacion_fisica->id_verificacion_fisica, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!}
              </td>
              <td>Fecha a realizarse *<br />verificaci&oacute;n f&iacute;sica </td>
                <td>       
                 {!! Form::text('fecha_verificacion_fisica', null, ['class' => 'form-control', 'placeholder'=>'fecha de verificaci&oacute;n f&iacute;sica']) !!}   
                </td> 
                <td>Nombre encargado de<br />realizar la verificaci&oacute;n *</td>
                <td align="left">           
                    {!!Form::text('nombre_verificador',null,['class'=>'form-control', 'required' => 'required', 'placeholder'=>'nombre de verificador'])!!} 
                </td>               
              </tr>             
        </tbody>
     </table>  
     <p>* Campo requerido</p>
       <!-- Botones"--> 


       
    <div><br />
       <table class="table">
        <tr>
          <td>
              {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}              
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
    {{--          @include('../usuario_app/ayuda_usuario/ayuda_edit_usuario')   --}}
       </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
        
    
    </div>
 {!! Form::close()!!} 

      
    <!--
    </div>
    {!! Form::close() !!}      -->  
    </div>
</div>
@stop  