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
<p ALIGN=center>administracion_inicio.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>{{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('menu_lateral')
<div class="list-group">
    <a href="#collapseSegu" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseSegu" ><b>Seguridad</b></a>
    <div class="collapse" id="collapseSegu">
        <div class="card card-body">
            <a href="administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a> 
            <a href="administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
            <a href="administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
            <a href="administracion/editar_rol" class="list-group-item">Editar rol</a>
            <a href="administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
            <a href="administracion/index_tablagen/permiso_app" class="list-group-item">Permiso App</a>
        </div>
    </div>
    
    <a href="#collapseAudit" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseAudit" ><b>Auditoria</b></a>
    <div class="collapse" id="collapseAudit">
        <div class="card card-body">
            <a href="administracion/consultar_bitacora" class="list-group-item">Consultar Bitacora</a>
        </div>
    </div>
    
    <a href="#collapseAdminAM" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseAdminAM" ><b>Gestion A-M</b></a>
    <div class="collapse" id="collapseAdminAM">
        <div class="card card-body">
            <a href="administracion/index_tablagen/anio" class="list-group-item">Año</a>
            <a href="administracion/index_tablagen/anio_semana" class="list-group-item">Año / Semana</a>
            <a href="administracion/index_tablagen/cant_servicios" class="list-group-item">Cantidad Servicios</a>
            <a href="administracion/index_tablagen/cascada" class="list-group-item">Cascada</a>
            <a href="administracion/index_tablagen/cascada_cv" class="list-group-item">Cascada CV</a>            
            <a href="administracion/index_tablagen/embarazo_lactancia" class="list-group-item">Embarazo Lactancia</a>
            <a href="administracion/index_tablagen/hospital" class="list-group-item">Hospital</a>
            <a href="administracion/index_tablagen/indicador" class="list-group-item">Indicador</a>
            <a href="administracion/index_tablagen/laboratorios" class="list-group-item">Laboratorios</a>
            <a href="administracion/index_tablagen/datos" class="list-group-item">Metas ROP</a>
            <a href="administracion/index_tablagen/meses" class="list-group-item">Meses</a>
            <a href="administracion/index_tablagen/meses_periodo" class="list-group-item">Meses Periodo</a>
        </div>
    </div>
    
    <a href="#collapseAdminNZ" class="list-group-item" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseAdminNZ" ><b>Gestion N-Z</b></a>
    <div class="collapse" id="collapseAdminNZ">
        <div class="card card-body">
            <a href="administracion/index_tablagen/periodo" class="list-group-item">Periodo</a>
            <a href="administracion/index_tablagen/periodo_anual" class="list-group-item">Periodo Anual</a>
            <a href="administracion/index_tablagen/poblacion_clave" class="list-group-item">Poblacion Clave</a>
            <a href="administracion/index_tablagen/prueba" class="list-group-item">Prueba</a>
            <a href="administracion/index_tablagen/prueba_diagnostica_tb" class="list-group-item">Prueba Diagnostica tb</a>
            <a href="administracion/index_tablagen/rango_edad" class="list-group-item">Rango Edad</a>
            <a href="administracion/index_tablagen/rango_edad_etario" class="list-group-item">Rango Edad Etario</a>
            <a href="administracion/index_tablagen/semana" class="list-group-item">Semana</a>
            <a href="administracion/index_tablagen/tipo_beneficio" class="list-group-item">Tipo Beneficio</a>
            <a href="administracion/index_tablagen/tipo_prueba" class="list-group-item">Tipo Prueba</a>
            <a href="administracion/index_tablagen/tipo_rrhh" class="list-group-item">Tipo RRHH</a>
            <a href="administracion/index_tablagen/tratamiento" class="list-group-item">Tratamiento</a>
            <a href="administracion/index_tablagen/tratamiento_tb" class="list-group-item">Tratamiento tb</a>

        </div>
    </div>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <div class="panel-heading" align="center">ADMINISTRACION</div>
    <div class="panel-body">
    <center>
        <br>
        <img src="{{asset('images/admins.jpg')}}"/><br>
        Usted se encuentra en el m&oacute;dulo Administraci&oacute;n.<br>
        <div>Para m&aacute;s opciones acceda al men&uacute; de la izquierda.</div>
      <br><br>
    </center>
    </div>
</div>
@stop
