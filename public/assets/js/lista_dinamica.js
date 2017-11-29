/* 
 * Nombre del archivo:lista_dinamica.js
 * Descripción:Función que actualiza la lista de eventos y archivos fuentes
 * Fecha de creación:25/11/2017
 * Creado por: Juan Carlos Centeno Borja
 */
$(document).ready(function(){
		$('#eventos').change(function(event){
			$.get("../codigo/"+event.target.value+"",
			{ option: $(this).val() },
			function(data) {
				$('#codigos').empty();
				$.each(data, function(key, element) 
                                {
				$('#codigos').append("<option value='" + key + "'>" + element + "</option>");
				});
			});
		});
	});