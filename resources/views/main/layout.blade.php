<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rescue Quit App @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300,100,700,900' rel='stylesheet' type='text/css'>
	<link href="//fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" type="text/css">
</head>
<body>

	{{-- Navbar Section --}}
	@yield('nav')
	
	{{-- Main Content --}}
	@yield('content')
	
	{{-- Post-loaded scripts --}}
	@include('partials.scripts')

</body>
</html>