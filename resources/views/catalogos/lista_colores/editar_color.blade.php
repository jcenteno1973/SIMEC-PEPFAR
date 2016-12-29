<!-- 
     * Nombre del archivo: nueva_cuenta.php
     * Descripcion: 
     * Fecha de creacion:13/12/2016
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
<h4 class="text-center">Editar color</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../../administracion/color " class="list-group-item">Buscar cuenta contable</a>
    <a href="../../../administracion/color/create" class="list-group-item active">Nueva cuenta contable</a>
    <a href="../../administracion/catalogos" class="list-group-item"> <span class="glyphicon glyphicon-chevron-left"></span> Regresar a Catalogos</a> 
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
    {!! Form::open(['route' => ['administracion.color.update',$color],'method'=>'PUT']) !!}
    <table class="table table-bordered">    
        <tbody>
           <tr>
               <td>C&oacute;digo de color*</td>
            <td>
                {!! Form::text('id_lista_color', $color->id_lista_color, ['class' => 'form-control' , 'placeholder'=>'codigo color', 'required' => 'required', 'readonly'=>'true']) !!}
            </td>
            <td>Nombre del color*</td>
            <td>
                {!! Form::text('desc_color',$color->desc_color, ['class' => 'form-control' , 'required' => 'required']) !!}
             </td>
            </tr>
            <tr>
                <td>Estado*</td>                 
                <td>
                    @if($color->estado_registro==1)
                        <select name="estado_registro" class="form-control">
                            <option value="1" >Activo </option>
                            <option value="0">Inactivo </option>
                        </select>
                    @else
                        <select name="estado_registro" class="form-control">
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                         </select> 
                      @endif
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
              @include('catalogos/ayuda_catalogos/ayuda_color/ayuda_edit_color')  
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
