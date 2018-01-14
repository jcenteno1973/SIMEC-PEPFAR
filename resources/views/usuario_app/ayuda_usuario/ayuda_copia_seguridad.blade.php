<!--Boton de ayuda-->
    <a href="#ingresosistema" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ingresosistema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">ADMINISTRACION COPIAS DE SEGURIDAD</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para administrar las copias de seguridad tiene las siguientes opciones:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ul>
                                    <li><strong>Descargar</strong>: Descarga el archivo zip seleccionado para ser almacenado en medio externo</li>
                                    <li><strong>Borrar</strong>: Borra el archivo zip seleccionado</li>
                                    <li><strong>Crear copia</strong>: Crea archivo zip conteniendo el código fuente y el script de la base de datos</li>
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