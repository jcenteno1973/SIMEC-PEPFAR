<!--      
     * Nombre del archivo:parametros_consultar_bitacora.blade.php
     * Descripción: Parámetros para consultar bitácora
     * Fecha de creación:3/12/2016
     * Creado por: Karla Barrera    
-->

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Par&aacute;metros para Reporte de bit&aacute;cora</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>   
    <a href="../admin/rol/create" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="administracion/parametros_bitacora" class="list-group-item active">Consultar bit&aacute;cora</a>
    <a href="#" class="list-group-item">Catalogos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">    
        <!-- busqueda de reporte de bitacora -->
        {!! Form::open(['route' => 'administracion/nuevo_usuario', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
            
                <div class="form-group" >
                    <br /><br />Nombre de usuario
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre de usuario'])!!}
                  &nbsp;&nbsp;<br /><br /><br />Fecha:&nbsp;&nbsp;&nbsp;&nbsp;Desde
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Fecha inicio'])!!}
                  &nbsp;&nbsp;Hasta
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Fecha fin'])!!}
                </div>
                 &nbsp;&nbsp; &nbsp;
                <br /><br /><br />
   {!! Form::close() !!}
    <!-- fin busqueda de bitacora -->

<div>
       <table class="table">
        <tr>
          <td>
              <a href="../administracion/consultar_bitacora" class="btn btn-primary">Reporte </a> 
              <button type="reset" class="btn btn-primary">Regresar</button>
              <!--Boton de ayuda-->
              <a href="#buscarusuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
               <div class="modal fade" id="buscarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <!--header de la ventana-->
                            <div class="modal-header">                    
                                <p class="modal-title">Ayuda para b&uacute;squeda de reporte de bit&aacute;cora </p>
                            </div>
                            <!-- Contenido de la ventana -->
                            <div class="modal-body">
                                 <table> 
                                    <tr>
                                        <td>
                                            <img src="{{asset('images/informativo.png')}}" alt="informativo" class="img-thumbnail"/>                                
                                        </td>
                                        <td>
                                             <p ><font color="white">...</font></p>
                                        </td>
                                        <td>
                                             <p>contenido de la ventana</p>
                                        </td>
                                    </tr>

                                </table>  

                            </div>
                            <!--footer de la ventana-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
              <!--FIN Boton de ayuda-->
          </td>
        </tr>        
        </table> 
    </div>
     
</div>
@stop   