<!-- 
     * Nombre del archivo:buscar_catalogo.blade.php
     * Descripción:Vista para buscar los archivos fuentes de datos
     * Fecha de creación:25/11/2017
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('nombre_plantilla')
<p ALIGN=center>buscar_mccl.blade.php</p>
@stop
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla mccl</h4>
@stop 
@section('menu_lateral')
<div class="list-group">

</div>
@stop

@section('contenido')
<div class="panel panel-default">
    {{-- {!! Form::open(['route' => 'administracion/buscar_usuario', 'class' => 'form-row align-items-center', 'role'=>'search']) !!} --}}
    <div class="panel-collapse">
        {{-- filtro busqueda de usuario, los "&nbsp; son espacios"--}}
        <table class="table table-bordered">    
            <tbody>
               <tr>
                 <td>Código de usuario</td>
                <td>
                    <input type="text" class="form-control" name="nombre_usuario" >
                </td>
               <td>Roles</td>
                <td>
                    <select name="rol_usuario" class="form-control" >
                     <option> </option>
                        {{--
                        @foreach($obj_role as $obj_roles)
                        <option>{{$obj_roles->nombre_rol}}</option>
                        @endforeach
                        --}}
                 </select>
                </td>
                <td>
                  <input type="checkbox" name="estado_usuario" id="estado_usuario" value="1" checked>                     
                     Activo  
                </td>
                <td>
                   <button type="submit" class="btn btn-default"> Buscar</button> 
                </td>
              </tr>
            </tbody>
          </table> 
    </div>
     {{--
     {!! Form::close() !!}
     --}}
    {{-- fin filtro busqueda usuario --}}
    <div class="panel-body">
    {{--
    {!! Form::open(['route' => 'administracion/guardar_usuario', 'class' => 'form','method' => 'get']) !!}
    --}}
    <table class="table table-striped table-bordered">   
    <thead>
      <tr>
        <th>Pais</th>
        <th>Departamento</th>
        <th>Municipio</th>
        <th>Nombre Facilidad</th>
        <th>Año</th>
        <th>tipo de Muestra</th>
        <th>T</th>
        <th><center>Seleccionar</center></th> 
        
      </tr>
    </thead>
    <tbody>
  {{--
  @foreach($obj_usuario as $obj_usuarios)
  --}}
      <tr>
        <td>{{--{{$obj_usuarios->id_usuario_app}}--}}</td>
        <td>{{--{{$obj_usuarios->nombre_usuario}}--}}</td>
         {{--@foreach($obj_role as $obj_roles)--}}
          {{--@if($obj_roles->role_id==$obj_usuarios->role_id)--}}
        <td>{{--{{$obj_roles->nombre_rol}}--}}</td>
        {{--@endif--}}
         {{--@endforeach--}}
        <td>
            {{--
            @if($obj_usuarios->estado_usuario==1)
            Activo
            @else
            Bloqueado
            @endif
            --}}
        </td>        
        <td>
        <center>
            {{--
           <input type="radio" name="seleccionar" onclick="myFunction(this.value)" value={{$obj_usuarios->id_usuario_app}}> 
           --}}
        </center>
        </td> 
       
      </tr>   
   {{--@endforeach   --}}
    </tbody>   
  </table> 
   <div class="col-md-8 col-md-offset-4">
       {{--
       {!!$obj_usuario->render()!!}
       --}}
       </div>
    </div>
    <div class="panel-footer">
        
       <table class="table table-condensed">
        <tr>
          <td>
               {{--
               {!! Form::submit('Editar',['class'=>'btn btn-primary'])!!}               
               {!! Form::close() !!} --}}
          </td> 
          <td>
             {{--
             {!! Form::open(['route' => 'administracion/cambiar_contrasenia', 'class' => 'form','method' => 'get']) !!}    --}}          
                 <input type="hidden" name="resultado" id="result" >                
                 {{--
                 {!! Form::submit('Cambiar contraseña', array('class'=> 'btn btn-primary'))!!}
                 {!! Form::close()!!} --}}
          </td>
          <td>
             {{--
             {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}   
              --}}
                 <input type="hidden" name="resultado" id="result2" >
                 {{--
                 {!! Form::submit('Cambiar estado', array('class'=> 'btn btn-primary'))!!}
                 {!! Form::close()!!} 
                 --}}
          </td>
          <td>
             <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>   
          </td>
          <td>          
              {{--Boton de ayuda--}}
              {{--@include('ayuda/ayuda_busca_usuario') --}}
              {{--FIN Boton de ayuda--}}             
          </td>
        </tr>        
        </table>   
    </div>
</div>
<script>
function myFunction(seleccionar) {
    document.getElementById("result").value = seleccionar;
    document.getElementById("result2").value = seleccionar;
}   
</script>
@stop   
