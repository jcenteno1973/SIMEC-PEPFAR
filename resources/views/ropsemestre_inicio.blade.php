<!-- 
     * Nombre del archivo:administracion_inicio.blade.php
     * Descripción:Pantalla del modulo de administración
     * Fecha de creación:11/12/2016
     * Creado por: 

-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>ropanual_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>{{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('menu_lateral')
<div class="list-group animated fadeInLeft">
    <a href="#collapseTXTB" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXTB" ><b>TX_TB</b></a>
    <div class="collapse" id="collapseTXTB">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/24" class="list-group-item">Numerador</a>
            <a href="roptrimestre/index_datos/25" class="list-group-item">Denominador</a>
            <a href="roptrimestre/index_datos/26" class="list-group-item">Prueba Diagnostica</a>
            <a href="roptrimestre/index_datos/27" class="list-group-item">Envio Muestra</a>
        </div>
    </div>
    
    <a href="roptrimestre/index_datos/28" class="list-group-item">TB_Screen</a>
    <a href="roptrimestre/index_datos/29" class="list-group-item">TB_DX</a>
    
    <a href="roptrimestre/index_datos/23" class="list-group-item">TX_PREV</a>
    
    <a href="roptrimestre/index_datos/33" class="list-group-item">VL_Cascade</a>
    
    <a href="#collapseCryptoDX" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCryptoDX" ><b>CRYPTO_DX</b></a>
    <div class="collapse" id="collapseCryptoDX">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/31" class="list-group-item">HISTO_DX</a>
            <a href="roptrimestre/index_datos/32" class="list-group-item">CRYPTO_DX</a>
        </div>
    </div>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">ROP ANUAL</div>
    <div class="panel-body">
    <center>
        <br>
        <img src="{{asset('images/admins.jpg')}}"/><br>
        Usted se encuentra en el m&oacute;dulo ROP Semestre.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop  