<!--Boton de ayuda-->
    <a href="#ayuda" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">EDITAR INDICADOR</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                                <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p>Para crear un nuevo indicador realice lo siguiente:</p>
                            </td>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>
                                <ol>
                                    <li><strong>Evento </strong>: Seleccione el evento de la lista desplegable.</li>
                                    <li><strong>Código indicador</strong>: Generado por el sistema.</li>
                                    <li><strong>Descripción</strong>: Digite la descripción del indicador.</li>
                                    <li><strong>Numerador</strong>: Seleccione de la lista desplegable el componente que representa el numerador(ver archivo de datos).</li>
                                    <li><strong>Denominador</strong>: Seleccione de la lista desplegable el  componente que representa el denominador(Ver archivo de datos).</li>
                                    <li><strong>Tipo de indicador</strong>: Seleccione de la lista desplegable el tipo de indicador a crear.</li>
                                    <li><strong>Multiplicador</strong>: Digite la cantidad para calcular el indicador</li>
                                </ol>
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
<!--FIN  Boton de ayuda-->