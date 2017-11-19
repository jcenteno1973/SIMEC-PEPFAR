{{-- 
     * Nombre del archivo: editar_ubicacion_org.blade.php
     * Descripción: Editar ubicación organizacional
     * Fecha de creación:6/12/2016
     * Creado por: Karla Barrera

     * Modificacion: funcionalidad a editar
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
<h4 class="text-center">Editar ubicación organizacional</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="{{route('administracion.buscar_ubicacion.index')}}" class="list-group-item">Buscar ubicaci&oacute;n organizacional</a>
    <a href="{{route('administracion.buscar_ubicacion.create')}}" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a>
    <a href="{{route('administracion/catalogos')}}" class="list-group-item"><span class="glyphicon glyphicon-chevron-left"></span> Regresar a Cat&aacute;logos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
 <div class="panel-body">
      

{!! Form::open(['route' => ['administracion.buscar_ubicacion.update',$ubicacion],'method'=>'PUT']) !!}
    <table class="table table-bordered">    
        <tbody>
            <tr>
                <td>ID </td>
                <td>
                {!! Form::text('id_ubicacion_org', $ubicacion->id_ubicacion_org, ['class' => 'form-control' , 'required' => 'required', 'readonly'=>'true']) !!}                    
                </td>
                <td>C&oacute;digo *</td>
                <td>
                    {!! Form::text('codigo_unidad_dep',$ubicacion->codigo_unidad_dep, ['class' => 'form-control' , 'placeholder'=>'C&oacute;digo de la Unidad y Depto.', 'required' => 'required','readonly'=>'true']) !!}
                </td>
            </tr>
           <tr>
                <td>Unidad o Departamento *</td>
                <td>{!! Form::text('nombre_unidad_dep',$ubicacion->nombre_unidad_dep, ['class' => 'form-control' , 'placeholder'=>'Nombre de la Unidad y Depto.', 'required' => 'required']) !!}</td>
                <td>Responsable *</td>
                <td>{!! Form::text('nombre_responsable',$ubicacion->nombre_responsable, ['class' => 'form-control', 'placeholder'=>'Responsable', 'required' => 'required']) !!}</td>             
            </tr>
            <tr>                
                <td>Alquilado *</td>                 
                <td>
                    @if($ubicacion->alquilado==1)
                        <select name="alquilado" class="form-control">
                            <option value="1" >Si </option>
                            <option value="0">No </option>
                        </select>                    
                      @else
                        <select name="alquilado" class="form-control">
                            <option value="0">No </option>
                            <option value="1">Si </option>
                         </select> 
                      @endif                    
                </td>
                <td>Dentro del inmueble *</td>                 
                <td>
                    @if($ubicacion->dentro_inmueble==1)
                        <select name="dentro_inmueble" class="form-control">
                            <option value="1" >Si </option>
                            <option value="0">No </option>
                        </select>                    
                      @else
                        <select name="dentro_inmueble" class="form-control">
                            <option value="0">No </option>
                            <option value="1">Si </option>
                         </select> 
                      @endif
                </td>
            </tr>
            <tr>                                 
                <td>Estado *</td> 
                <td>
                      @if($ubicacion->estado_registro==1)
                        <select name="estado_registro" class="form-control">
                            <option value="1" >Activo</option>
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
            @include('catalogos/ayuda_catalogos/ayuda_ubicacion/ayuda_edit_ubicacion')
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


