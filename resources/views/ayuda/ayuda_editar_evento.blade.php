<!--Boton de ayuda-->
    <a href="#ayuda" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">EDITAR EVENTO</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para crear un nuevo evento:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li><strong>Código</strong>: Para el codigo utilizar el CIE-10 con un maximo de 20 caracteres.</li>
                                    <li><strong>Nombre de evento</strong>: Digitar el nombre del evento epidemiológico con un maximo de 20 caracteres.</li>
                                    <li><strong>Descripción</strong>: Digite la descripción del evento epidemiológico con un maximo 100 caracteres.</li>
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
<!--FIN Boton  de ayuda-->
        
