<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

	public function showRegister()
  	{
		return view('auth.register');
  	}

  	public function register(Request $request)
  	{
		$data = $request->validate([
			'email' => ['required', 'email', 'unique:users,email'],
			'name' => ['required', 'string', 'max:20'],
		]);

    	$user = User::create([
        	'name' => $data['name'],
        	'email' => $data['email']
   		]);

		$user->sendLoginLink();
		session()->flash('success', true);

		return redirect()->back();
  	}

	public function showLogin()
  	{
		return view('auth.login');
  	}

  	public function login(Request $request)
  	{
		$data = $request->validate([
			'email' => ['required', 'email', 'exists:users,email'],
		]);

		User::whereEmail($data['email'])->first()->sendLoginLink();
		session()->flash('success', true);

		return redirect()->back();
  	}

	public function verify(Request $request, $token)
	{
		\Illuminate\Support\Facades\Log::debug($token);
		\Illuminate\Support\Facades\Log::debug(hash('sha256', $token));

  		$token = \App\Models\LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
  		abort_unless($request->hasValidSignature() && !$token->isExpired(), 401);

  		$user = $token->user;
  		if (!$user->email_verified_at) {
  			$user->markEmailAsVerified();
  		}

  		Auth::login($user);
  		$token->consume();

  		return redirect('/');
	}

	public function logout()
	{
  		Auth::logout();
  		return redirect(route('login'));
	}
}
