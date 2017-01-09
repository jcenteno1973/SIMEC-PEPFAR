<!-- 
     * Nombre del archivo:editar_ficha_inmueble.blade.php
     * Descripción: 
     * Fecha de creación:02/01/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
   <a href="../ficha/buscar_ficha" class="list-group-item">Buscar ficha</a>
   <a href="../ficha/nueva_ficha_inmueble" class="list-group-item">Nueva ficha inmueble</a>
   <a href="../ficha/nueva_ficha_mueble" class="list-group-item">Nueva ficha mueble</a>
    <a href="../ficha/nueva_ficha_vehiculo" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla editar ficha inmueble</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'ficha/reporte_ficha_inmueble', 'class' => 'form']) !!}
    <table class="table table-condensed">    
            <tbody> 
                <tr>
                    <td>
                      Id  
                    </td>
                    <td>
                       {!!Form::text('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo,['class'=>'form-control', 'placeholder'=>'Código de inventario','readonly'=>'readonly'])!!} 
                    </td>
                    
                </tr>
                <tr>
                  <td>
                      Código de inventario  
                    </td>
                    <td>
                       {!!Form::text('codigo_inventario',$codigo_inventario[0]->codigo_inventario,['class'=>'form-control', 'readonly'=>'readonly'])!!} 
                    </td>  
                </tr>
                 <tr>
               <td>Cuenta contable*</td>
                <td> 
                    @foreach($cuenta_contable as $cuentas_contable)
                    @if($obj_ficha->id_cuenta_contable==$cuentas_contable->id_cuenta_contable)
                    <input type="text" name="cuenta_contable" value="{{$cuentas_contable->cta_contable_activo_fijo}}" class="form-control" readonly="readonly">
                    @endif
                    @endforeach 
                </td>
                <td>Cuenta de depreciación*</td>
                <td>                    
                   {!! Form::text('cta_contable_depreciacion',$cuenta_asignada->cta_contable_depreciacion, ['class' => 'form-control' , 'id'=>'resultado','readonly'=>'readonly']) !!}
                </td>  
              </tr>
              <tr> 
                 <td>Descripción*</td>
                <td> 
                    <input type="text" name="descripcion" value="{{$obj_ficha->descripcion}}" class="form-control" readonly="readonly" />
                </td> 
                <td>Nombre del responsable*</td>
                <td>
                <input type="text" name="responsable_bien" value="{{$obj_ficha->responsable_bien}}" class="form-control" readonly="readonly"/>
                </td>
              </tr>
              
              <tr>
                 <td>Tipo de documento</td>
                <td>   
                   <input type="text" name="nombre_tipo_documento" value="{{$nombre_tipo_doc}}" class="form-control" readonly="readonly">
                </td>
                <td>No de registro de raiz e hipoteca</td>
                <td>
                   <input type="text" name="numero_registro_propiedad" value="{{$obj_ficha->numero_registro_propiedad}}" class="form-control" readonly="readonly" />
                </td>  
              </tr>              
              <tr>                
                  <td>Años vida util</td>
                <td>                 
                   {!! Form::number('anios_vida_util',$obj_ficha->anios_vida_util, ['class' => 'form-control','readonly'=>'readonly']) !!}
                </td>
                <td>Estado de legalidad*</td>
                <td>                   
                       @if($obj_ficha->inscrita_registro==1)
                       <input type="text" value="Inscrito" class="form-control" readonly="readonly">
                       @else
                       <input type="text" value="No inscrito" class="form-control" readonly="readonly">
                       @endif
                </td>
              </tr>
              <tr>
                <td>Monto de adquisición*</td>
                <td>   
                    {!! Form::number('monto_adquisicion',$obj_ficha->monto_adquisicion,['class' => 'form-control','step'=>'0.01','readonly'=>'readonly']) !!}                   
                </td>
                <td>Fecha adquisición*</td>
                <td>
                   {!! Form::text('fecha_adquisicion',$fecha_adquisicion, ['class'=>'form-control datepicker', 'readonly'=>'readonly']) !!}
                </td>                 
              </tr>
              <tr>
              <td>Observación</td>
                <td>                 
                <input type="text" name="observacion" class="form-control" readonly="readonly"/>
                </td>                                   
              </tr>
              <tr>
              @if($obj_documento!=[])
              <td>
                 Documento almacenado 
              </td>
              @foreach($obj_documento as $obj_documentos)
                <td>   
                <a target="_blank" href="../{{$obj_documentos->url_doc_img}}/{{$obj_documentos->nombre_archivo}}">{{$obj_documentos->nombre_archivo}}</a>
                </td>
              @endforeach              
              @endif
              </tr>
            {!! Form::hidden('id_clase_bien',2, ['class' => 'form-control']) !!}
              <tr>
                  <td>
                    <button type="submit" class="btn btn-primary">Generar reporte</button> 
                     <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
                  </td>
              </tr>
            </tbody>            
          </table>  
    
    {!! Form::close() !!} 
</div>
@stop 
