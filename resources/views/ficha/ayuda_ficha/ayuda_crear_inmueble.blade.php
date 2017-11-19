<!--
 * Nombre del archivo: ayuda_crear_inmueble.blade.php
 * Descripción: ayuda para la pantalla de nueva_ficha_inmueble
 * Fecha de creación: 29/12/16
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#nuevoinm" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="nuevoinm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"> <!---div class="modal-dialog">-->
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
                                    <li><strong> Departamento</strong>: Elegir de la lista desplegable el departamento en que se encuentra el inmueble, por defecto tiene San Salvador.</li>                                    
                                    <li><strong> Muncipio</strong>: Elegir de la lista desplegable el municipio, por defecto es Mejicanos.</li>
                                    <li><strong> Unidad o departamento</strong>: Debe elegir de la lista desplegable la unidad a la que esta asignada ese inmueble. </li>
                                    <li><strong> Nombre del Responsable</strong>: ****.</li>                                                                        
                                    <li><strong> Fuente de Financiamiento</strong>: Se elige la fuente de financiamiento con que es adquirido.</li>
                                    <li><strong> Ubicaci&oacute;n del bien</strong>: Representa la localizaci&oacute;n donde se encuentra el bien inmueble.</li>
                                    <li><strong> Tipo del Bien</strong>: Representa el tipo del bien, tiene dos opciones: "R&uacute;tico" y "Con construcci&oacute;n".</li>
                                    <li><strong> Cuenta Contable</strong>: Es la cuenta que le es asignada por contabilidad.</li>
                                    <li><strong> Descripci&oacute;n</strong>: Puede describir aspectos relevantes que considere convenientes.</li>
                                    <li><strong> Cuenta Depreciaci&oacute;n</strong>: Es la cuenta que le es asignado al inmueble para realizar depreciaci&oacute;n  .</li>
                                    <li><strong> Tipo de documento</strong>: Registrar el tipo de documento de propiedad.</li>
                                    <li><strong> No de registro de ra&iacute;z e  hipoteca</strong>: N&uacute;mero de registro de ra&iacute;z e hipoteca.</li>
                                    <li><strong> A&ntilde;os vida &uacute;til</strong>: Est&aacute; regulado seg&uacute;n instructivo de bienes muebles e inmuebles secci&oacute;n 3.2, para edificaciones y obras de infraestructura 40 a&ntilde;os, para terrenos no Aplica .</li>
                                    <li><strong> Estado de legalidad</strong>: Elija una opci&oacute;n en la lista desplegable, si el inmueble esta registrado en  el CNR elegir "Inscrito"</li>
                                    <li><strong> Monto de adquisici&oacute;n</strong>: Escriba el valor de adquisici&oacute;n del bien inmueble, est&aacute; es seg&uacute;n factura o documento que ampare la adquisici&oacute;n.</li>
                                    <li><strong> Fecha adquisici&oacute;n</strong>: Registre la fecha de adquisici&oacute;n, est&aacute; es seg&uacute;n factura o documento que ampare la adquisici&oacute;n.</li>                                  
                                    <li><strong> Documento</strong>: Puede adjuntar el documento que ampare la adquisici&oacute;n del inmueble, haga clic en "Seleccionar Archivo" y se abrir&aacute; una ventana emergente que podr&aacute; buscar la ubicaci&oacute;n del documento.</li>                                    
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

