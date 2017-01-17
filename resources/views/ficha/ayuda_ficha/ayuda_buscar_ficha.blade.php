<!--
 * Nombre del archivo: ayuda_buscar_ficha.blade.php
 * Descripcion: ayuda para la pantalla de buscar_ficha
 * Fecha de creacion: 05/01/17
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#buscarficha" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscarficha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR FICHA</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> En la pantalla de busqueda encontrar&aacute; los siguientes elementos:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>                                
                                <ul>
                                    <li><strong> Filtros</strong>: Puede realizar b&uacute;squedas espec&iacute;ficas, por <strong>c&oacute;digo de inventario</strong>, <strong>unidad o departamento</strong>, y/o <strong>Tipo inventario.</strong>; al elegir las opciones de la b&uacute;squedas haga clic el bot&oacute;n "Buscar".</li>                                    
                                    <li><strong>Lista de resultados:</strong>: Se listan las fichas de activos fijos, mostrando 10 elementos por p&aacute;gina
                                        ordenados por <strong>ID</strong>, <strong>Descripci&oacute;n</strong> del activo fijo, 
                                        la <strong>Unidad/departamento</strong> a la que pertenece, y puede 
                                        <strong>Seleccionar</strong> una ficha en la que podr&aacute; realizar acciones utilizando los botones de la parte inferior; 
                                        <strong>Paginador</strong>  <img src="{{asset('images/paginador2.jpg')}}"/> utilizar para ver m&aacute;s resultados.</li>
                                    <li><strong> Botones</strong>: 
                                        <ul>
                                            <li><strong>Editar</strong>: Este nos llevar&aacute; a una pantalla donde podremos modificar la ficha seleccionada.</li>                                          
                                            <li><strong>Generar reporte</strong> Genera el reporte de la ficha seleccionada.</li>
                                            <li><strong>Calcular depreciaci&oacute;n</strong>: Realiza el proceso de c&aacute;lculo de la depreciaci&oacute;n.</li>
                                            <li><strong>Ver ficha</strong>: muestra los datos que corresponden a la ficha de activo fijo seleccionado.</li>
                                            <li><strong>Ayuda</strong>: despliega la descripci&oacute;n de la pantalla actual.</li>
                                            <li><strong>Regresar</strong>: va a  la p&aacute;gina anterior.</li>
                                        </ul> 
                                    </li>                                        
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

