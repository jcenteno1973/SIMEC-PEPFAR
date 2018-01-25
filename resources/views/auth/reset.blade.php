@extends('plantillas.plantilla_inicio')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Restablezca su contraseña</div>
                 <div class="panel-body">
                    {!! Form::open(['route' => 'password/postReset', 'class' => 'form']) !!}
                        {!! Form::hidden('token', $token) !!}
                        <div class="form-group">
                            <label>Ingrese su correo eletrónico</label>
                            {!! Form::email('email', old('email'), ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            {!! Form::password('password', ['class'=> 'form-control','pattern'=>'(?=^.{8,25}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$']) !!}
                            
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        @include('ayuda/ayuda_reset')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

