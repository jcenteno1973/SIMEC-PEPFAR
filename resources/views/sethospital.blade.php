<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:Pantalla principal del sistema informático
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_sin_columna')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>principal.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>{{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="container text-center">
            <table class="table">             
                <center>
                    <h1>Herramienta Gerencial para la carga de los datos<br>del proyecto ROP</h1>
                    {{--
                    <br><h3>Bienvenido(a): {{ Auth::user()->nombres_usuario }} {{ Auth::user()->apellidos_usuario }} {{ Auth::user()->id_usuario_app }}</h3>
                    --}}
                </center>
            </table>
        </div>
     </div>
</div>

<!-- Button trigger modal -->
<div class="modal fade" tabindex="-1" role="dialog" name="testx" id="testx" aria-labelledby="testxTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">      
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hospital con el que se Trabajara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      {!! Form::open(['route' => 'administracion/sethospital', 'class' => 'form']) !!}
      <div class="modal-body">
          Seleccion de Hospital
          <input type="hidden" id="id_usuario_app" name="id_usuario_app" value="{{ Auth::user()->id_usuario_app }}">
            <select name="id_hospital" placeholder="id_hospital" class="form-control" >
                    @foreach(\App\Models\hospital::all() as $obj_item)
                        @if( Auth::user()->id_hospital == $obj_item->id_hospital )
                            <option value="{{ $obj_item->id_hospital }}" selected>{{ $obj_item->nombre_hospital }} </option>
                        @else
                            <option value="{{ $obj_item->id_hospital }}">{{ $obj_item->nombre_hospital }} </option>
                        @endif
                    @endforeach
            </select>
        
      </div>
      <div class="modal-footer">
        <input type="submit" value="Guardar" class="btn btn-primary">
      </div>
      {!! Form::close()!!}
      
    </div>
  </div>
</div>

<script>
$(document).ready(function() 
{
    $('#testx').modal('show');
});
</script>

@stop
