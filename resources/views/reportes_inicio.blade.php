<!-- 
     * Nombre del archivo:reportes_inicio.blade.php
     * Descripción: Vista para menu reportes
     * Fecha de creación:12/12/2016
     * Creado por: Yamileth Campos
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
    <div class="panel-heading" align="center">REPORTES</div>
    <div class="panel-body">
        <!-- la tabla del menu-->
        <div class="container">
            <table class="table" align="center">
                <tr>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 1" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 2" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 3" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 4" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 3" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 3" class="img-thumbnail"/></center></a></th>                    
                    
                </tr>             
                <tr align="center">
                    <td>Reporte de bienes muebles por destino aprobado</td>
                    <td>Reporte total de activos fijos que posee la alcald&iacute;a</td>
                    <td>Reporte de activos fijos por tipo de financiamiento</td>
                    <td>Reporte de depreciaci&oacute;n total de los activos fijos mes/a&ntilde;o</td>
                    <td>Reporte total de control administrativo de los activos fijos mes/a&ntilde;o</td>
                    <td>Reporte total de activos fijos de activos fijos dados alta/baja</td>
                </tr>
                <tr>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="reportes" class="reponsive"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="reportes" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="reportes" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="reportes" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 3" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/reporte2.jpg')}}" alt="Reporte 3" class="img-thumbnail"/></center></a></th>                    
                    
                      
                </tr>  
                 <tr align="center">
                    <td>Reporte de activos fijos faltantes, da&ntilde;ados, u obsoletos</td>
                    <td>Reporte de depreciaci&oacute;n de activos fijos por mes/a&ntilde;o</td>
                    <td>Reporte de activos fijos por porr responsable de &aacute;rea</td>
                    <td>Reporte de bienes muebles subastados</td>
                    <td>Reporte de activos fijos por tipo de adquisici&oacute;n</td>
                    <td>Reporte total de activos fijos por &aacute;rea/unidad</td>
                </tr>
            </table>
        </div>
        <!--fin tabla de menu-->
    </div>
</div>
@stop   
