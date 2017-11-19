<!--
 * Nombre del archivo: ayuda_buscar_ubicacion.blade.php
 * Descripción: ayuda para la pantalla de buscar ubicacion
 * Fecha de creación:28/12/16
 * Creado por: Yamileth Campos
 -->
 
 <!--Boton de ayuda-->
    <a href="#buscaubicacion" class="btn btn- btn-primary" data-toggle="modal">Ayuda</a>
        <div class="modal fade" id="buscaubicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!---div class="modal-dialog">-->
                <div class="modal-content"> 
                    <!--header de la ventana-->
                    <div class="modal-header">                    
                        <p class="modal-title">BUSCAR UBICACION</p>
                    </div>
                    <!-- Contenido de la ventana -->
                    <div class="modal-body">
                    <table> 
                        <tr>
                            <td>
                               <img src="{{asset('images/informativo.png')}}" alt="informativo"/>
                            </td>
                            <td>
                                <p> Esta pantalla contiene los siguientes elementos:</p>
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <p><font color="white">...</font></p>
                            </td>
                            <td>                                
                                <ul>
                                    <li> <strong>Filtros</strong>: puede realiar busquedas especificas, por medio de <strong> C&oacute;digo, Nombre de la unidad/depto. y Responsable.</strong></li>                                    
                                    <li><strong>Listado de ubicaciones</strong>: se muestra una lista de elementos ordenados por su <strong>C&oacute;digo</strong> seg&uacute;n se hayan creado, el nombre de la unidad/depto., el responsable, y si el edificio donde se encuentran es alquilado.</li>
                                    <li><strong>Opciones</strong>: las opciones que tendr&aacute; disponibles son <strong>Editar</strong> y <strong>Eliminar</strong> </li>
                                    <li><strong>&Aacute;rea de botones</strong>: se mostrar&aacute; un <strong>paginado</strong> de 10 elementos por p&aacute;gina, el bot&oacute;n <strong>regresar</strong> lo llevar&aacute; a la p&aacute;gina que anteriormente estaba, y el bot&oacute;n <strong>ayuda</strong> abrir&aacute; una ventana emergente que describe los elementos de la pantalla.</li>
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
