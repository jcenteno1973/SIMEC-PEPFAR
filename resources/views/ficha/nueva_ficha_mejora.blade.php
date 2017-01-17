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
  <h4 class="text-center">Pantalla nueva ficha mejora</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'ficha/nueva_mejora', 'class' => 'form','enctype'=>'multipart/form-data']) !!}
    <table class="table table-condensed">    
            <tbody> 
                <tr>
                  <td>
                      Código de inventario  
                    </td>
                    <td>
                       {!!Form::text('codigo_inventario',$codigo_inventario[0]->codigo_inventario,['class'=>'form-control', 'placeholder'=>'Código de inventario','readonly'=>'readonly'])!!} 
                    </td>  
                </tr>
              <tr>
               <td>Cuenta contable*</td>
                <td> 
                    <select name="id_cuenta_contable" class="form-control" onchange="myFunction(this.value)" required="required">
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
                 <td>Descripción*</td>
                <td> 
                    <input type="text" name="descripcion" class="form-control" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,#$%/().'-]{2,100}" title="No acepta caracteres especiales, minimo:2 y maximo:100" required/>
                </td> 
                 <td>Observación</td>
                <td>                 
                <input type="text" name="observacion" class="form-control" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,#$%/().'-]{2,100}" title="No acepta caracteres especiales, minimo:2 y maximo:100" />
                </td> 
              </tr>        
              
              <tr>
                <td>Monto de mejora*</td>
                <td>   
                    {!! Form::number('monto_adquisicion',null,['class' => 'form-control','min'=>'0.01','step'=>'0.01','placeholder'=>'$0.00', 'required' => 'required']) !!}                   
                </td>
                <td>Fecha mejora*</td>
                <td>
                   {!! Form::text('fecha_adquisicion',date('d/m/Y'), ['class'=>'form-control datepicker','placeholder'=>'dd/mm/aaaa', 'required' => 'required']) !!}
                </td>                 
              </tr>
              <tr>
                <td>Años vida util*</td>
                <td>                 
                   {!! Form::number('anios_vida_util',null, ['class' => 'form-control','min'=>'1','required' => 'required']) !!}
                </td>
                  <td>Documento</td>
                  <td>
                      <input type="file" class="form-control" name="file" accept="application/pdf" >                      
                  </td>                          
              </tr>
               {!! Form::hidden('id_clase_bien',2, ['class' => 'form-control']) !!}
               {!!Form::hidden('id_ficha_activo_fijo',$obj_ficha->id_ficha_activo_fijo,['class'=>'form-control', 'placeholder'=>'Código de inventario','readonly'=>'readonly'])!!} 
              <tr>
                  <td>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
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
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
@stop 