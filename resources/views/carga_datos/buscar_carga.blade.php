<!-- 
     * Nombre del archivo:buscar_carga.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_carga.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla buscar carga de archivo</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../carga/nueva_carga" class="list-group-item">Nueva carga de archivos</a>
    <a class="list-group-item active">Buscar carga de archivo</a>
</div>
@stop
@section('filtros_consulta')
{!! Form::model(Request::all(),['route' => 'carga/buscar_carga', 'class' => 'navbar-form navbar-left', 'role'=>'search']) !!}
<div class="panel-collapse">
    <table class="table table-condensed">    
            <tbody>
               <tr>
                <td>País</td>
                <td> 
                    @if(Auth::user()->role_id==1)<!--Verifica si es un administrador -->
                    <select name="region_sica" class="form-control">
                        @foreach($obj_region_sica as $paises)
                        <option>{{$paises->nombre_pais}}</option>
                        @endforeach                      
                   </select>
                    @else <!--No podra seleccionar país -->
                    <select name="region_sica" class="form-control">
                        @foreach($obj_region_sica as $paises)
                        @if(Auth::user()->id_region_sica==$paises->id_region_sica )
                        <option>{{$paises->nombre_pais}}</option>
                        @endif
                        @endforeach                      
                   </select>
                    @endif
                </td>
                <td>Año</td>
                <td>
                   <select name="anio_notificacion" class="form-control" >
                       @foreach($obj_anio as $obj_anios)
                        <option>{{$obj_anios->digitos_anio}}</option>
                        @endforeach  
                   </select>
                </td>
                 <td>Evento</td>
                <td>
                   {!! Form::select('eventos',$obj_evento_epi,1,['id'=>'eventos','class' => 'form-control','required' => 'required']) !!}
                </td>
               <td>Código archivo</td>
                <td>
                   {!! Form::select('codigos',$codigo_archivo,1,['id'=>'codigos','class' => 'form-control','required' => 'required']) !!}
                </td> 
                <td>
                   <button type="submit" class="btn btn-default"> Buscar</button> 
                </td>
              </tr>
            </tbody>
          </table> 
</div>
{!! Form::close() !!}
@stop
@section('contenido')
<div class="panel panel-default">
   <div class="panel-body">
    <table class="table table-condensed">
        <thead>
        <tr>
        <th><center>#</center></th>
        <th><center>País</center></th>
        <th><center>Año</center></th>
        <th><center>Evento</center></th>
        <th><center>Código archivo fuente</center></th>
        <th><center>Cargar datos</center></th>  
        <th><center>Editar</center></th>
        <th><center>Descargar archivo</center></th>
        <th><center>Borrar</center></th>
        </tr>
        </thead>
        <tbody>
             @foreach($obj_archivo_datos as $archivo_datos)
            <tr> 
                <td><center>{{$archivo_datos->id_archivo_datos}}</center></td>
                <td><center>
                    @foreach($obj_region_sica as $paises)
                    @if($archivo_datos->id_region_sica==$paises->id_region_sica )
                    {{$paises->nombre_pais}}
                    @endif
                    @endforeach    
                </center></td>
                <td><center>{{$archivo_datos->id_anio_notificacion}}</center></td>
                <td><center>
                    @foreach($obj_evento_epi_total as $evento)
                    @if($evento->id_evento_epi==$archivo_datos->id_evento_epi )
                    {{$evento->nombre_evento}}
                    @endif
                    @endforeach  
                    </center></td>
                <td><center>
                    @foreach($obj_archivo_fuente_total as $codigo)
                    @if($codigo->id_archivo_fuente==$archivo_datos->id_archivo_fuente)
                    {{$codigo->codigo_archivo_fuente}}
                    @endif
                    @endforeach
                </center></td>
                <td><center>
                @if($archivo_datos->datos_cargados==0)   
                 <a href="{{route('cargar_datos',$archivo_datos->id_archivo_datos)}}" class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> </a> 
                @endif
                </center></td>
                <td><center>
                 @if($archivo_datos->datos_cargados==0)    
                <a href="{{route('carga/editar_carga',$archivo_datos->id_archivo_datos)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                @endif
                </center></td>
                <td><center><a href="{{route('descargar',$archivo_datos->id_archivo_datos)}}" class="btn btn-success"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> </a></center></td>
                <td><center><a href="{{route('carga/eliminar',$archivo_datos->id_archivo_datos)}}" onclick="return confirm('¿Seguro deseas eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div> 
    <div class="panel-footer">
        {!!$obj_archivo_datos->appends(Request::all())->render()!!} 
    </div>
     <div>
          <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
          @include('usuario_app/ayuda_usuario/ayuda_nuevo_usuario')   
        </div>
</div>
@stop   

