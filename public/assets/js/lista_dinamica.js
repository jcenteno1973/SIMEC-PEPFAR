/* 
 * Nombre del archivo:lista_dinamica.js
 * Descripción:Función que actualiza la lista de municipios 
 * Fecha de creación:24/12/16
 * Creado por: Juan Carlos Centeno Borja
 */
$(document).ready(function(){
		$('#departamento').change(function(event){
			$.get("../municipios/"+event.target.value+"",
			{ option: $(this).val() },
			function(data) {
				$('#municipio').empty();
				$.each(data, function(key, element) {
					$('#municipio').append("<option value='" + key + "'>" + element + "</option>");
				});
			});
		});
	});