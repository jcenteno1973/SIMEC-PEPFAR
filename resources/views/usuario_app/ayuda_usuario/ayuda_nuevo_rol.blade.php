<!--Boton de ayuda-->
    <a href="#buscarusuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title"> AYUDA PARA NUEVO ROL</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para crear un nuevo rol:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li><strong>Nombre del rol</strong>: el nombre que le dar&aacute; al nuevo rol.</li>
                                    <li><strong>Descripci&oacute;n</strong>: descripci&oacute;n corta del rol a crear, no m&oacute; de 25 caracteres.</li>
                                    
                                    <li><strong>Botones</strong>:
                                        <ul>
                                            <li>Guardar: ejecutar&aacute; el registro del nuevo rol</li>
                                            <li>Regresar: lo llevar&aacute; a la ventana anterior</li>
                                            <li>Ayuda: Muestra una descripci&oacute;n de los elementos de la pantalla</li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p ><font color="white">...</font></p>
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
        