<!--
 * Nombre del archivo: ayuda_edit_color.blade.php
 * Descripción: ayuda para la pantalla de editar color
 * Fecha de creación:28/12/16
 * Creado por: Yamileth Campos
 -->
<!--Boton de ayuda-->
    <a href="#buscarusuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title"> EDITAR USUARIO</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para realizar la modificaci&oacute;n de usuario usted podrá editar lo siguientes:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    
                                    <li><strong>C&oacute;digo color *</strong>: Es el c&oacute;digo que se utiliza como identificador en la base de datos, este campo no se puede editar.</li>                                     
                                    <li><strong>Nombre color *</strong>: Es el nombre del color.</li> 
                                    <li><strong>Estado *</strong>: El color est&aacute; activo o inactivo.</li>

                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p ><font color="white">...</font></p>
                            </td>
                            <td>
                                <p>Recuerde: Los campos que contengan un  asterisco (<strong>*</strong>) son obligatorios, es decir no pueden quedar en blanco.</p>
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
        