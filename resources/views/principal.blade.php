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

<p ALIGN=right> {{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="container text-center">
            <table class="table">             
                <center>
                    <h1>Herramienta Gerencial para la carga de los datos<br>del proyecto ROP</h1>
                    <br><h3>Bienvenido(a): {{ Auth::user()->nombres_usuario }} {{ Auth::user()->apellidos_usuario }} </h3>
                </center>
            </table>
        </div>
     </div>
</div>



@stop
