<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagosController;

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


Route::get('enviar', [App\Http\Controllers\ContactController::class, 'Enviar']);

Route::get('suscribir', [App\Http\Controllers\ContactController::class, 'Suscribir']);

Route::get('services', [App\Http\Controllers\ContactController::class, 'index'])->name('index');

Route::get('/proxy', [App\Http\Controllers\ProxyController::class, 'proxy'])->name('proxy');


Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pagos/pago_movil', [PagosController::class, 'PagoMovil'])->name('pago.movil');

Route::get('pagos/pago_movil/registrar',[PagosController::class, 'RegistrarPagoMovil'])->name('pago.movil.registrar');

Route::get('pago/transferencias', [App\Http\Controllers\PagosController::class, 'index'])->name('pagos.transferencias');


Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'], function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
   echo Artisan::call('permission:cache-reset');
})->name('admin.home')->middleware('isAdmin');

//Solicitudes

Route::get('admin/solicitudes',[App\Http\Controllers\Admin\SolicitudesController::class, 'index'])->name('solicitudes.index.admin');

Route::get('admin/solicitudes/update/{solicitudes}',[App\Http\Controllers\Admin\SolicitudesController::class, 'actualizar_solicitudes'])->name('solicitudes.actualizar.admin');

Route::get('admin/solicitudes/ver/{solicitudes}',[App\Http\Controllers\Admin\SolicitudesController::class, 'solicitudes_ver'])->name('solicitudes.ver.admin');

//Reclamos

Route::get('admin/reclamos',[App\Http\Controllers\Admin\ReclamosController::class, 'index'])->name('reclamos.index.admin');

Route::get('admin/reclamos/update/{reclamos}',[App\Http\Controllers\Admin\ReclamosController::class, 'actualizar_reclamos'])->name('reclamos.actualizar.admin');

//Pagos

Route::get('admin/pagos',[App\Http\Controllers\Admin\PagosController::class, 'index'])->name('pagos.index.admin');

Route::get('admin/pagos/update/{pagos}',[App\Http\Controllers\Admin\PagosController::class, 'actualizar_pagos'])->name('pagos.actualizar.admin');

Route::get('admin/pagos/ver/{pagos}',[App\Http\Controllers\Admin\PagosController::class, 'pagos_ver'])->name('pagos.ver.admin');



});
