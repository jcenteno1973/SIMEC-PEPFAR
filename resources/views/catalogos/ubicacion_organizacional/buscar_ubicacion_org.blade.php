<!-- 
     * Nombre del archivo: buscar_ubicacion_org.blade.php
     * Descripción: Pantalla para buscar ubicacion organizacional
     * Fecha de creación: 4/12/2016
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
  <h4 class="text-center">Buscar ubicacion organizacional</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ubicaci&oacute;n organizacional</a>
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nueva ubicaci&oacute;n organizacional</a>
    <a href="../administracion/contrasenia/cambiar" class="list-group-item">Cambio de contraseña</a>
    <a href="../admin/rol/create" class="list-group-item">Nuevo rol</a>
    <a href="#" class="list-group-item">Editar rol</a>
    <a href="../administracion/consultar_bitacora" class="list-group-item">Consultar bit&aacute;cora</a>
    <a href="../administracion/catalogos" class="list-group-item">Cat&aacute;logos</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    <!-- filtro busqueda de usuario, los "&nbsp; son espacios"-->
        {!! Form::open(['route' => 'administracion/nueva_ubicacion', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
        
                <div class="form-group" >
                    C&oacute;digo de Unidad/Departamento
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'C&oacute;digo de Unidad/Departamento'])!!}
                  &nbsp;&nbsp;Nombre Unidad/Departamento
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Unidad/Departamento'])!!}
                </div>
                 &nbsp;&nbsp; Nombre de responsable
                  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Responsable'])!!}
                </div>
                &nbsp;&nbsp;<button type="submit" class="btn btn-default"> Buscar</button>
   {!! Form::close() !!}
    <!-- fin filtro busqueda ubicacion organizacional -->
     
    {!! Form::open(['route' => 'administracion/nueva_ubicacion', 'class' => 'form']) !!}
    <table class="table">   
    <thead>
      <tr>
        <th>#</th>
        <th>C&oacute;digo de Unidad/Departamento</th>
        <th>Nombre Unidad/Departamento</th>
        <th>Nombre de responsable</th>
        <th>Alquilado</th>
        <th>Estado</th>
        <th>Seleccionar</th>        
      </tr>
    </thead>
    <tbody>
  @foreach($obj_ubicacion_org as $obj_ubicacion_orgs)
      <tr>
        <td>{{$obj_ubicacion_orgs->id_ubicacion_org}}</td>
        <td>{{$obj_ubicacion_orgs->codigo_unidad_dep}}</td>
        <td>{{$obj_ubicacion_orgs->nombre_unidad_dep}}</td>
        <td>{{$obj_ubicacion_orgs->nombre_responsable}}</td>
        <td>{{$obj_ubicacion_orgs->alquilado}}</td>

        <td></td>
        <td>
            @if($obj_ubicacion_orgs->estado_registro==1)
            Activo
            @else
            Bloqueado
            @endif
        </td>        
        <td>{!! Form::radio('seleccionar', null, ['class' => 'form-control' , 'required' => 'required']) !!}</td>       
      </tr>
   @endforeach   
    </tbody>
  </table>
    <div>
       <table class="table">
        <tr>
          <td>
              <a href="{{route('administracion/editar_ubicacion')}}" class="btn btn-primary">Editar </a> 
              <button type="reset" class="btn btn-primary">Regresar</button>
              <!--Boton de ayuda-->
              <a href="#buscarubicacion_org" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
               <div class="modal fade" id="buscarubicacion_org" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <!--header de la ventana-->
                            <div class="modal-header">                    
                                <p class="modal-title">Ayuda para busqueda de ubicaci&oacute;n organizacional </p>
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
 {!! Form::close() !!}
</div>
@stop   
