<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Bello') }}</title>

	<!-- Styles -->
	<link rel="shortcut icon" href="{{ asset('img/favicon.png')  }}">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
	      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- main -->
<div id="app">
	<!-- navigation -->
	@include('layout.nav')

	<!-- flash-messages -->
	@include('layout.message')

	<!-- errors -->
	@include('layout.errors')

	<!-- content -->
	@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
