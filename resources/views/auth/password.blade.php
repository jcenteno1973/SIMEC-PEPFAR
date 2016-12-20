@extends('plantillas.plantilla_inicio')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Restablecer contraseña por correo electrónico</div>
                 <div class="panel-body">
                    {!! Form::open(['route' => 'password/email', 'class' => 'form']) !!}
                        <div class="form-group">
                            <label>Ingrese su correo eletrónico</label>
                            {!! Form::email('email', old('email'), ['class'=> 'form-control']) !!}
                        </div>
                        {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection