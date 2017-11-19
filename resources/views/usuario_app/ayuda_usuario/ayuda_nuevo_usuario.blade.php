<!--Boton de ayuda-->
    <a href="#creausuario" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="creausuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">CREAR USUARIO</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para crear un usuario realice lo siguiente:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li><strong>Nombres </strong>: Escriba los nombres del usuario.</li>
                                    <li><strong>Apellidos</strong>: Escriba los apellidos del usuario.</li>
                                    <li><strong>Unidad o departamento</strong>: La Unidad o departamento al que pertenece.</li>
                                    <li><strong>Rol</strong>: Especifica a que tendra acceso en el sistema.</li>
                                    <li><strong>Correo electr&oacute;nico</strong>: muy importante para recuperacion de contrase&ntilde;as.</li>
                                    <li><strong>Contrase&ntilde;a</strong>: Debe contener una letra mayuscula, numeros y caracter especial.</li>
                                    <li><strong>Cargo</strong>: el cargo que desempe&ntilde;a actualmente el usuario.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p ><font color="white">...</font></p>
                            </td>
                            <td>
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
        

