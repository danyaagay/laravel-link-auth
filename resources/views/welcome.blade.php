@extends('layouts.app', ['title' => 'Панель'])
@section('content')
@if (Auth::check())
	<div class="header">
		Вы вошли как {{ Auth::user()->name }}
		<a href="{{ route('logout') }}">Выйти</a>
	</div>
@else
	<div class="header">
		<a class="login-button" href="/signin">Вход</a>
		<a class="login-button" href="/signup">Регистрация</a>
	</div>
@endif
	<div class="content"></div>
@endsection
