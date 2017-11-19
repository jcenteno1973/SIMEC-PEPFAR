<!--
 * Nombre del archivo: ayuda_crear_vehiculo.blade.php
 * Descripción: ayuda para la pantalla de nueva_ficha_vehiculo
 * Fecha de creación: 29/12/16
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#nuevom" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="nuevom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">Nueva ficha veh&iacute;culo</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para registrar un nuevo bien mueble debe completar la siguiente informacion:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>                                
                                <ul>
                                    <li> <strong> Departamento</strong>: Elegir de la lista desplegable el departamento en que se encuentra el bien mueble, por defecto tiene San Salvador.</li>                                    
                                    <li><strong> Muncipio</strong>: Elegir de la lista desplegable el municipio, por defecto es Mejicanos.</li>
                                    <li><strong> Unidad o departamento</strong>: Debe elegir de la lista desplegable la unidad a la que est&aacute; asignada el bien mueble. </li>
                                    <li><strong> Clase de bien</strong>: Elija la clase de bien a la que pertenece, para el caso "Mueble".</li>
                                    <li><strong> Fuente de Financiamiento</strong>: Se elige la fuente de financiamiento con que es adquirido.</li>
                                    <li><strong> Tipo Bienes</strong>: Representa el tipo del bien, Elija en la lista desplegable una opci&oacute;n.</li>
                                    <li><strong> Cuenta Contable</strong>: Es la cuenta que le es asignada por contabilidad.</li>
                                    <li><strong> Cuenta Depreciaci&oacute;n</strong>: Es la cuenta que le es asignado al bien mueble para realizar depreciaci&oacute;n  .</li>
                                    <li><strong> Estado</strong>: Representa el estado del bien mueble, Activo o Inactivo .</li>
                                    <li><strong> Descripci&oacute;n</strong>: Puede describir aspectos relevantes que considere convenientes.</li>
                                    <li><strong> Marca </strong>: Registre de la marca del bien mueble.</li>
                                    <li><strong> Modelo</strong>: Registre el modelo del bien mueble.</li>
                                    <li><strong> Color</strong>: Elija un color de la lista desplegable.</li>
                                    <li><strong> Serie</strong>: Registre la serie del bien mueble.</li>
                                    <li><strong> N&uacute;mero de factura</strong>: Digitar el n&uacute;mero de factura que ampare la adquisici&oacute;n del bien mueble, o n&uacute;mero de documento que ampare la adquisici&oacute;n.</li>
                                    <li><strong> Nombre del Responsable</strong>: ****.</li>
                                    <li><strong> Monto de adquisici&oacute;n</strong>: Escriba el valor de adquisici&oacute;n del bien mueble, est&aacute; es seg&uacute;n factura o documento que ampare la adquisici&oacute;n.</li>
                                    <li><strong> Fecha adquisici&oacute;n</strong>: Registre la fecha de adquisici&oacute;n, est&aacute; es seg&uacute;n factura o documento que ampare la adquisici&oacute;n.</li>
                                    <li><strong> Imagen</strong>: Puede adjuntar una imagen para una mejor identificacion del bien mueble, haga clic en "Seleccionar Archivo" y se abrir&aacute; una ventana emergente que podr&aacute; buscar la ubicaci&oacute;n de imagen.</li>
                                    <li><strong> A&ntilde;os vida &uacute;til</strong>: Est&aacute; regulado seg&uacute;n instructivo de bienes muebles e inmuebles secci&oacute;n 3.2, para edificaciones y obras de infraestructura 40 a&ntilde;os, para terrenos no Aplica .</li>
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

