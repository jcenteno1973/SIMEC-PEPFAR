<!--
 * Nombre del archivo: ayuda_nueva_ubicacion.php
 * Descripción: ayuda para la pantalla de crear nueva ubicacion
 * Fecha de creación:28/12/16
 * Creado por: Yamileth Campos
 -->
<!--Boton de ayuda-->
    <a href="#nuevaubicacion" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="nuevaubicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">NUEVA UBICACION</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para crear una nueva ubicaci&oacute;n, debe realizar lo siguientes:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li><strong>C&oacute;digo</strong>: Es el c&oacute;digo asignado a la unidad o departamento.</li>
                                    <li><strong>Unidad o departamento </strong>: El nombre de la unidad o departamento.</li>
                                    <li><strong>Responsable</strong>: Nombre del responsable de la unidad o departamento.</li>
                                    <li><strong>Alquilado</strong>: Es para conocer si el edificio donde se encuentra la unidad o departamento es alquilado.</li>
                                    <li><strong>Dentro del inmueble</strong>:  indicar si la unidad o departamento esta dentro de la alcaldía.</li>
                                    <li><strong>Estado</strong>: la ubicaci&oacute;n esta activa o inactiva.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p ><font color="white">...</font></p>
                            </td>
                            <td>
                                <p>Los campos que contengan un  asterisco (<strong>*</strong>) son obligatorios</p>
                                <p>
                                    Al realizar todos los cambios, debe hacer un clic en el bot&oacute;n "Guardar"<br>
                                    para cancelar los cambios presione "Regresar" y lo llevar&aacute; a la p&aacute;gina que estaba anteriormente.
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
        