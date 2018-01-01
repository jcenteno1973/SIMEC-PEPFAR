<!-- 
     * Nombre del archivo:reportes_inicio.blade.php
     * Descripción: Pantalla del modulo de reportes
     * Fecha de creación:12/12/2016
     * Creado por: Juan Carlos Centeno Borja 
-->
@extends('plantillas.plantilla_sin_columna')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>reportes_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('nombre_pantalla')
<h4 class="text-center">Pantalla de reportes</h4>
@stop 
@section('contenido')
<div class="col-md-8 col-md-offset-2">        
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
    <div class="panel-body">
     {!! Form::open(['route' => 'carga/nueva_carga','class' => 'form']) !!}
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
                   {!! Form::select('codigos',$codigo_archivo,0,['id'=>'codigos','class' => 'form-control','required' => 'required','onchange'=>'fnc_cambio_codigo(this.value)']) !!}
                </td> 
              </tr>
              <tr>
                  <td>Descripción</td>
                  <td>
                      {!! Form::text('descripcion',null,['class' => 'form-control' , 'id'=>'resultado','readonly'=>'readonly']) !!}                   
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
              @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario') 
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
</div>
</div>
<script>
function fnc_cambio_codigo(codigos) {
    document.getElementById("resultado").value="Seleccionar";
    <?php foreach($descripcion_archivo as $descripcion_archivos){ ?>
    if(codigos=={{ $descripcion_archivos->id_archivo_fuente }})
    {
    document.getElementById("resultado").value="{{ $descripcion_archivos->descripcion_archivo_fuente }}" 
    }
    <?php } ?>
}   
</script>
<script>
function fnc_cambio_evento(eventos) {
    document.getElementById("resultado").value="Seleccionar";
    <?php foreach($descripcion_archivo as $descripcion_archivos){ ?>
    if(codigos=={{ $descripcion_archivos->id_archivo_fuente }})
    {
    document.getElementById("resultado").value="{{ $descripcion_archivos->descripcion_archivo_fuente }}" 
    }
    <?php } ?>
}   
</script>
@stop   
