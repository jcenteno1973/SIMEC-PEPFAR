<!--Boton de ayuda-->
    <a href="#buscarusuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title"> Ayuda para nuevo rol</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo" class="img-thumbnail"/>                                
                            </td>
                            <td>
                                <p ><font color="white">...</font></p>
                            </td>
                            <td>
                                <p>Para realizar la modificaci&oacute;n de usuario usted podrá editar lo siguientes:</p>
                                <p> Nombres: los nombres del usuario<br>
                                    Apellidos: los apellidos del usuario<br>
                                    Unidad o departamento al que pertenece<br>
                                    Rol: Especifica a que tendra acceso en el sistema<br>
                                    Correo electr&oacute;nico: muy importante para recuperacion de contrase&ntilde;as.<br>
                                    Cargo: el cargo que desempe&ntilde;a actualmente el usuario.
                                </p>
                                <p>
                                    Al finalizar de realizar los cambios, debe hacer un clic en el bot&oacute;n "Guardar cambios"<br>
                                    sino desea realizar ningun cambio, por favor presione "Regresar", para cancelar los cambios
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
        