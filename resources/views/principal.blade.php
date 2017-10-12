<!-- 
     * Nombre del archivo:principal.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja

     * Fecha de modificacion: 4/12/16
     * Modificado por: Yamileth Campos
     * Descripcion:Se agregan imagenes y link del menu 
-->
@extends('plantillas.plantilla_sin_columna')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop 
@section('nombre_pantalla')
<h4 class="text-center"></h4>
@stop 
@section('contenido')
<div class="panel panel-default">
    <br><br>
        <div class="container text-center">
            <table class="table">             
                <center>
                    <h1>Sistema de Información Gerencial <br>para la Vigilancia Epidemiológica</h1>
                    <br><h3>Bienvenido(a): {{ Auth::user()->nombres_usuario }} {{ Auth::user()->apellidos_usuario }}</h3>
                </center>
            </table>
        </div>
    <br><br><br><br>
    

</div>
@stop
