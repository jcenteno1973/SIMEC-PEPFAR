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
<p ALIGN=right>{{ Auth::user()->get_hospital->nombre_hospital }} | Usuario:<a href="{{route('administracion/user_cambiar_contrasenia')}}">{{ Auth::user()->nombre_usuario }}</a></p>
@stop
@section('nombre_plantilla')
<p ALIGN=center>index_{{ $obj_param->nombre_plantilla }}.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center animated zoomIn">{{ $obj_param->nombre_opcion }}</h4>
@stop 
@section('contenido')
<div class="panel panel-default animated fadeInUp">

   <table id="example" class="display" width="100%"></table>
    {!!$obj_tabla->render()!!}

<script>
    var dataSet = [
    @foreach($obj_tabla as $obj_item)
        [
        @if(count($obj_param->def_columns['name_col']) > 0)
            @foreach($obj_param->def_columns['name_col'] as $col)
                @if ($col === 'id_poblacion_clave')
                    "{{ $obj_item->get_poblacion_clave['descripcion_poblacion_clave'] }}",
                @elseif ($col === 'id_tipo_diagnostico')
                    "{{ $obj_item->get_tipo_diagnostico['tipo_diagnostico'] }}",
                @elseif ($col === 'id_cascada')
                    "{{ $obj_item->get_cascada['descripcion_cascada'] }}",
                @elseif ($col === 'id_cascada_cv')
                    "{{ $obj_item->get_cascada_cv['desc_cascada_cv'] }}",
                @elseif ($col === 'id_tratamiento')
                    "{{ $obj_item->get_tratamiento['desc_tratamiento'] }}",
                @elseif ($col === 'id_tratamiento_tb')
                    "{{ $obj_item->get_tratamiento_tb['desc_tratamiento_tb'] }}",
                @elseif ($col === 'id_inicio_tratamiento')
                    "{{ $obj_item->get_inicio_tratamiento['descripcion_inicio_tratamiento'] }}",
                @elseif ($col === 'id_prueba_diagnostica_tb')
                    "{{ $obj_item->get_prueba_diagnostica_tb['desc_prueba_diagnostica_tb'] }}",
                @elseif ($col === 'id_embarazo_lactancia')
                    "{{ $obj_item->get_embarazo_lactancia['desc_embarazo_lactancia'] }}",
                @elseif ($col === 'id_anio')
                    "{{ $obj_item->get_anio['descripcion_anio'] }}",
                @elseif ($col === 'id_periodo')
                    "{{ $obj_item->get_periodo['descripcion_periodo'] }}",
                @elseif ($col === 'id_periodo_prueba')
                    "{{ $obj_item->get_periodo_prueba['descripcion_periodo_prueba'] }}",
                @elseif ($col === 'id_prueba')
                    "{{ $obj_item->get_prueba['descripcion_prueba'] }}",
                @elseif ($col === 'id_rango_edad')
                    "{{ $obj_item->get_rango_edad['descripcion_rango_edad'] }}",    
                @elseif ($col === 'id_rango_edad_etario')
                    "{{ $obj_item->get_rango_edad_etario['rango_edad_etario'] }}",
                @elseif ($col === 'id_sexo')
                    "{{ $obj_item->get_sexo['descripcion_sexo'] }}",
                @elseif ($col === 'id_semana')
                    "{{ $obj_item->get_anio_semana['semanatexto'] }}",
                @elseif ($col === 'id_unidad_atencion')
                    "{{ $obj_item->get_unidad_atencion['nombre_unidad_atencion'] }}",
                @elseif ($col === 'id_hospital')
                    "{{ $obj_item->get_hospital['nombre_hospital'] }}",
                @elseif ($col === 'id_resultado_incidencia')
                    "{{ $obj_item->get_resultado_incidencia['resultado_incidencia'] }}",
                @elseif ($col === 'id_dispensacion_tar')
                    "{{ $obj_item->get_dispensacion_tar['dispensacion_tar'] }}",
                @elseif ($col === 'id_seguimiento_tar')
                    "{{ $obj_item->get_seguimiento_tar['desc_seguimiento_tar'] }}",
                @elseif ($col === 'col_numdeno')
                    "{{ $obj_item->valor_numerador }} {{$obj_item->valor_denominador }} @if ($obj_item->valor_numerador >0) numerador @else denominador @endif",
                @elseif ($col === 'col_sitesting')
                    @if ($obj_item['id_indicador'] == "2")
                        "ofrecen",
                    @elseif ($obj_item['id_indicador'] == "3")
                        "aceptan",
                    @else
                        "NO DEFINIDO",
                    @endif
                @else
                    "{{ $obj_item[$col] }}",
                @endif
            @endforeach
        @endif
        ],
    @endforeach
];

   </script>
</div>

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
           $('div.toolbar').html(' <div><a href="{{route("roptrimestre")}}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>  <a href="{{route("roptrimestre/create_datos")}}/{{ $obj_filtro }}" class="btn btn-primary"><span class="fa fa-plus-circle" /> Adicionar</a>  <button id="ButtonEdit" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Registro"><span class="fa fa-pencil-square-o" /> Editar</button>  <button id="ButtonDel" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Borrar Registro"><span class="fa fa-times" /> Eliminar</button>  </div>  ');
         },

    "select":   "single"
    } );
    
                
		$("#ButtonEdit").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('roptrimestre/edit_datos')}}/"+l_Item;

                                window.location.href = l_RecursoURL;
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );

                $("#ButtonDel").click( function () {
			try {
				var l_RecursoURL = "{{route('roptrimestre/delete_datos','')}}";  
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
