{{--
 * Nombre del archivo: ayuda_busca_color.blade.php
 * Descripción: ayuda para la pantalla de buscar ubicacion
 * Fecha de creación:28/12/16
 * Creado por: Yamileth Campos
 *  
 * Modificado por: Karla Barrera 
 * Fecha modificación: 11/01/2017
 * Descripción: redacción y comentarios
 --}}
 
 <!--Boton de ayuda-->
    <a href="#buscaubicacion" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscaubicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR COLOR</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> La pantalla contiene los siguientes elementos:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>                            
                                <ul>
                                    
                                    <li><strong>Filtros</strong>: para realizar la b&uacute;squeda llene el campo de  <strong>Nombre de color </strong> presione luego en el bot&oacute;n "Buscar"</li>
                                    <li> <strong>Opciones</strong>: las opciones que puede realizar se encuentran al lado derecho de cada uno de los registros.
                                        <ul>
                                            <li>El bot&oacute;n color naranja con un l&aacute;piz es  para "Editar", y</li>
                                            <li>El rojo con una equis es para "Eliminar"</li>
                                        </ul>
                                     </li>
                                    <li>  Se despliegan todos los colores registrados en el sistema, donde puede moverse a trav&eacute;s del paginador</li>
                                    <li> El bot&oacute;n <strong>Regresar</strong> vuelve a la p&aacute;gina en que estaba anteriormente.</li>
                                    <li> El bot&oacute;n <strong>Ayuda</strong> muestra  la descrici&oacute;n de la pantalla</li>
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
