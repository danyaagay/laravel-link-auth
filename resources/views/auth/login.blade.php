@extends('layouts.app', ['title' => 'Вход'])
@section('content')
  <div class="content">
	  @if(!session()->has('success'))
		<h1>Вход</h1>
		<form action="{{ route('login') }}" method="post">
		  @csrf
			<label for="email" class="block">Email</label>
			<input type="email" name="email" id="email">
			@error('email')
			  <p>{{ $message }}</p>
			@enderror
		  <button>Войти</button>
		</form>
	  @else
		<p>Ссылка для входа отправлена на Ваш email</p>
	  @endif
  </div>
@endsection