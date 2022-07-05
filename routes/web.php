<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function() {
  Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');

  Route::get('signin', [AuthController::class, 'showLogin'])->name('login.show');
  Route::post('signin', [AuthController::class, 'login'])->name('login');

  Route::get('signup', [AuthController::class, 'showRegister'])->name('register.show');
  Route::post('signup', [AuthController::class, 'register'])->name('register');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');