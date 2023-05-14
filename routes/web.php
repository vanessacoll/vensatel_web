<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('enviar', [App\Http\Controllers\ContactController::class, 'Enviar']);

Route::get('suscribir', [App\Http\Controllers\ContactController::class, 'Suscribir']);

Route::get('services', [App\Http\Controllers\ContactController::class, 'index'])->name('index');

Route::get('/proxy', [App\Http\Controllers\ProxyController::class, 'proxy'])->name('proxy');
