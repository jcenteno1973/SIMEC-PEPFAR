<!--Boton de ayuda-->
    <a href="#ayuda" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <li><strong>Nombres </strong>: los nombres del usuario.</li>
                                    <li><strong>Apellidos</strong>: los apellidos del usuario.</li>
                                    <li><strong>Rol</strong>: Especifica a que tendra acceso en el sistema.</li>
                                    <li><strong>Correo electr&oacute;nico</strong>: muy importante para recuperacion de contrase&ntilde;as.</li>
                                    <li><strong>Contrase&ntilde;a</strong>: Debe contener una letra mayuscula, numeros y un caracter especial.</li>
                                    <li><strong>País</strong>: Seleccione el país al que pertenece .</li>
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
<!--FIN Boton  de ayuda-->
        
