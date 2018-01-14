@extends('plantillas.plantilla_inicio')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=left>password.blade.php</p>
@stop 
@section('contenido')
<div class="panel panel-primary">
   <div class="panel-heading"  >
      <h5 class="text-center">Pantalla recuperar contraseña</h5>
  </div>
    <div class="panel-body">
     <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                 <div class="panel-body">
                    {!! Form::open(['route' => 'password/email', 'class' => 'form']) !!}
                        <div class="form-group">
                            <label>Ingrese su correo eletrónico</label>
                            {!! Form::email('email', old('email'), ['class'=> 'form-control']) !!}
                        </div>
                        {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
                        <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>
                        @include('ayuda/ayuda_ingreso')
                    {!! Form::close() !!}
                </div>
            </div>
     </div>   
    </div> 
  <div class="panel-footer"><h5 class="text-center">Derechos Reservados &copy; 2017, UES/FIA/EISI</h5></div>
</div>  
@endsection