<!-- 
     * Nombre del archivo:get_parametros.blade.php
     * Descripción:Formulario para generar el reporte de bitacora
     * Fecha de creación:21/12/2016
     * Creado por: Juan Carlos Centeno Borja     
-->
@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>get_parametros.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla consultar bitácora</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a> 
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/lista_copia" class="list-group-item">Copias de seguridad</a>
    <a class="list-group-item active">Consultar bit&aacute;cora</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/consultar_bitacora']) !!}
    <div class="panel-body">
      <table class="table table-condensed">    
            <tbody>
                <tr>
                    <td>
                      Nombre de usuario  
                    </td>
                    <td>
                      {!!Form::text('nombre_usuario',null,['class'=>'form-control', 'placeholder'=>'Código de usuario'])!!}   
                    </td>
                </tr>
                <tr>
                    <td>
                       Desde * 
                    </td>
                     <td>
                       {!!Form::text('fecha_inicio',null,['class'=>'form-control datepicker', 'placeholder'=>'Fecha inicio dd/mm/aaaa', 'required' => 'required'])!!} 
                    </td>
                    <td>
                       Hasta *  
                    </td>
                     <td>
                      {!!Form::text('fecha_fin',null,['class'=>'form-control datepicker', 'placeholder'=>'Fecha fin dd/mm/aaaa', 'required' => 'required'])!!}  
                    </td>
                </tr>
     </table> 
    </div>
    <div>
        {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
        <a href="{{route('administracion')}}" class="btn btn-primary"> Regresar</a>
        <a href="{{route('administracion')}}" class="btn btn-primary"> Adicionar</a>
        <a href="{{route('administracion')}}" class="btn btn-primary"> Editar</a>
        <a href="{{route('administracion')}}" class="btn btn-primary"> Borrar</a>
        
    </div>
   {!! Form::close() !!}
   
   <table id="example" class="display" width="100%"></table>
        
   
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
{!!$obj_bitacora->render()!!}

<script>
    var dataSet = [
    @foreach($obj_bitacora as $obj_item)
        ["{{ $obj_item->ip_dispositivo }}", "{{ $obj_item->usuario->nombres_usuario }} {{ $obj_item->usuario->apellidos_usuarios }}", "{{ $obj_item->fecha_hora_transaccion }}", "{{ $obj_item->transaccion_realizada }}","{{ $obj_item->fechat }}"],
    @endforeach
];

$(document).ready(function() {
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { title: "IP Dispositivo" },
            { title: "Nombre Usuario" },
            { title: "Fecha" },
            { title: "Transaccion Realizada" },
            { title: "f" }
        ],
    // Configuracion de los Objetos
    "dom": "<'row'<'col-sm-12'tr>>",
    "select":   "single"
    } );
} );
   </script>
   <div class="panel-footer">
         * Campo requerido
    </div>
</div>
<script>
    /*
     * Validar la fecha inicial y final
     */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
@stop
