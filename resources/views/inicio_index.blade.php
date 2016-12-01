
<!-- Nombre del archivo:inicio_index.blade.php
     * Descripción: Pantalla de menú de inicio
     * Fecha de creación:28/11/2016
     * Creado por: KB
-->

@extends('plantillas.plantilla_base')
@section('fecha_sistema')
<p ALIGN=left>Fecha:<?=date('d/m/Y g:ia');?></p>
@stop 
  
@section('nombre_pantalla')
<h4 class="text-center">Pantalla principal</h4>
@stop 

 <!-- 

    <div>
       <!-- {{ HTML::decode(HTML::link('ficha/ficha_buscar.blade.php', HTML::image('/sicafam/public/images/smile.jpg'),array('class'=>'VinculoImg'))) }} -->
  <!--      <a href="{{ Url::('ficha/ficha_buscar.blade.php') target="Ir a módulo fichas"><img src="sicafam/public/images/smile.jpg" /></a>  
    </div>

    -->
