<!-- 
     * Nombre del archivo:nuevo_indicador.blade.php
     * Descripción:Formulario para crear un nuevo indicador
     * Fecha de creación:12/12/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>nuevo_indicador.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario}}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla nuevo indicador</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Nuevo indicador</a>
    <a href="{{route('configuracion/buscar_indicador')}}" class="list-group-item">Buscar indicador</a>
    <a href="{{route('configuracion/buscar_af')}}" class="list-group-item">Buscar archivo fuente</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
        <div class="panel-body">
        {!! Form::open(['route' => 'configuracion/nuevo_indicador','class' => 'form']) !!}
            <table class="table table-condensed">    
            <tbody>
               <tr>
                <td>Evento *</td>
                <td> 
                    {!! Form::select('eventos',$obj_evento_epi,0,['id'=>'eventos','class' => 'form-control','required' => 'required','onchange'=>'fnc_cambio_evento(this.value)']) !!}
                </td>
              </tr>
               <tr>
                  <td>Código indicador *</td>
                  <td>
                      {!! Form::text('codigo',null,['class' => 'form-control' , 'id'=>'resultado','readonly'=>'readonly']) !!}
                  </td>  
              </tr>
               <tr>
                  <td>Descripción *</td>
                  <td>
                      <input type="text" class="form-control" name="descripcion" required="true">                      
                  </td>  
              </tr>
              <tr>
                  <td>Numerador *</td>
                <td>
                   {!! Form::select('numerador',$obj_componente,0,['id'=>'numerador','class' => 'form-control','required' => 'required']) !!}
                </td>
              </tr>
              <tr>
                  <td>Denominador</td>
                <td>
                   {!! Form::select('denominador',$obj_componente,0,['id'=>'denominador','class' => 'form-control']) !!}
                </td>
              </tr>
              <tr>
                 <td>Tipo indicador *</td>
                <td>
                    {!! Form::select('tipo',$obj_tipo_indicador,0,['id'=>'tipo','class' => 'form-control']) !!}
                </td> 
              </tr>
              <tr>
                  <td>Multiplicador *</td>
                  <td>
                      <input type="number" value="1" min="1" class="form-control" name="multiplicador" >                      
                  </td>  
              </tr>
            </tbody>
          </table>       
    <div>
       <table class="table">
        <tr>
          <td>
             <button type="submit" class="btn btn-primary">Guardar</button>  
              <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
              @include('usuario_app/ayuda_usuario/ayuda_nuevo_indicador') 
          </td>
        </tr>        
        </table>
        </div>
        <div class="panel-footer">
          <p>* Campo requerido</p>   
        </div>
    </div>
    {!! Form::close() !!}        
  
</div>
<script>
function fnc_cambio_evento(eventos) {
    document.getElementById("resultado").value="";
    <?php foreach($obj_datos as $descripcion_archivos){ ?>
    if(eventos=={{ $descripcion_archivos->id_evento_epi }})
    {
    document.getElementById("resultado").value="{{ $descripcion_archivos->codigo_evento }}"+"-"+"{{$aleatorio}}" 
    }
    <?php } ?>
}   
</script>
@stop   

