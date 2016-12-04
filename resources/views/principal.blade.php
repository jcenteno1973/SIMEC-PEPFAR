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
    <div class="panel-heading" align="center">MENU PRINCIPAL</div>
    <div class="panel-body">
        <!-- la tabla del menu-->
        <div class="container">
            <table class="table" align="center">
                <tr>
                    <th><a href=""> <center><img src="{{asset('images/fichas.jpg')}}" alt="fichas" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/inventario.jpg')}}" alt="inventario" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/solicitudes.jpg')}}" alt="solicitudes" class="img-thumbnail"/></center></a></th>
                    <th><a href=""><center><img src="{{asset('images/procesos.jpg')}}" alt="procesos" class="img-thumbnail"/></center></a></th>
                </tr>             
                <tr align="center">
                    <td>Fichas</td>
                  <td>Inventario</td>
                  <td>Solicitudes</td>
                  <td>Procesos</td>
                </tr>
                <tr>
                    <th><a href=""><center><img src="{{asset('images/reportes.jpg')}}" alt="reportes" class="img-thumbnail"/></center></a></th>
                    <th><a href="../administracion/buscar_usuario"><center><img src="{{asset('images/admin.jpg')}}" alt="administracion" class="img-thumbnail"/></center></a></th>
                    <th> <a href="#ingreso" data-toggle="modal">
                         <center><img src="{{asset('images/ayuda.jpg')}}" alt="ayuda" class="img-thumbnail"/></center>
                        </a>
                    </th>
                    <th><a href="{{route('usuario_app/salir')}}"><center><img src="{{asset('images/salir.jpg')}}" alt="salir" class="img-thumbnail"/></center></a></th>
                </tr>  
                 <tr align="center">
                    <td>Reportes</td>
                  <td>Administracion</td>
                  <td>Ayuda</td>
                  <td>Salir</td>
                </tr>
            </table>
        </div>
        <!--fin tabla de menu-->
    </div>
</div>
@stop   
