<!-- 
     * Nombre del archivo:consultar_bitacora.blade.php
     * Descripción:
     * Fecha de creación:18/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
@extends('plantillas.plantilla_crud')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
@section('usuario_sesion')
<p ALIGN=right>Usuario:{{ Auth::user()->nombre_usuario }}</p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>index_{{ $obj_param->nombre_plantilla }}.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">{{ $obj_param->nombre_opcion }}</h4>
@stop 
@section('contenido')
<div class="panel panel-default">
   
   <table id="example" class="display" width="100%"></table>
    {!!$obj_tabla->render()!!}
    
<script>
    var dataSet = [
    @foreach($obj_tabla as $obj_item)
        ["{{ $obj_item->id_index_testing }}", "{{ $obj_item->ind_id_index_testing }}", "{{ $obj_item->nombres }}", "{{ $obj_item -> apellidos }}", "{{ $obj_item->get_tipo_pareja->tipo_pareja }}", "{{ $obj_item->get_nivel_riesgo->desc_nivel_riesgo }}", "{{ $obj_item->edad }}", "{{ $obj_item->get_sexo->descripcion_sexo }}", "{{ $obj_item->get_orientacion_sexual->desc_orientacion_sexual }}"],
    @endforeach
];

   </script>
</div>

<button id="ButtonContacPareja" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registro de Intentos de Contactos"><span class="fa fa-users" /> Registro de Intentos de Contactos</button>
<button id="ButtonRefExitosa" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Referencia Exitosa"><span class="fa fa-users" /> Referencia Exitosa</button>
<button id="ButtonViolenciaRelNAP" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Violencia relacionada a NAP"><span class="fa fa-users" /> Violencia relacionada a NAP</button>


        <script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        data: dataSet,
        
	// Configuracion Inicial
	        "paging":   true,
	        "ordering": true,
	        "info":     true,
	        "select":   "single",
			"pagingType": "full_numbers",
			"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'Todos  * ']],
        
        // Idioma por defecto
		"language": {
	            "lengthMenu":		"Mostrando _MENU_ registros por pagina",
	            "zeroRecords":		"No se encontraron registros - revisar",
	            "info":			"Pagina _PAGE_ de _PAGES_ / _MAX_ total de registros",
	            "infoEmpty":		"Registros No Disponibles",
	            "infoFiltered":	"(_TOTAL_ filtrados)",
				// Adicionados
				"emptyTable":		"No hay datos en la tabla",
				"infoPostFix":		"",		// NO disponibles
				"infoThousands":	".",	// NO disponibles
				"decimal": 			".",	// NO disponibles
	           "thousands": 		",",	// NO disponibles
				"loadingRecords": 	"Cargando Registros...",
				"processing":   	"Procesando Registros...",
				"search":			"Buscar",
				"paginate": {
					"first":    	"Primero",
					"previous": 	"<",
					"next":     	">",
					"last":     	"Ultimo"
				},
				"oAria": {
					"sSortAscending":  ": habilitar para ordenar la columna en orden ascendente",
					"sSortDescending": ": habilitar para ordenar la columna en orden descendente"
				},
				select: {
				    rows: {
				        _: "%d filas seleccionadas",
				        0: "(Click en una fila para seleccionar)",
				        1: "(Fila seleccionada)"
				    }
				}
	        },
        "columnDefs": [
    @foreach($obj_param->columns as $obj_idx=>$obj_col)
        {"targets": [ {{ $obj_idx }} ], "visible": {{ $obj_col }}, "searchable": {{ $obj_col }} } ,
    @endforeach
	        ],
        columns: [
    @foreach($obj_param->titles as $obj_title)
            { title: " {{ $obj_title }}" },
    @endforeach
        ],
    
    // Configuracion de los Objetos
        "dom": "<'row'<'col-sm-12 col-md-4 toolbar'><'col-sm-12 col-md-8'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-9'l><'col-sm-12 col-md-3'B>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
    fnInitComplete: function(){
           $('div.toolbar').html(' <div><a href="{{route("roptrimestre/index_indextesting")}}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>  <a href="{{route("roptrimestre/create_pareja")}}/{{ $obj_filtro }}" class="btn btn-primary"><span class="fa fa-plus-circle" /> Adicionar</a>  <button id="ButtonEdit" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Registro"><span class="fa fa-pencil-square-o" /> Editar</button>  <button id="ButtonDel" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Borrar Registro"><span class="fa fa-times" /> Eliminar</button>  </div>  ');
         },

    "select":   "single"
    } );
    
		$("#ButtonRefExitosa").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('roptrimestre/edit_pareja_refexit')}}/"+l_Item;

                                window.location.href = l_RecursoURL;
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );
    
		$("#ButtonViolenciaRelNAP").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('roptrimestre/edit_pareja_viorelnap')}}/"+l_Item;

                                window.location.href = l_RecursoURL;
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );
    
		$("#ButtonContacPareja").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('roptrimestre/index_contactarpareja')}}/"+l_Item;

                                window.location.href = l_RecursoURL;
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );
                
		$("#ButtonEdit").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('roptrimestre/edit_pareja')}}/"+l_Item;

                                window.location.href = l_RecursoURL;
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );

                $("#ButtonDel").click( function () {
			try {
				var l_RecursoURL = "{{route('roptrimestre/delete_pareja','')}}";  
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
