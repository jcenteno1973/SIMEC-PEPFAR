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
    <a href="#collapseHTSTST" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseHTSTST" ><b>HTS TST</b></a>
    <div class="collapse" id="collapseHTSTST">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/1" class="list-group-item">Index Testing</a>
            <a href="roptrimestre/index_datos/2" class="list-group-item">Rechazados</a>
            <a href="roptrimestre/index_datos/5" class="list-group-item">Tamizados</a>
            <a href="roptrimestre/index_datos/6" class="list-group-item">HTS Community</a>
            <a href="roptrimestre/index_datos/7" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    
<a href="#collapseHTSRecent" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseHTSRecent" ><b>HTS Recent</b></a>
    <div class="collapse" id="collapseHTSRecent">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/4" class="list-group-item">Index Testing</a>
            <a href="roptrimestre/index_datos/3" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    
    <a href="#collapseTXNew" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXNew" ><b>TX New</b></a>
    <div class="collapse" id="collapseTXNew">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/8" class="list-group-item">TX_NEW</a>
            <a href="roptrimestre/index_datos/9" class="list-group-item">Poblacion Clave</a>
            <a href="roptrimestre/index_datos/10" class="list-group-item">Lactancia Materna</a>
        </div>
    </div>
    
    <a href="#collapseTXCurr" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXCurr" ><b>TX Curr</b></a>
    <div class="collapse" id="collapseTXCurr">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/11" class="list-group-item">TX_CURR</a>
            <a href="roptrimestre/index_datos/12" class="list-group-item">Poblacion Clave</a>
            <a href="roptrimestre/index_datos/13" class="list-group-item">Dispensacion</a>
        </div>
    </div>
    
    <a href="#collapseTXPVLS" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXPVLS" ><b>TX PVLS</b></a>
    <div class="collapse" id="collapseTXPVLS">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/14" class="list-group-item">TX_PVLS</a>
            <a href="roptrimestre/index_datos/15" class="list-group-item">Embarazo Lactancia</a>
            <a href="roptrimestre/index_datos/16" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    
    <a href="#collapseTXML" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXML" ><b>TX ML</b></a>
    <div class="collapse" id="collapseTXML">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/17" class="list-group-item">TX_ML</a>
        </div>
    </div>
    
    <a href="#collapseTXRTT" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXRTT" ><b>TX RTT</b></a>
    <div class="collapse" id="collapseTXRTT">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/18" class="list-group-item">TX_RTT</a>
            <a href="roptrimestre/index_datos/19" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    
    <a href="#collapseTXRapid" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXRapid" ><b>TX Rapid</b></a>
    <div class="collapse" id="collapseTXRapid">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/20" class="list-group-item">TX_Rapid</a>
        </div>
    </div>
    
    <a href="#collapseHTSLink" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseHTSLink" ><b>HTS Link</b></a>
    <div class="collapse" id="collapseHTSLink">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/21" class="list-group-item">HTS_Link</a>
        </div>
    </div>
    
    <a href="#collapseTXREEN" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXREEN" ><b>TX Reengage</b></a>
    <div class="collapse" id="collapseTXREEN">
        <div class="card card-body">
            <a href="roptrimestre/index_datos/22" class="list-group-item">TX_Reengage</a>
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
        Usted se encuentra en el m&oacute;dulo ROP Trimestre.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop  