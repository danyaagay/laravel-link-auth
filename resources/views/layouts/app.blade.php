<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $title }}</title>
		<link href="/css/reset.css" rel="stylesheet">
		<link href="/css/app.css" rel="stylesheet">
	</head>
	<body>
  		@yield('content')
	</body>
</html>