<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }}</title>

	<link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
	<link rel="manifest" href="../images/site.webmanifest">

	<script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles>
</head>
<body>
	<div class="bg"></div>
	<div class="ie alert alert-danger" role="alert">
		<strong>Oh snap!</strong> IE is not a supported browser. Please use desktop or mobile versions of Chrome, Edge, Safari, or Firefox.
	  </div>
    @yield('content')
    @include('layouts.partials.footer')
    <livewire:scripts>
</body>
</html>
