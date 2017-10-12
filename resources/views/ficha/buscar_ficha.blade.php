<!-- 
     * Nombre del archivo:nueva_ficha_vehiculo.blade.php
     * Descripción: 
     * Fecha de creación:31/12/16
     * Creado por: Juan Carlos Centeno Borja

     * Modificacion: boton y enlace de ayuda para la pantalla
     * Fecha de modificacion: 16/01/17
     * Modificado por: Yamileth Campos
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
                <div class="form-group" >
                     Unidad/departamento
                         <select name="id_ubicacion_org" class="form-control" >
                             <option> </option> 
                              @foreach($obj_unidad as $obj_unidades)
                             <option value="{{$obj_unidades->id_ubicacion_org}}" >{{$obj_unidades->nombre_unidad_dep}}</option>
                             @endforeach
                         </select>
                </div>
                  <div class="form-group" >
                      Tipo inventario
                 <select name="id_tipo_inventario" class="form-control" >
                     <option> </option>
                     @foreach($obj_inventario as $obj_inventarios)
                     <option value="{{$obj_inventarios->id_tipo_inventario}}" >{{$obj_inventarios->nombre_tipo_inventario}}</option>
                     @endforeach
                 </select>   
                  <button type="submit" class="btn btn-default"> Buscar</button>
                  </div>
                    
                
   {!! Form::close() !!}
<div class="panel-body">
 <div class="codigos">
<table class="table table-condensed">   
    <thead>
      <tr>
        <th>id</th>
        <th>C&oacute;digo inventario</th>
        <th>Descripci&oacute;n</th>
        <th>Unidad/Departamento</th>
        <th>Seleccionar</th> 
      </tr>
    </thead>
    <tbody>
    @foreach($lista_codigo as $lista_codigos)
      <tr>
        <td>{{$lista_codigos->id_ficha_activo_fijo}}</td> 
        <td>{{$lista_codigos->codigo_inventario}}</td>
         <td>{!!$lista_codigos->descripcion=str_limit($lista_codigos->descripcion,35)!!} </td> 
        <td>{{$lista_codigos->nombre_unidad_dep}}</td>
        <td><input type="radio" name="seleccionar" onclick="myFunction(this.value)" value={{$lista_codigos->id_ficha_activo_fijo}}></td>
      </tr>   
   @endforeach
    </tbody>
  </table> 
         <div class="form-group">
         {!! Form::open(['route' => 'ficha/seleccionar', 'class' => 'form','method' => 'get'])!!}              
         <input type="hidden" name="resultado" id="resultado_edit" > 
         <input type="hidden" name="id_ficha_activo_fijo" id="resultado_rep" >
          <input type="hidden" name="id_ficha_activo_fijo" id="resultado_mejora" >                
          <input type="hidden" name="id_ficha_activo_fijo" id="resultado_revaluo" >
         <input type="hidden" name="resultado" id="resultado_ver" >
          <input type="hidden" name="id_ficha_activo_fijo" id="resultado_depreciacion" >
         {!!$lista_codigo->appends(Request::only(['codigo_inventario','id_ubicacion_org','id_tipo_inventario']))->render()!!}      
         {!! Form::submit('Editar', array('class'=> 'btn btn-primary','name'=>'opcion'))!!}
         {!! Form::submit('Reporte', array('class'=> 'btn btn-primary','name'=>'opcion'))!!}
         {!! Form::submit('Mejora', array('class'=> 'btn btn-primary','name'=>'opcion'))!!}
         {!! Form::submit('Revaluo', array('class'=> 'btn btn-primary','name'=>'opcion'))!!}
         {!! Form::submit('Ver ficha',array('class'=> 'btn btn-primary','name'=>'opcion'))!!}
         {!! Form::submit('Depreciación', array('class'=> 'btn btn-primary','name'=>'opcion'))!!}
         <a href="javascript:history.back(-1);" class="btn btn-primary">Regresar</a>
         @include('ficha/ayuda_ficha/ayuda_buscar_ficha')
         {!! Form::close()!!}   
        </div> 
    
    </div>
    </div>
</div>
<script>
function myFunction(seleccionar) {
    document.getElementById("resultado_edit").value = seleccionar;
    document.getElementById("resultado_ver").value = seleccionar;
    document.getElementById("resultado_rep").value = seleccionar;
    document.getElementById("resultado_mejora").value = seleccionar;
    document.getElementById("resultado_revaluo").value = seleccionar;
    document.getElementById("resultado_depreciacion").value = seleccionar;
}   
</script>
@stop