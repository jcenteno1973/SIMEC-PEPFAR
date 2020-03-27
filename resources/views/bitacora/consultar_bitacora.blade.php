<!-- 
     * Nombre del archivo:consultar_bitacora.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_reportes_admin')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>consultar_bitacora.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">Pantalla consultar bitacora</h4>
@stop 
@section('menu_lateral')
<div class="list-group">
    <a href="../administracion/nuevo_usuario" class="list-group-item">Nuevo usuario</a>   
    <a href="../administracion/buscar_usuario" class="list-group-item">Buscar usuarios</a>
    <a href="../administracion/nuevo_rol" class="list-group-item">Nuevo rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Editar rol</a>
    <a href="../administracion/editar_rol" class="list-group-item">Copias de Seguridad</a>
    <a class="list-group-item active">Bitacora</a>
</div>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/consultar_bitacora']) !!}
    <div class="collapse" id="collapseMasInformacion">
    <div class="panel-body">
        {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
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
        
        </div>
    <div>
        
        <a href="{{route('administracion')}}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>
        <a href="{{route('administracion/nuevo_bitacora')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar</a>
        <button id="ButtonEdit" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Editar Registro"><span class="fa fa-pencil-square" /></button>
        <a href="{{route('administracion')}}" class="btn btn-primary"><i class="fa fa-minus-circle" aria-hidden="true"></i> Borrar</a>
        <button id="ButtonDel" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Borrar Registro"><span class="fa fa-times" /></button>
        <button id="ButtonMasInfo" class="btn btn-outline-secondary" onclick="Fx_CambiarLabel(labelInfo)" type="button" data-toggle="collapse" data-target="#collapseMasInformacion" aria-expanded="false" aria-controls="collapseMasInformacion">

            <i class="fa fa-search" aria-hidden="true"></i>
            <span id="labelInfo">Mostrar Filtros</span>
	</button>
    </div>
   {!! Form::close() !!}
   
   <table id="example" class="display" width="100%"></table>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="http://localhost/rop/public/assets/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{!!$obj_bitacora->render()!!}

<script>
    var dataSet = [
    @foreach($obj_bitacora as $obj_item)
        ["{{ $obj_item->id_bitacora }}", "{{ $obj_item->ip_dispositivo }}", "{{ $obj_item->usuario->nombres_usuario }} {{ $obj_item->usuario->apellidos_usuarios }}", "{{ $obj_item->fecha_hora_transaccion }}", "{{ $obj_item->transaccion_realizada }}"],
    @endforeach
];

   </script>
   <div class="panel-footer">
         * Campo requerido
    </div>
</div>

        <script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        data: dataSet,
        "columnDefs": [
	{"targets": [ 0 ], "visible": false, "searchable": false} ,
	{"targets": [ 1 ], "visible": true, "searchable": true} ,
	{"targets": [ 2 ], "visible": true, "searchable": true} ,
	{"targets": [ 3 ], "visible": true, "searchable": true} ,
        {"targets": [ 3 ], "visible": true, "searchable": true} 
	        ],
        columns: [
            { title: "id" },
            { title: "IP Dispositivo" },
            { title: "Nombre Usuario" },
            { title: "Fecha" },
            { title: "Transaccion Realizada" }
        ],
    // Configuracion de los Objetos
    "dom": "<'row'<'col-sm-12'tr>>",
    "select":   "single"
    } );
    
		$("#ButtonEdit").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('administracion/editar_bitacora')}}/"+l_Item; 
                                alert(l_RecursoURL);
                                window.location.href = l_RecursoURL;
				 
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );

                $("#ButtonDel").click( function () {
			try {
				var l_RecursoURL = "{{route('administracion/borrar_bitacora','')}}";  
				var l_Item = table.row(".selected").data()[0]; 
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
				return;
			}
		swal
		({
		  title: "¿Desea Eliminar el Registro?",
		  text: "Una vez Eliminado, No podra ser Recuperado",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) 
		  {
	 
			// Call Web API to get a list of Product
			$.ajax({
				url: l_RecursoURL+"/"+l_Item,
				type: "GET",
			success: function (respuesta)
			{
                            table.row(".selected").remove().draw( false );
			  	swal(
			  	{
			  	title: "Registro Eliminado", 
			  	text: "Id de registro "+l_Item+" "+respuesta, 
			  	icon: "success", 
				buttons: false,
				timer: 3000 
				}); 
                            setTimeout(location.reload(), 100000);
    
                        },
                        
			error: function (request, message, error)
			{ handleException(request, message, error);}
			   
			 }); 
	 
		  } else 
		  {
			swal({title: "Operacion Cancelada", text: "Id de registro "+l_Item, icon:"error", buttons: false, timer:3000});
		  }
		});
						
	    } );
            
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
} );
            
            

        </script>

	<script>
	function Fx_CambiarLabel(a_object)
	{
		a_object.innerHTML=a_object.innerHTML=="Mostrar Filtros"?"Ocultar Filtros":"Mostrar Filtros";
	}
	</script>

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
