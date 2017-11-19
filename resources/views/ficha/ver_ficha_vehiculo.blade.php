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
@if($obj_documento!=[])
  <div class="thumbnail">
  @foreach($obj_documento as $obj_documentos)
  <img src="../{{$obj_documentos->url_doc_img}}/{{$obj_documentos->nombre_archivo}}" alt="{{$obj_documentos->nombre_archivo}}">  
  <a target="_blank" href="../{{$obj_documentos->url_doc_img}}/{{$obj_documentos->nombre_archivo}}">Ver imagen completa</a>
  @endforeach
  </div>
  @else
  @endif
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla ver ficha vehiculo</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'ficha/reporte_ficha_vehiculo', 'class' => 'form','enctype'=>'multipart/form-data']) !!}
<table class="table table-condensed">    
            <tbody>
                 <tr>
                    <td>
                      Id  
                    </td>
                    <td>
                       {!!Form::text('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo,['class'=>'form-control','readonly'=>'readonly'])!!} 
                    </td>
                    
                </tr>
                <tr>
                  <td>
                      Código de inventario  
                    </td>
                    <td>
                       {!!Form::text('codigo_inventario',$codigo_inventario[0]->codigo_inventario,['class'=>'form-control','readonly'=>'readonly'])!!} 
                    </td>  
                </tr>
              <tr>
                <td>Unidad o departamento*</td>
                <td>  
                   {!!Form::text('nombre_unidad',$nombre_unidad->nombre_unidad_dep,['class'=>'form-control','readonly'=>'readonly'])!!}  
                </td>
                <td>Nombre del responsable*</td>
                <td>
                   <input type="text" name="responsable_bien" value="{{$obj_ficha->responsable_bien}}" id="resultado_unidad" class="form-control" readonly="readonly"/>
                </td>
              </tr>
             
             <tr>
               <td>Cuenta contable*</td>
                <td> 
                    <select name="id_cuenta_contable" class="form-control" onchange="myFunction(this.value)" readonly="readonly">
                        @foreach($cuenta_contable as $cuentas_contable)
                        @if($obj_ficha->id_cuenta_contable==$cuentas_contable->id_cuenta_contable)
                        <option selected="true" value="{{$cuentas_contable->id_cuenta_contable}}">{{$cuentas_contable->cta_contable_activo_fijo}}</option>
                        @else
                         <option value="{{$cuentas_contable->id_cuenta_contable}}">{{$cuentas_contable->cta_contable_activo_fijo}}</option>
                        @endif
                        @endforeach 
                     </select>                  
                </td>
                <td>Cuenta de depreciación*</td>
                <td>                    
                   {!! Form::text('cta_contable_depreciacion',$cuenta_asignada->cta_contable_depreciacion, ['class' => 'form-control' , 'id'=>'resultado','readonly'=>'readonly']) !!}
                </td>  
              </tr>
               <tr>                  
              <td>Descripción *</td>
                <td>                 
                    <input type="text" name="descripcion" value="{{$obj_ficha->descripcion}}" class="form-control" readonly="readonly"/>
                </td> 
                 <td>Estado *</td>
                <td>
                   {!! Form::select('id_estado',$estado_af,$obj_ficha->id_estado, ['class' => 'form-control' , 'readonly'=>'readonly']) !!}
                </td> 
              </tr>
              <tr>
                 <td>Marca</td>
                <td> 
                    <input type="text" name="marca_bien" value="{{$obj_ficha->marca_bien}}" class="form-control" readonly="readonly" />                   
                </td>
                <td>Modelo</td>
                <td>
                  <input type="text" name="modelo_bien" value="{{$obj_ficha->modelo_bien}}" class="form-control" readonly="readonly" />                   
                </td>  
              </tr>
               <tr>
                <td>No de placa</td>
                <td>
                    <input type="text" name="placa_bien" value="{{$obj_ficha->placa_bien}}" class="form-control" readonly="readonly" />
                </td> 
                 <td>Color</td>
                <td>                 
                   {!! Form::select('id_lista_color',$lista_color,$obj_ficha->id_lista_color, ['class' => 'form-control','readonly'=>'readonly']) !!}
                </td>
              </tr>
              <tr>
                <td>No chasis</td>
                <td> 
                    <input type="text" name="numero_vin_chasis" value="{{$obj_ficha->numero_vin_chasis}}" class="form-control" readonly="readonly" />
                  
                </td>
                <td>No motor</td>
                <td>
                    <input type="text" name="numero_motor" value="{{$obj_ficha->numero_motor}}" class="form-control" readonly="readonly" />
                   
                </td>  
              </tr>
              <tr>
                 <td>Año</td>
                <td> 
                    <input type="text" name="anio_bien" value="{{$obj_ficha->anio_bien}}" class="form-control" readonly="readonly" />
                </td>
                <td>No EQ</td>
                <td>
                  <input type="text" name="numero_equipo" value="{{$obj_ficha->numero_equipo}}" class="form-control" readonly="readonly" />
                  
                </td>  
              </tr>
              <tr>                
                  <td>Años vida util *</td>
                <td>                 
                   {!! Form::number('anios_vida_util',$obj_ficha->anios_vida_util, ['class' => 'form-control' , 'readonly'=>'readonly']) !!}
                </td>
                <td>Número de factura</td>
                <td>
                 <input type="text" name="numero_factura" value="{{$obj_ficha->numero_factura}}" class="form-control" readonly="readonly" />                    
                </td>
              </tr>
              <tr>
                <td>Monto de adquisición*</td>
                <td>   
                    {!! Form::number('monto_adquisicion',$obj_ficha->monto_adquisicion,['class' => 'form-control','readonly'=>'readonly']) !!}                   
                </td>
                <td>Fecha adquisición*</td>
                <td>
                   {!! Form::text('fecha_adquisicion',$fecha_adquisicion, ['class'=>'form-control datepicker', 'readonly'=>'readonly']) !!}
                </td> 
                
              </tr>
              <tr>
                  
                <td>Observación</td>
                <td>                 
                   <input type="text" name="observacion" value="{{$obj_ficha->observacion}}" class="form-control" readonly="readonly" />
                </td>                                   
              </tr>
                @if($obj_documento!=[])
                {!! Form::hidden('id_documento',$obj_documento[0]->id_documento_imagen, ['class' => 'form-control']) !!}
               @else
                {!! Form::hidden('id_documento',0, ['class' => 'form-control']) !!}
               @endif
            {!! Form::hidden('id_clase_bien',1, ['class' => 'form-control']) !!}
              <tr>
                  <td>
                    <button type="submit" class="btn btn-primary">Generar reporte</button> 
                    <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
                  </td>
               
              </tr>
            </tbody>            
          </table> 
     {!! Form::close() !!} 
</div>

@stop
