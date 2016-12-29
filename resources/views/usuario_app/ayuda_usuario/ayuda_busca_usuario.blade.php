
<!--
 * Nombre del archivo: ayuda_busca_usuario.php
 * Descripción: ayuda para la pantalla buscar usuario
 * Fecha de creación:09/12/16
 * Creado por: Yamileth Campos
 -->
 <!--Boton de ayuda-->
    <a href="#ingresosistema" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ingresosistema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR USUARIO</p>
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
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                Se desplegan todos los usuarios del sistema, donde puede moverse a trav&eacute;s del paginador <img src="{{asset('images/paginador.jpg')}}"/>
                                <ul>
                                    <li> Para realizar la b&uacute;squeda de usuarios llene los campos de  <strong>Nombre de usuario </strong> y/o <strong> Rol</strong>,   presione luego en el bot&oacute;n <strong>Buscar</strong></li>                                    
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
        