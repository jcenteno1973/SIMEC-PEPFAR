<!--
 * Nombre del archivo: ayuda_editar_inmueble.blade.php
 * Descripcion: ayuda para la pantalla de editar_inmueble
 * Fecha de creacion: 10/01/17
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#editainm" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="editainm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">EDITAR FICHA INMUEBLE</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> En la pantalla de editar inmueble, se encuentran los siguientes elementos:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>                                
                                <ul>
                                    <li>Los elementos que no pueden ser modificacos son los siguientes:
                                        <ul>
                                        <li><strong> Id</strong>: N&uacute;mero correspondiente a la base de datos.</li>                                    
                                        <li><strong> C&oacute;digo de inventario</strong>: C&oacute;digo asignado para el activo fijo seg&uacute;n inventario.</li>                                    
                                        <li><strong> Cuenta de depreciaci&oacute;n</strong>: N&uacute;mero correspondiente a la base de datos.</li>                                    
                                        </ul>
                                    </li>
                                    <li> Elementos que pueden ser modificados:
                                        <ul>
                                            <li><strong> Cuenta contable</strong> a la que pertenece el activo,<strong> Descripci&oacute;n</strong>, 
                                                <strong> Nombre del responsable</strong>, <strong>Tipo de documento</strong>, 
                                                <strong>No de registro de ra&iacute;z e hipoteca</strong>, <strong>a&ntilde;os de vida &uacute;til</strong>, 
                                                <strong>Estado de legalidad</strong>, <strong>Monto de adquisici&oacute;n</strong>, 
                                                <strong>Fecha de adquisici&oacute;n</strong>, <strong>Documento</strong> adjunto,
                                                <strong>Observaciones</strong>.
                                            </li>                                    
                                        
                                        </ul>
                                    </li>
                                    <li>Botones:
                                        <ul>
                                            <li><strong>Guardar</strong>: Hacer clic sobre este bot&oacute;n para mantener los cambios realizados.</li>                                                                                     
                                            <li><strong>Regresar</strong>: Va a  la p&aacute;gina anterior.</li>
                                            <li><strong>Ayuda</strong>: Despliega la descripci&oacute;n de la pantalla actual.</li>
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


