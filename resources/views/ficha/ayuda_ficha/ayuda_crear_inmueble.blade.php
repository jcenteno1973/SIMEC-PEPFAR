<!--
 * Nombre del archivo: ayuda_crear_inmueble.blade.php
 * Descripción: ayuda para la pantalla de nueva_ficha_inmueble
 * Fecha de creación: 29/12/16
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#nuevoinm" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="nuevoinm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">Nueva ficha inmueble</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para registrar un nuevo inmueble debe completar la siguiente informacion:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>                                
                                <ul>
                                    <li> <strong> Departamento</strong>: Elegir de la lista desplegable el departamento en que se encuentra el inmueble, por defecto tiene San Salvador.</li>                                    
                                    <li><strong> Muncipio</strong>: Elegir de la lista desplegable el municipio, por defecto es Mejicanos.</li>
                                    <li><strong> Unidad o departamento</strong>: Debe elegir de la lista desplegable la unidad a la que esta asignada ese inmueble. </li>
                                    <li><strong> Clase de bien</strong>: Elija la clase de bien a la que pertenece, para el caso "Inmueble".</li>
                                    <li><strong> Fuente de Financiamiento</strong>: Se elige la fuente de financiamiento con que es adquirido.</li>
                                    <li><strong> Tipo Bienes</strong>: Representa el tipo del bien, tiene dos opciones: "R&uacute;tico" y "Con construcci&oacute;n".</li>
                                    <li><strong> Cuenta Contable</strong>: Es la cuenta que le es asignada por contabilidad.</li>
                                    <li><strong> Cuenta Depreciaci&oacute;n</strong>: Es la cuenta que le es asignado al inmueble para realizar depreciaci&oacute;n  .</li>
                                    <li><strong> Estado</strong>: Representa el estado del inmueble, Activo o Inactivo .</li>
                                    <li><strong> Descripci&oacute;n</strong>: Puede describir aspectos relevantes que considere convenientes.</li>
                                    <li><strong> Marca </strong>: No aplica.</li>
                                    <li><strong> Modelo</strong>: No aplica.</li>
                                    <li><strong> Color</strong>: No aplica.</li>
                                    <li><strong> Serie</strong>: No aplica.</li>
                                    <li><strong> N&uacute;mero de factura</strong>: Digitar el n&uacute;mero de factura que ampare la adquisici&oacute;n del inmueble, en caso de existir dicho documento.</li>
                                    <li><strong> Nombre del Responsable</strong>: ****.</li>
                                    <li><strong> Monto de adquisici&oacute;n</strong>: .</li>
                                    <li><strong> Fecha adquisici&oacute;n</strong>: .</li>
                                    <li><strong> Imagen</strong>: Puede adjuntar una imagen para una mejor identificacion del inmueble, haga clic en "Seleccionar Archivo" y se abrir&aacute; una ventana emergente que podr&aacute; buscar la ubicaci&oacute;n de imagen.</li>
                                    <li><strong> A&ntilde;os vida &uacute;til</strong>: Est&aacute; regulado seg&uacute;n instructivo de bienes muebles secci&oacute;n 3.2, para edificaciones y obras de infraestructura 40 a&ntilde;os, para terrenos no Aplica .</li>
                                    <li><strong> Observaci&oacute;n</strong>: Puede agregar aspectos que considere necesarios.</li>
                                    
                                    
                                    
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

