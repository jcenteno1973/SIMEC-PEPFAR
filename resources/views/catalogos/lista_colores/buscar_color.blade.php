<!-- 
     * Nombre del archivo: buscar_color.php
     * Descripcion: 
     * Fecha de creacion:25/12/2016
     * Creado por: Yamileth Campos
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Buscar color</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="#" class="list-group-item active">Buscar color</a>
    <a href="../administracion/color/create" class="list-group-item">Nuevo color</a> 
    <a href="../administracion/catalogos" class="list-group-item"> <span class="glyphicon glyphicon-chevron-left"></span> Regresar a Catalogos</a> 
</div>
@stop

@section('contenido')

<div class="panel panel-default">
    <font color="white">{!! $i=1; !!}</font> {{--muestra el contenido de i en color blanco--}}
   <!-- filtro busqueda de color"-->
    {!! Form::open(['route' => 'administracion.color.index', 'class' => 'navbar-form navbar-left', 'method'=>'GET']) !!}
        <div class="form-group">
          <label for="codigo">Nombre del color :</label>
          {!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'nombre del color'])!!}
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}
    <!-- fin filtro -->
    
    <!--lista de colores-->        
    <br><br>
 
    <div class="form-group" >
     
        <table class="table table-condensed">
        <thead>
            <th><center> #</center></th>
            <th> <center>Nombre</center></th>
            <th><center>Opciones</center></th>

        </thead>
        <tbody>

             @foreach($color as $colores)
            <tr> 
                <td><center>{{$i++}}</center></td>
                <td><center>{{$colores->desc_color}}</center></td>
                <td><center>
                    <a href="{{route('administracion.color.edit',$colores->id_lista_color)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a> 
                    <a href="{{route('administracion.color.destroy',$colores->id_cuenta_contable)}}" onclick="return confirm('¿Seguro desea cambiar el estado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </center>
                </td>
        
                
            </tr>
           @endforeach
        </tbody>
    </table>   
    </div>    
<!-- Botones"--> 
<div class="col-xs-8 col-sm-8"><br /><br />
       <table class="table">
        <tr>
          <td>{!! $color->render() !!}</td>
          <td>
             {{-- <a href="#" class="btn btn- btn-primary">Editar</a>
              <a href="#" class="btn btn-primary">Borrar</a> --}}
              <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>  
             @include('../../usuario_app/ayuda_usuario/ayuda_edit_usuario')  
          </td>
        </tr>        
    <!-- Fin botones-->
      </table> 
    </div>
    <!-- Fin botones-->
   {!! Form::close() !!}  
</div>
@stop   
