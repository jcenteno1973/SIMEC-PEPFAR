<!--
 * Nombre del archivo: ayuda_buscar_ubicacion.php
 * Descripción: ayuda para la pantalla de buscar ubicacion
 * Fecha de creación:28/12/16
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#buscaubicacion" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscaubicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR UBICACION</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para realizar una b&uacute;squeda de usuario:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                Se desplegan todos los usuarios del sistema, donde puede moverse a trav&eacute;s del paginador
                                <ul>
                                    <li> Para realizar la b&uacute;squeda de usuarios llene los campos de  <strong>Nombre de usuario </strong> y/o <strong> Rol</strong>,   presione luego en el bot&oacute;n</li>                                    
                                    <li>el bot&oacute;n <strong>Regresar</strong> vuelve a la p&aacute;gina que anteriormente estaba.</li>
                                </ul>
                                
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
