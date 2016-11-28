<!doctype html>
<!--
     * Nombre del archivo: plantilla_sin_columna.blade.php
     * Descripción:
     * Fecha de creación:11/11/2016
     * Creado por: Juan Carlos Centeno Borja
-->
<html lang="es" xml:lang="es"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @section('head')
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/bootstrap.min.css') !!}
    @show    
</head>
<body>
     <div class="container-fluid">
	<div class="row"><!--Encabezado -->
		<div class="col-md-12">
                    <img alt="Bootstrap Image Preview" src="/sicafam/public/images/encabezado.png" width="100%">
		</div>
	</div>
	<div class="row"><!--fecha-usuario -->
		<div class="col-md-6">
                    @yield('fecha_sistema') 		
		</div>
		<div class="col-md-6">
                    @yield('usuario_sesion') 		
		</div>
	</div>
	<div class="row"><!--menu principal -->
	<div class="col-md-12">
			<nav class="navbar navbar-default navbar-inverse" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#">Principal</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="#">Fichas</a>
						</li>
						<li>
							<a href="#">Inventario</a>
						</li>
                                                <li>
							<a href="#">Solicitudes</a>
						</li>
						<li>
							<a href="#">Procesos</a>
						</li>
						<li>
							<a href="#">Reportes</a>
						</li>
						<li>
							<a href="administracion/buscar_usuario">Administración</a>
						</li>
                                                <li>
							<a href="#">Ayuda</a>
						</li>
						<li>
							<a href="{{route('usuario_app/salir')}}">Salir</a>
						</li>
					</ul>					
					
				</div>
			</nav>
	</div>
	</div><!--fin menu principal -->
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
         <div class="container">
        @if (Session::has('errors'))
		    <div class="alert alert-warning alert-dismissible" role="alert">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<ul>
		            <strong>{{ trans('notifications.alert') }}</strong>
				    @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
			        @endforeach
			    </ul>
		    </div>
		@endif
        @if (Session::has('status'))
		    <div class="alert alert-info alert-dismissible" role="alert">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<ul>
		            <strong>{{ trans('notifications.alert') }}</strong>
					<li>{{ Session::get('status') }}</li>
		        </ul>
		    </div>
		@endif		
    </div>
	<div class="row"><!--pie de pagina -->
		<div class="col-md-12">
		<p ALIGN=center>Derechos reservados</p>
		</div>
	</div>
	</div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>


