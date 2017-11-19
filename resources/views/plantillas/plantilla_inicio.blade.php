<!doctype html>
<!--
     * Nombre del archivo: plantilla_inicio.blade.php
     * Descripción:
     * Fecha de creación:11/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
<html lang="es" xml:lang="es"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="905; URL=/sicafam/public/">
   
    <title>@yield('title')</title>
    @section('head')
       <link rel="stylesheet" type=text/css href="{{asset('assets/css/bootstrap.css')}}" />
       <link rel="stylesheet" type=text/css href="{{asset('assets/css/bootstrap.min.css')}}" />
       <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
    @show    
</head>
<body>
     <div class="container-fluid">
	<div class="row"><!--Encabezado -->
		<div class="col-md-12">
                    <img alt="Bootstrap Image Preview" src="{{asset('images/encabezado.png')}}" width="100%">
		</div>
	</div>
	<div class="row"><!--fecha -->
		<div class="col-md-12">
                    @yield('fecha_sistema') 		
		</div>
		
	</div>	
	<div class="row"><!--nombre de la pantalla -->
		<div class="col-md-12">
                    @yield('nombre_pantalla')
			
		</div>
	</div>

	<div class="row">
		<div class="col-md-12"><!--area de trabajo -->                    
                   
			<div class="row"><!--filtros -->
				<div class="col-md-12">
                                    @yield('filtros_consulta') 
				
				</div>
			</div>
			<div class="row"><!--contenido -->
				<div class="col-md-12">
                                    @yield('contenido') 
							
			</div>
			</div>
			<div class="row"><!--botones -->
				<div class="col-md-12">
                                    @yield('botones') 
				
				</div>
			</div>
		</div>	           
	</div>        
	<div class="row"><!--pie de pagina -->             
	     <div class="col-md-12">  
             @yield('pie_pagina')
	     </div>
	</div>
	</div>
    
</body>

