<!--Boton de ayuda-->
    <a href="#ayuda" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR EVENTO</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para realizar una b&uacute;squeda de evento:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                Se desplegan todos los eventos, donde puede moverse a trav&eacute;s del paginador <img src="{{asset('images/paginador.jpg')}}"/>
                                <ul>
                                    <li> Para realizar la b&uacute;squeda de evento <strong>digite el código evento</strong> y/o llene el filtro  <strong>nombre evento </strong>,   presione luego en el bot&oacute;n <strong>Buscar</strong></li>                                    
                                    
                                </ul>
                                
                            </td>
                        </tr>                                
                    </table>  
                     <table class="table table-striped table-bordered">
                            
                            <tr>
                              <td><a class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>  
                              <td>Edita el evento epidemiológico</td>
                            </tr>
                           
                            <tr>
                               <td><a  class="btn btn-danger"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span></a></td> 
                               <td>Borra el evento epidemiológico</td>
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
