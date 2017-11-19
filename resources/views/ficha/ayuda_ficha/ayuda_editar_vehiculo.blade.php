<!--
 * Nombre del archivo: ayuda_crear_vehiculo.blade.php
 * Descripcion: ayuda para la pantalla de editar_
 * Fecha de creacion: 10/01/17
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#editav" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="editav" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">Editar ficha veh&iacute;culo</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Para registrar un nuevo veh&iacute;culo debe completar la siguiente informacion:</p>
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
                                            <li><strong> Unidad o departamento</strong>: Es la unidad o departamento a la que esta asignado el veh&iacute;culo.</li>
                                            <li><strong>Cuenta de depreciaci&oacute;n</strong>: Cuenta asignada al activo para depreciaci&oacute;n.</li>
                                        </ul>
                                    </li>
                                    <li> Elementos que pueden ser modificados:
                                        <ul>
                                            <li>
                                                <strong>Nombre del responsable</strong>, <strong>Cuenta contable</strong> a la que pertenece el activo,
                                                 <strong> Descripci&oacute;n</strong>, <strong>Estado</strong>
                                                <strong>Marca</strong>, <strong>Modelo</strong>, <strong>No. de Placa</strong>, <strong>Color</strong>
                                                <strong>No. de Chasis</strong>, <strong>No. de motor</strong>, <strong>a&ntilde;o</strong> del veh&iacute;culo, 
                                                <strong>No de Equipo</strong>, <strong>a&ntilde;os de vida &uacute;tilde</strong>, <strong>N&uacute;mero de factura</strong>,
                                                <strong>Monto de adquisici&oacute;n</strong>,  <strong>Fecha de adquisici&oacute;n</strong>,  <strong>imagen</strong>,  <strong>Observaci&oacute;n</strong>.
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

