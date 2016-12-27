<!-- 
     * Nombre del archivo:nueva_ficha_inmueble.blade.php
     * Descripción: 
     * Fecha de creación:24/12/16
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 

@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Buscar ficha</a>
    <a class="list-group-item active">Nueva ficha inmueble</a>
    <a href="#" class="list-group-item">Nueva ficha mueble</a>
    <a href="#" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla nueva ficha inmueble</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
    <table class="table table-condensed">    
            <tbody>
              <tr>
                <td>Departamento*</td>
                <td>                 
                      {!! Form::select('departamento',$departamentos,6,['id'=>'departamento','class' => 'form-control']) !!}
                </td>
                <td>Municipio*</td>
                <td>                    
                   {!! Form::select('municipio',$municipios,104,['id'=>'municipio','class' => 'form-control']) !!}
                </td>
              </tr>
              <tr>
                <td>Unidad o departamento*</td>
                <td>                     
                      {!! Form::select('id_ubicacion_org',$ubicacion_org,null,['id'=>'id_ubicacion_org','class' => 'form-control']) !!}
                </td>
                <td>Clase del bien*</td>
                <td>                 
                      {!! Form::select('id_clase_bien',$clase_bien,1, ['class' => 'form-control' , 'readonly'=>'readonly','id'=>'id_clase_bien']) !!}                   
                </td>
              </tr>
              <tr>
                <td>Fuente financiamiento*</td>
                <td>
                      {!! Form::select('id_fuente_financiamiento',$fuente_financiamiento, null, ['class' => 'form-control' ,'id'=>'id_fuente_financiamiento']) !!}                   
                </td>
                <td> Tipo bienes*</td>
                <td>                    
                     {!! Form::select('id_tipo_bien_mueble',$tipo_bien, null, ['class' => 'form-control','id'=>'id_tipo_bien_mueble']) !!}                               
                </td>
              </tr>
              <tr>
                <td>Cuenta contable*</td>
                <td> 
                    <select name="id_cuenta_contable" class="form-control" onchange="myFunction(this.value)">
                        <option></option>
                        @foreach($cuenta_contable as $cuentas_contable)
                        <option value="{{$cuentas_contable->id_cuenta_contable}}">{{$cuentas_contable->cta_contable_activo_fijo}}</option>
                        @endforeach 
                     </select>
                  
                </td>
                <td>Cuenta de depreciación*</td>
                <td>                    
                   {!! Form::text('cta_contable_depreciacion', null, ['class' => 'form-control' , 'id'=>'resultado','readonly'=>'readonly']) !!}
                </td>    
              </tr>
               <tr>
                   <td>Estado *</td>
                <td>
                   {!! Form::select('id_estado_af',$estado_af, null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td> 
              <td>Descripción *</td>
                <td>                 
                   {!! Form::text('descripcion', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>                               
              </tr>
              <tr>
                 <td>Marca</td>
                <td>                 
                   {!! Form::text('marca_bien', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Modelo</td>
                <td>
                   {!! Form::text('modelo_bien ', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>  
              </tr>
              <tr>
                 <td>Color</td>
                <td>                 
                   {!! Form::select('id_lista_color',$lista_color, null, ['class' => 'form-control']) !!}
                </td>
                <td>Serie</td>
                <td>
                   {!! Form::text('numero_serie', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>    
              </tr>
              <tr>
                <td>Número de factura</td>
                <td>                 
                   {!! Form::text('numero_factura', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Nombre del responsable*</td>
                <td>
                   {!! Form::text('nombre_responsable', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>   
              </tr>
              <tr>
                <td>Monto de adquisición*</td>
                <td>   
                    {!! Form::number('monto_adquisicion',null,['class' => 'form-control','step'=>'0.01', 'required' => 'required']) !!}                   
                </td>
                <td>Fecha adquisición*</td>
                <td>
                   {!! Form::text('fecha_adquisicion', null, ['class'=>'form-control datepicker', 'placeholder'=>'dd/mm/aaaa', 'required' => 'required']) !!}
                </td> 
                
              </tr>
              <tr>
                  <td>Imagen</td>
                  <td>
                      <input type="file" class="form-control" name="file" >
                  </td>  
               <td>Años vida util *</td>
                <td>                 
                   {!! Form::number('anios_vida_util', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                                 
              </tr>
              <tr>
                <td>Observación</td>
                <td>                 
                   {!! Form::text('observacion', null, ['class' => 'form-control' ]) !!}
                </td>  
              </tr>
            </tbody>
          </table>       
</div>
<script>
function myFunction(id_cuenta_contable) { 
    document.getElementById("resultado").value="";
    <?php foreach($cuenta_contable as $cuentas_contable){ ?>
    if(id_cuenta_contable=={{ $cuentas_contable->id_cuenta_contable }})
    {
    document.getElementById("resultado").value= {{ $cuentas_contable->cta_contable_depreciacion }}; 
    }
    <?php } ?>   
}   
</script>
<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
@stop   