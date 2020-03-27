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
<p ALIGN=center>index_tablagen.blade.php</p>
@stop
@section('nombre_pantalla')
<h4 class="text-center">{{ $obj_param->nombre }}</h4>
@stop
@section('contenido')
<div class="panel panel-default">
    {!! Form::open(['route' => 'administracion/index_tablagen','autocomplete'=>'off']) !!}
    <div class="collapse" id="collapseMasInformacion">
    <div class="panel-body">
        {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
      <input type="hidden" id="id_template" name="id_template" value="{{ $obj_filtro }}">
      <table class="table table-condensed">
        @foreach($obj_param->filtro['name_col'] as $obj_idx=>$obj_col)
            @if(count($obj_param->filtro['name_col']) > 0)
                <tr>
                    <td>{{ $obj_param->filtro['label_col'][$obj_idx] }}</td>
                    <td>
                    @if ($obj_param->filtro['type_col'][$obj_idx] == 'text' )
                        {!!Form::text($obj_col,null,['class'=>'form-control', 'placeholder'=>$obj_col])!!}
                    @elseif ($obj_param->filtro['type_col'][$obj_idx] == 'number' )
                        {!!Form::number($obj_col,null,['class'=>'form-control', 'placeholder'=>$obj_col])!!}
                    @elseif ($obj_param->filtro['type_col'][$obj_idx] == 'select' )
                        <select name="id_anio" placeholder="id_anio" class="form-control" >
                            <option value="" >-- Seleccionar -- </option>
                            @foreach(\App\Models\anio::all() as $obj_item)
                                <option value="{{ $obj_item->id_anio }}">{{ $obj_item->descripcion_anio }}</option>
                            @endforeach
                        </select>
                    @endif
                    </td>
                </tr>
            @endif
        @endforeach
     </table>
    </div>
        
        </div>
    <div>
        <a href="{{route('administracion')}}" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Regresar</a>
        <a href="{{route('administracion/create_tablagen')}}/{{ $obj_filtro }}" class="btn btn-primary"><span class="fa fa-plus-circle" /> Adicionar</a>
        <button id="ButtonEdit" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Registro"><span class="fa fa-pencil-square-o" /> Editar</button>
        <button id="ButtonDel" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Borrar Registro"><span class="fa fa-times" /> Eliminar</button>
        <button id="ButtonMasInfo" class="btn btn-primary" onclick="Fx_CambiarLabel(labelInfo)" type="button" data-toggle="collapse" data-target="#collapseMasInformacion" aria-expanded="false" aria-controls="collapseMasInformacion">

        <i class="fa fa-search" aria-hidden="true"></i>
        <span id="labelInfo">Mostrar Filtros</span>
	</button>
    </div>
   {!! Form::close() !!}

   <table id="example" class="display" width="100%"></table>
    {!!$obj_tabla->render()!!}

<script>
    var dataSet = [
    @foreach($obj_tabla as $obj_item)
        [
        @if(count($obj_param->columns['name_col']) > 0)
            @foreach($obj_param->columns['name_col'] as $col)
                @if ($col === 'id_municipio')
                    "{{ $obj_item->get_municipio['nombre_municipio'] }}",
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


        // Ordenado por defecto
	"order": [
        @if(count($obj_param->columns['name_col']) > 0)
            @foreach($obj_param->columns['order_col'] as $obj_order)
                [{{$obj_order}}, "asc"],
            @endforeach
        @endif
        ],

        "columnDefs": [
        @if(count($obj_param->columns['name_col']) > 0)
            @foreach($obj_param->columns['display_col'] as $obj_idx=>$obj_col)
            {"targets": [ {{ $obj_idx }} ], "visible":@if ($obj_col) true @else false @endif},
            @endforeach
        @endif
	        ],
        "columns": [
        @foreach($obj_param->columns['label_col'] as $obj_title)
            { title: " {{ $obj_title }}" },
        @endforeach
        ],
    // Configuracion de los Objetos
    "dom": "<'row'<'col-sm-12'tr>>",
    "select":   "single"
    } );
    
                
		$("#ButtonEdit").click( function () {
			try {
	  			var l_Item = table.row(".selected").data()[0];
	  			var l_RecursoURL = "{{route('administracion/edit_tablagen')}}/{{ $obj_filtro }}/"+l_Item;

                                window.location.href = l_RecursoURL;
			}
			catch(err) {
				swal({title: "Click en una fila para seleccionar", text: "Operacion Cancelada", icon:"error", buttons: false, timer:3000});
			}
		} );

                $("#ButtonDel").click( function () {
			try {
				var l_RecursoURL = "{{route('administracion/delete_tablagen',$obj_filtro)}}";  
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
