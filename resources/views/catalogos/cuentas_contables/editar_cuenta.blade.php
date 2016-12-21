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
<h4 class="text-center">Nueva cuenta contable</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../../../administracion/contable " class="list-group-item">Buscar cuenta contable</a>
    <a href="#" class="list-group-item active">Nueva cuenta contable</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-body">
    {!! Form::open(['route' => ['administracion.contable.update',$cuenta],'method'=>'PUT']) !!}
    <table class="table table-bordered">    
        <tbody>
           <tr>
               <td>C&oacute;digo de cuenta*</td>
            <td>
                {!! Form::text('cta_contable_activo_fijo', $cuenta->cta_contable_activo_fijo, ['class' => 'form-control' , 'placeholder'=>'C&oacute;digo cuenta contable', 'required' => 'required']) !!}
            </td>
            <td>Nombre Cuenta*</td>
            <td>
                {!! Form::text('cta_contable_depreciacion',$cuenta->cta_contable_depreciacion, ['class' => 'form-control' , 'required' => 'required']) !!}
             </td>
            </tr>
            <tr>
                <td>Estado*</td>                 
                <td>
                    @if($cuenta->estado_registro==1)
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
              @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  
       </td>
        </tr>        
        
    <!-- Fin botones-->
      </table> 
        
    
    </div>
 {!! Form::close()!!} 
   
    </div>
</div>
@stop   
