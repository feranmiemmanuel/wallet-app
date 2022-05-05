<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/',[PagesController::class , 'index']);
Route::get('/link', [PagesController::class, 'links']);
Route::post('/process', [PagesController::class, 'submitForm'])->name('send.mail');
Route::get('crypt/register',[RegisterController::class, 'index'])->name('register_view');
Route::post('crypt/register',[RegisterController::class, 'register'])->name('register');

Route::get('crypt/login',[AuthController::class, 'index'])->name('login');
Route::post('crypt/logout',[AuthController::class, 'logout'])->name('logout');
Route::post('crypt/login',[AuthController::class, 'login'])->name('login_process');

Route::get('crypt/dashboard',[DashboardController::class , 'dashboard'])->name('dashboard');
