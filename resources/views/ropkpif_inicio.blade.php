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
    @if ( in_array( Auth::user()->get_role_user->get_role->nombre_rol, ['kpif_cas','Administrador'])  )
    <a href="#collapseCAS" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCAS" ><b>CAS</b></a>
    <div class="collapse" id="collapseCAS">
        <div class="card card-body">
            <a href="setmunicipio" class="list-group-item">Seleccionar Municipio</a>
        </div>
    </div>
    
    <a href="#collapseHTS" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseHTS" ><b>HTS_TST</b></a>
    <div class="collapse" id="collapseHTS">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/41" class="list-group-item">HTS_TST</a>
            <a href="ropkpif/index_datoskpif/42" class="list-group-item">Rechazados</a>
            <a href="ropkpif/index_datoskpif/43" class="list-group-item">Tamizados</a>
            <a href="ropkpif/index_datoskpif/44" class="list-group-item">HTS_Community</a>
            <a href="ropkpif/index_datoskpif/45" class="list-group-item">Poblacion Clave</a>            
        </div>
    </div>
    
    <a href="#collapseTXRAPIDV" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXRAPIDV" ><b>TX_RAPID_Verify</b></a>
    <div class="collapse" id="collapseTXRAPIDV">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/59" class="list-group-item">TX_RAPID_Verify</a>
        </div>
    </div>
    
    <a href="#collapseTXCURRV" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXCURRV" ><b>TX_CURR_Verify</b></a>
    <div class="collapse" id="collapseTXCURRV">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/60" class="list-group-item">TX_CURR_Verify</a>
            <a href="ropkpif/index_datoskpif/61" class="list-group-item">Poblacion Clave</a>
            <a href="ropkpif/index_datoskpif/62" class="list-group-item">Dispensacion</a>
        </div>
    </div>
    
    <a href="#collapseTXPVLSV" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXPVLSV" ><b>TX_PVLS_Verify</b></a>
    <div class="collapse" id="collapseTXPVLSV">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/63" class="list-group-item">TX_PVLS_Verify</a>
            <a href="ropkpif/index_datoskpif/64" class="list-group-item">Embarazo Lactancia</a>
            <a href="ropkpif/index_datoskpif/65" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    
    <a href="ropkpif/index_datoskpif/66" class="list-group-item">HTS_Link</a>
    <a href="ropkpif/index_datoskpif/68" class="list-group-item">Cascada NAP</a>
    @endif

    @if ( in_array( Auth::user()->get_role_user->get_role->nombre_rol, ['kpif_carmevi','Administrador'])  )
    <a href="#collapseCARMEVI" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCARMEVI" ><b>CARMEVI</b></a>
    <div class="collapse" id="collapseCARMEVI">
        <div class="card card-body">
            <a href="sethospital" class="list-group-item">Seleccionar Hospital</a>
        </div>
    </div>
    
    <a href="#collapseHTSRECENT" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseHTSRECENT" ><b>HTS_RECENT</b></a>
    <div class="collapse" id="collapseHTSRECENT">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/47" class="list-group-item">Index Testing</a>
            <a href="ropkpif/index_datoskpif/48" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    
    <a href="#collapseTXNEW" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXNEW" ><b>TX_NEW</b></a>
    <div class="collapse" id="collapseTXNEW">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/49" class="list-group-item">TX_NEW</a>
            <a href="ropkpif/index_datoskpif/50" class="list-group-item">Poblacion Clave</a>
            <a href="ropkpif/index_datoskpif/51" class="list-group-item">Lactancia Materna</a>
        </div>
    </div>
    
    <a href="ropkpif/index_datoskpif/52" class="list-group-item">TX_RAPID</a>
    
    <a href="#collapseTXCURR" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXCURR" ><b>TX_CURR</b></a>
    <div class="collapse" id="collapseTXCURR">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/53" class="list-group-item">TX_CURR</a>
            <a href="ropkpif/index_datoskpif/54" class="list-group-item">Poblacion Clave</a>
            <a href="ropkpif/index_datoskpif/55" class="list-group-item">Dispensacion</a>
        </div>
    </div>
    
    <a href="#collapseTXPVLS" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseTXPVLS" ><b>TX_PVLS</b></a>
    <div class="collapse" id="collapseTXPVLS">
        <div class="card card-body">
            <a href="ropkpif/index_datoskpif/53" class="list-group-item">TX_PVLS</a>
            <a href="ropkpif/index_datoskpif/54" class="list-group-item">Embarazo Lactancia</a>
            <a href="ropkpif/index_datoskpif/55" class="list-group-item">Poblacion Clave</a>
        </div>
    </div>
    <a href="ropkpif/index_datoskpif/67" class="list-group-item">VL_Cascade</a>
    @endif

</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">ROP KPIF</div>
    <div class="panel-body">
    <center>
        <br>
        <img src="{{asset('images/admins.jpg')}}"/><br>
        Usted se encuentra en el m&oacute;dulo KPIF.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop