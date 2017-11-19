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
      {!!$lista_codigo->render()!!}     
    </td>
    <td>
       {!! Form::open(['route' => 'administracion/cambiar_contrasenia', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result" >                
         {!! Form::submit('Editar', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}  
    </td>
    <td>
       {!! Form::open(['route' => 'administracion/cambiar_contrasenia', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result" >                
         {!! Form::submit('Agregar mejora', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}  
    </td>
     <td>
       {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result2" >
         {!! Form::submit('Agregar revaluo', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
    </td>  
     <td>
       {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result2" >
         {!! Form::submit('Calcular depreciación', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
    </td> 
     <td>
       {!! Form::open(['route' => 'administracion/cambiar_estado', 'class' => 'form','method' => 'get']) !!}              
         <input type="hidden" name="resultado" id="result2" >
         {!! Form::submit('ver ficha', array('class'=> 'btn btn-primary'))!!}
         {!! Form::close()!!}   
    </td> 
     <td>
       <a href="javascript:history.back(-1);" class="btn btn-primary"> Regresar</a>
    </td>  
 </tr> 
</table>
