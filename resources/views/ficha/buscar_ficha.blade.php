<!-- 
     * Nombre del archivo:nueva_ficha_vehiculo.blade.php
     * Descripción: 
     * Fecha de creación:31/12/16
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a class="list-group-item active">Buscar ficha</a>
    <a href="../ficha/nueva_ficha_inmueble" class="list-group-item">Nueva ficha inmueble</a>
    <a href="../ficha/nueva_ficha_mueble" class="list-group-item">Nueva ficha mueble</a>
    <a href="../ficha/nueva_ficha_vehiculo" class="list-group-item">Nueva ficha veh&iacute;culo</a>
</div>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
  <h4 class="text-center">Pantalla buscar ficha</h4>    
@stop 
@section('contenido')
<div class="panel panel-default">
        {!! Form::model(Request::all(),['route' => 'ficha/buscar_ficha', 'class' => 'navbar-form navbar-left', 'role'=>'search', 'method' =>'GET']) !!}        
                <div class="form-group" >
                    Código de inventario
                  {!!Form::text('codigo_inventario',null,['class'=>'form-control', 'placeholder'=>'Código de inventario'])!!}
                </div>
                  Unidad/departamento
                 <select name="id_ubicacion_org" class="form-control" >
                     <option> </option> 
                      @foreach($obj_unidad as $obj_unidades)
                     <option value="{{$obj_unidades->id_ubicacion_org}}" >{{$obj_unidades->nombre_unidad_dep}}</option>
                     @endforeach
                 </select>
                   Tipo inventario
                 <select name="id_tipo_inventario" class="form-control" >
                     <option> </option>
                     @foreach($obj_inventario as $obj_inventarios)
                     <option value="{{$obj_inventarios->id_tipo_inventario}}" >{{$obj_inventarios->nombre_tipo_inventario}}</option>
                     @endforeach
                 </select>    
                <button type="submit" class="btn btn-default"> Buscar</button>
   {!! Form::close() !!}
<div class="panel-body">
 <div class="codigos">
<table class="table table-condensed">   
    <thead>
      <tr>
        <th>id</th>
        <th>Descripción</th>
        <th>Código inventario</th>
        <th>Unidad/Departamento</th>
        <th>Seleccionar</th> 
      </tr>
    </thead>
    <tbody>
    @foreach($lista_codigo as $lista_codigos)
      <tr>
        <td>{{$lista_codigos->id_ficha_activo_fijo}}</td> 
        <td>{{$lista_codigos->descripcion}}</td> 
        <td>{{$lista_codigos->codigo_inventario}}</td>
        <td>{{$lista_codigos->nombre_unidad_dep}}</td>
        <td><input type="radio" name="seleccionar" onclick="myFunction(this.value)" value={{$lista_codigos->id_ficha_activo_fijo}}></td>
      </tr>   
   @endforeach
    </tbody> 
  </table> 
<table class="table table-condensed"> 
 <tr>   
    <td>
      {!!$lista_codigo->appends(Request::only(['codigo_inventario','id_ubicacion_org','id_tipo_inventario']))->render()!!}     
    </td>
    <td>
       {!! Form::open(['route' => 'ficha/editar', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="resultado_edit" >                
         {!! Form::submit('Editar', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}  
    </td>  
     <td>
       {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result2" >
         {!! Form::submit('Generar reporte', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
    </td> 
     <td>
       {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result2" >
         {!! Form::submit('Calcular depreciación', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
    </td> 
     <td>
       {!! Form::open(['route' => 'ficha/ver', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="resultado_ver" >
         {!! Form::submit('ver ficha', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
    </td> 
     <td>
       <a href="javascript:history.back(-1);" class="btn btn-primary">Ayuda</a>
    </td>  
     <td>
       <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
    </td>  
 </tr> 
</table>
    </div>
    </div>
</div>
<script>
function myFunction(seleccionar) {
    document.getElementById("resultado_edit").value = seleccionar;
    document.getElementById("resultado_ver").value = seleccionar;
}   
</script>
@stop