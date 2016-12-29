<!--
 * Nombre del archivo: ayuda_editar_ubicacion.blade.php
 * Descripción: ayuda para la pantalla de editar una ubicacion
 * Fecha de creación:28/12/16
 * Creado por: Yamileth Campos
 -->
<!--Boton de ayuda-->
    <a href="#editubicacion" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="editubicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title"> EDITAR UBICACION</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para realizar la modificaci&oacute;n de una ubicaci&oacute;n, usted podrá editar lo siguientes:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li><strong>Unidad o departamento </strong>: El nombre de la unidad o departamento.</li>
                                    <li><strong>Responsable</strong>: nombre del responsable.</li>
                                    <li><strong>Alquilado</strong>: Si el edificio donde se encuentra la unidad o departamento es alquilado.</li>
                                    <li><strong>Dentro del inmueble</strong>:  indicar si la unidad o departamento esta dentro de la alcaldía o en otro edificio.</li>
                                    <li><strong>Estado</strong>: la ubicaci&oacute;n esta activa o inactiva.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p ><font color="white">...</font></p>
                            </td>
                            <td>
                                <p>El <strong>ID</strong> y <strong>C&oacute;digo</strong>, no se podr&aacute;n editar</p>
                                <p>
                                    Al realizar todos los cambios, debe hacer un clic en el bot&oacute;n "Guardar"<br>
                                    para cancelar los cambios presione "Regresar".
                                </p>
                            </td>
                        </tr>                    
                    </table>  

                    </div>
                    <!--footer de la ventana-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
<!--FIN Boton de ayuda-->
        