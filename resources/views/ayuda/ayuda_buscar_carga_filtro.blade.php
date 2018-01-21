<!--Boton de ayuda-->
    <a href="#ayuda" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR CARGA DE ARCHIVO</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="../images/informativo.png" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para realizar una b&uacute;squeda de carga de archivos:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>Se desplegan todos los archivo de datos, donde puede moverse a trav&eacute;s del paginador <img src="../images/paginador.jpg"/>
                                <ul>
                                    <li> Para realizar la b&uacute;squeda de la carga de archivo <strong>seleccione el evento</strong> y seleccione  <strong> el indicador </strong>,   presione luego en el bot&oacute;n <strong>Buscar</strong></li>
                                </ul>
                            </td>
                            </tr>
                    </table>  
                        <table class="table table-striped table-bordered">
                            <tr>
                              <td><a class="btn btn-primary"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> </a></td> 
                              <td>Carga los datos del archivo fuente en la base de datos</td>
                            </tr>
                            <tr>
                              <td><a class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>  
                              <td>Edita la carga de archivo</td>
                            </tr>
                            <tr>
                               <td><a class="btn btn-warning"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td> 
                               <td>Descarga el archivo de datos</td>
                            </tr>
                            <tr>
                               <td><a  class="btn btn-danger"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a></td> 
                               <td>Borra el archivo de datos y los datos cargados en la base de datos</td>
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
<!--FIN Boton de  ayuda-->
