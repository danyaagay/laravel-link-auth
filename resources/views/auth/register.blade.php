@extends('layouts.app', ['title' => 'Регистрация'])
@section('content')
  <div class="content">
	  @if(!session()->has('success'))
		<h1>Регистрация</h1>
		<form action="{{ route('register') }}" method="post">
		  @csrf
			<label for="name">Имя</label>
			<input type="string" name="name" id="name">
			<label for="email">Email</label>
			<input type="email" name="email" id="email">
			@error('email')
			  <p>{{ $message }}</p>
			@enderror
		  <button>Зарегистрироваться</button>
		</form>
	  @else
		<p>Ссылка для входа отправлена на Ваш email</p>
	  @endif
  </div>
@endsection