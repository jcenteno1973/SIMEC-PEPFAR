<!--Boton de ayuda-->
    <a href="#ingresosistema" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ingresosistema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">REPORTES</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para generar un reporte siga los siguientes pasos:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ol>
                                    <li><strong>Evento</strong>: Seleccione el evento de la lista desplegable</li>
                                    <li><strong>Indicador</strong>: Seleccione el indicador de la lista desplegable</li>
                                    <li><strong>Generar reporte</strong>: Carga el reporte del indicador seleccionado</li>
                                </ol>
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