<!--Boton de ayuda-->
    <a href="#ingresosistema" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ingresosistema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title"> INGRESO AL SISTEMA</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para realizar el ingreso al sistema:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li>Nombre de usuario, este nombre debe ser proporcionado por el administrador del sistema.</li>
                                    <li>La contrase&ntilde;a,escriba su contre&ntilde;a de ingreso proporcionada por el administrador del sistema,
                                        si no la recuerda puede solicitarla mediante el bot&oacute;n "Solicitar credenciales"</li>
                                    <li>Cancelar: limpia los datos del formulario.</li>
                                    <li>Solicitar credenciales: en caso de olviadar los accesos al sistema podr&aacute; solicitarlos.</li>
                                    <li>Ayuda: muestra una descripci&oacute;n de la pantalla de ingreso</li>
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
        