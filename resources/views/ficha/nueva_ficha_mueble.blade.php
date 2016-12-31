<!-- 
     * Nombre del archivo:nueva_ficha_muebles.blade.php
     * Descripción: 
     * Fecha de creación:24/12/16
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla nueva ficha mueble</h4>    
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item">Buscar ficha</a>
    <a href="#" class="list-group-item">Nueva ficha inmueble</a>
    <a class="list-group-item active">Nueva ficha mueble</a>
    <a href="#" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop

@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'ficha/nueva_ficha_mueble', 'class' => 'form','enctype'=>'multipart/form-data']) !!}
    <table class="table table-condensed">    
            <tbody>
              <tr>
                <td>Departamento*</td>
                <td>                 
                   {!! Form::select('departamento',$departamentos,6,['id'=>'departamento','class' => 'form-control','required' => 'required']) !!}
                </td>
                <td>Municipio*</td>
                <td>                    
                   {!! Form::select('municipio',$municipios,104,['id'=>'municipio','class' => 'form-control','required' => 'required']) !!}
                </td>
              </tr>
              <tr>
                <td>Unidad o departamento*</td>
                <td>  
                    <select name="id_ubicacion_org" class="form-control" onchange="fnc_unidad(this.value)">
                        <option></option>
                        @foreach($obj_unidad as $obj_unidades)
                        <option value="{{$obj_unidades->id_ubicacion_org}}">{{$obj_unidades->nombre_unidad_dep}}</option>
                        @endforeach 
                    </select> 
                </td>
                <td>Nombre del responsable*</td>
                <td>
                   <input type="text" name="responsable_bien" id="resultado_unidad" class="form-control" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" required/>
                </td>
              </tr>
              <tr>
                <td>Fuente financiamiento*</td>
                <td>
                      {!! Form::select('id_fuente_financiamiento',$fuente_financiamiento,1, ['class' => 'form-control' ,'id'=>'id_fuente_financiamiento']) !!}                   
                </td>
                <td> Tipo bienes*</td>
                <td>                    
                     {!! Form::select('id_tipo_bien_mueble',$tipo_bien, null, ['class' => 'form-control','id'=>'id_tipo_bien_mueble']) !!}                               
                </td>
              </tr>
              <tr>
                <td>Cuenta contable*</td>
                <td> 
                    <select name="id_cuenta_contable" class="form-control" onchange="myFunction(this.value)" required="required">
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
              <td>Descripción *</td>
                <td>                 
                   <input type="text" name="descripcion" class="form-control" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,#$%/().'-]{2,100}" title="No acepta caracteres especiales, minimo:2 y maximo:100" required/>
                </td> 
                 <td>Estado *</td>
                <td>
                   {!! Form::select('id_estado',$estado_af,1, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td> 
              </tr>
              <tr>
                 <td>Marca</td>
                <td> 
                   <input type="text" name="marca_bien" class="form-control" pattern="[0-9a-zA-Z ,#$%/().'-]{2,35}" />                   
                </td>
                <td>Modelo</td>
                <td>
                  <input type="text" name="modelo_bien" class="form-control" pattern="[0-9a-zA-Z ,#$%/().'-]{2,35}" />                   
                </td>  
              </tr>
              <tr>
                
                <td>Serie</td>
                <td>
                   <input type="text" name="numero_serie" class="form-control" pattern="[0-9a-zA-Z ,#$%/().'-]{2,35}" />                   
                </td> 
                 <td>Color</td>
                <td>                 
                   {!! Form::select('id_lista_color',$lista_color, null, ['class' => 'form-control']) !!}
                </td>
              </tr>
              <tr>                
                  <td>Años vida util *</td>
                <td>                 
                   {!! Form::number('anios_vida_util', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </td>
                <td>Número de factura</td>
                <td>
                 <input type="text" name="numero_factura" class="form-control" pattern="[0-9a-zA-Z ,#$%/().'-]{2,35}" />                    
                </td>
              </tr>
              <tr>
                <td>Monto de adquisición*</td>
                <td>   
                    {!! Form::number('monto_adquisicion',null,['class' => 'form-control','step'=>'0.01','placeholder'=>'$0.00', 'required' => 'required']) !!}                   
                </td>
                <td>Fecha adquisición*</td>
                <td>
                   {!! Form::text('fecha_adquisicion', null, ['class'=>'form-control datepicker', 'placeholder'=>'dd/mm/aaaa', 'required' => 'required']) !!}
                </td> 
                
              </tr>
              <tr>
                  <td>Imagen</td>
                  <td>
                      <input type="file" class="form-control" name="file" accept="image/*" capture>                      
                  </td>  
                <td>Observación</td>
                <td>                 
                   <input type="text" name="observacion" class="form-control" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,#$%/().'-]{2,100}" title="No acepta caracteres especiales, minimo:2 y maximo:100" />
                </td>                                   
              </tr>
            {!! Form::hidden('id_clase_bien',1, ['class' => 'form-control']) !!}
              <tr>
                  <td>
                    <button type="submit" class="btn btn-primary">Guardar</button>    
                  </td>
               
              </tr>
            </tbody>            
          </table>  
    
    {!! Form::close() !!} 
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
function fnc_unidad(id_ubicacion_org) { 
    document.getElementById("resultado_unidad").value="";
    <?php foreach($obj_unidad as $obj_unidades){ ?>
    if(id_ubicacion_org=={{ $obj_unidades->id_ubicacion_org }})
    {
    document.getElementById("resultado_unidad").value="{{$obj_unidades->nombre_responsable}}"; 
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
