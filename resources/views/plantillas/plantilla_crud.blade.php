<!doctype html>
<!--
     * Nombre del archivo: plantilla_reportes_admin.blade.php
     * Descripción:Plantillas a ser utilizada por los reportes administrativos
     * Fecha de creación:Dic/2019
-->
<html lang="es" xml:lang="es"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="905; URL=/rop_test/public/">
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Pragma" content="no-cache" />
    <title>@yield('title')</title>
    @section('head')
    
    <link rel="stylesheet" type=text/css href="{{asset('assets/css/bootstrap.css')}}" />
    {!! Html::style('assets/css/carga.css') !!}
    {!! Html::style('assets/css/animate.css') !!}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lista_dinamica.js')}}"></script>
    <script src="{{asset('assets/js/select_dependencia.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
       <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">
    {
    if(history.forward(1))
      location.replace(history.foward());
    }
    </script>
    <script type="text/javascript">
    $(window).load(function() {
    $(".loader").fadeOut("slow");
    });
    </script>
    @show    
</head>
<body>
    <div class="loader">
        <img class="profile-img" src="{{asset('images/pageLoader.gif')}}" width="100" height="100"> 
    </div>
     <div class="container-fluid">
	<div class="row"><!--Encabezado -->
		<div class="col-md-12">
                    <img alt="Bootstrap Image Preview" src="{{asset('images/encabezado.png')}}" width="100%">
		</div>
	</div>
	<div class="row"><!--fecha-usuario -->
		<div class="col-md-4">
                    @yield('fecha_sistema') 		
		</div>
                <div class="col-md-4">
                    @yield('nombre_plantilla') 		
		</div>
		<div class="col-md-4">
                    @yield('usuario_sesion') 		
		</div>
	</div>
	<div class="row"><!--menu principal -->
	<div class="col-md-12">
            <style type="text/css">
            /* cambiar tipo de letra */
            nav.navbar ul.nav li {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
              }
             .navbar-default .navbar-brand {
             color:#fff;
              }
            /* cambiar el color de fondo a la barra */
            nav.navbar {
           background-color: #233671; /* #337ab7 */
            
            }
            </style>
			<nav class="navbar navbar-default navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('principal')}}">Inicio</a>  
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('ropseguimiento')}}">Intervenciones</a>
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('roptrimestre')}}">ROP Trimestre</a>
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('ropsemestre')}}">ROP Semestre</a>
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('ropanual')}}">ROP Anual</a>
                                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('ropkpif')}}">KPIF</a>
                                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('administracion')}}">Administración</a>
                                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="{{route('usuario_app/salir')}}">Salir</a>
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
                <strong>
                @if (session()->has('flash_notification.message'))                
                @include ('flash::message')
                @endif                 
                @if($errors->any())
                    <div class="alert-danger" role="alert">
                    <p>Por favor corregir los siguientes errores:</p>
                       @foreach ($errors->all() as $error)
                          <div>{{ $error }}</div>
                      @endforeach
                    </div>
                @endif
                </strong>
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
		</div>			
	</div>
         <div class="container">        	
    </div>
	<div class="row"><!--pie de pagina -->
		<div class="col-md-12">
		<div class="panel-footer"><h5 class="text-center">Derechos Reservados &copy; 2019, SE-COMISCA</h5></div>
		</div>
	</div>
	</div>
</body>

