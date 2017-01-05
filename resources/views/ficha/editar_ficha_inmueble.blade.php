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
    {!! Form::open(['route' => 'ficha/editar_inmueble', 'class' => 'form','enctype'=>'multipart/form-data']) !!}
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
                    <input type="text" name="descripcion" value="{{$obj_ficha->descripcion}}" class="form-control" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,#$%/().'-]{2,100}" title="No acepta caracteres especiales, minimo:2 y maximo:100" required/>
                </td> 
                <td>Nombre del responsable*</td>
                <td>
                <input type="text" name="responsable_bien" value="{{$obj_ficha->responsable_bien}}" id="resultado_unidad" class="form-control" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" required/>
                </td>
              </tr>
              
              <tr>
                 <td>Tipo de documento</td>
                <td>                 
                   {!! Form::select('id_tipo_doc_propiedad',$tipo_documento,$obj_ficha->id_tipo_doc_propiedad, ['class' => 'form-control']) !!}
                </td>
                <td>No de registro de raiz e hipoteca</td>
                <td>
                   <input type="text" name="numero_registro_propiedad" value="{{$obj_ficha->numero_registro_propiedad}}" class="form-control" pattern="[0-9a-zA-Z ,#$%/().'-]{2,25}" />
                </td>  
              </tr>              
              <tr>                
                  <td>Años vida util</td>
                <td>                 
                   {!! Form::number('anios_vida_util',$obj_ficha->anios_vida_util, ['class' => 'form-control']) !!}
                </td>
                <td>Estado de legalidad*</td>
                <td>                 
                    <select name="inscrita_registro" class="form-control"  required="required">                      
                       @if($obj_ficha->inscrita_registro==1) 
                        <option value="1">Inscrito</option>
                        <option value="0">No inscrito</option>
                       @else
                       <option value="0">No inscrito</option>
                       <option value="1">Inscrito</option>
                       @endif
                     </select>
                </td>
              </tr>
              <tr>
                <td>Monto de adquisición*</td>
                <td>   
                    {!! Form::number('monto_adquisicion',$obj_ficha->monto_adquisicion,['class' => 'form-control','step'=>'0.01','placeholder'=>'$0.00', 'required' => 'required']) !!}                   
                </td>
                <td>Fecha adquisición*</td>
                <td>
                   {!! Form::text('fecha_adquisicion',$fecha_adquisicion, ['class'=>'form-control datepicker', 'placeholder'=>'dd/mm/aaaa', 'required' => 'required']) !!}
                </td>                 
              </tr>
              <tr>
                  <td>Documento</td>
                  <td>
                      <input type="file" class="form-control" name="file" accept="application/pdf" >                      
                  </td>  
                <td>Observación</td>
                <td>                 
                <input type="text" name="observacion" class="form-control" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,#$%/().'-]{2,100}" title="No acepta caracteres especiales, minimo:2 y maximo:100" />
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
              {!! Form::hidden('id_documento',$obj_documento[0]->id_documento_imagen, ['class' => 'form-control']) !!}
              @else
              {!! Form::hidden('id_documento',0, ['class' => 'form-control']) !!}
              @endif
              </tr>
            {!! Form::hidden('id_clase_bien',2, ['class' => 'form-control']) !!}
            
              <tr>
                  <td>
                    <button type="submit" class="btn btn-primary">Guardar</button>    
                  </td>
                <td>
       {!! Form::open(['route' => 'administracion/cambiar_contrasenia', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result" >                
         {!! Form::submit('Agregar mejora', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}  
    </td>
     <td>
       {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result2" >
         {!! Form::submit('Agregar revaluo', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
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