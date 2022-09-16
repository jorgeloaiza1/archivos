<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>{{ config('app.name', '') }}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/circle.css') }}" rel="stylesheet" />
</head>

<body class="profile-page">
	<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll navbar-primary" color-on-scroll="100">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>        		
        		<a class="navbar-brand" href="/"><img src="{{ asset('img/logoGluky.png') }}" style="max-height: 100%"></a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">	    			
    				<li>
						<a href="/logout">
							<i class="material-icons">exit_to_app</i> Salir
						</a>
    				</li>		            
        		</ul>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url({{ asset('img/city2_g.jpg') }})"></div>

		<div class="main main-raised">
			@yield('content')
		</div>		
    </div>    
    <p>&nbsp;</p>
</body>
	<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>	
	<script type="text/javascript">
		$('[data-toggle="tooltip"]').tooltip();
	</script>
	 @stack('scripts')
</html>
