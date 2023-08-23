<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagosController;
// use App\Http\Controllers\Admin\PagosController;
use App\Http\Controllers\SolicitudesController;

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

Route::get('/pagos', [PagosController::class, 'pagos'])->name('user.pagos.pagos');

// Route::get('/pagoss', [PagosController::class, 'deuda'])->name('user.pagos.pagosdeuda');

Route::get('/pagos/pago_movil', [PagosController::class, 'PagoMovil'])->name('pago.movil');

Route::get('/solicitudes', [SolicitudesController::class, 'solicitudes'])->name('solicitudes');

Route::get('/solicitudes/crear', [SolicitudesController::class, 'solicitudesCrear'])->name('solicitudes.crear');

Route::get('/solicitudes/registrar', [SolicitudesController::class, 'solicitudesRegistrar'])->name('solicitudes.registrar');

Route::get('solicitudes/ver/{solicitudes}',[SolicitudesController::class, 'solicitudesVer'])->name('solicitudes.ver');

Route::get('pagos/pago_movil/registrar',[PagosController::class, 'RegistrarPagoMovil'])->name('pago.movil.registrar');

Route::post('pago/transferencias-comprobante', [App\Http\Controllers\PagosController::class, 'transferencia'])->name('pagos.transferencias-comprobante');
Route::get('pago/pago_en_oficina', [App\Http\Controllers\PagosController::class, 'oficina'])->name('pagos.pago_en_oficina');  
Route::post('pago/cita/pago_en_oficina', [App\Http\Controllers\PagosController::class, 'CitaOficina'])->name('pagos.pago_en_oficinaCita');  
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

Route::get('admin/solicitudes/deuda/{solicitudes}',[App\Http\Controllers\Admin\SolicitudesController::class, 'solicitudes_deuda'])->name('solicitudes.deuda.admin');

//Reclamos

Route::get('admin/reclamos',[App\Http\Controllers\Admin\ReclamosController::class, 'index'])->name('reclamos.index.admin');

Route::get('admin/reclamos/update/{reclamos}',[App\Http\Controllers\Admin\ReclamosController::class, 'actualizar_reclamos'])->name('reclamos.actualizar.admin');

//Pagos

Route::get('admin/pagos',[App\Http\Controllers\Admin\PagosController::class, 'index'])->name('pagos.index.admin');

Route::get('admin/oficina/ver',[App\Http\Controllers\Admin\PagosController::class, 'ofiver'])->name('admin.oficina.ofiver');

Route::get('admin/oficina/editar{datos}',[App\Http\Controllers\Admin\PagosController::class, 'ofieditar'])->name('admin.oficina.ofieditar');

Route::post('admin/oficina/actualizar{datos}',[App\Http\Controllers\Admin\PagosController::class, 'ofiactualizar'])->name('admin.oficina.ofiactualizar');

Route::delete('admin/oficina/eliminar{datos}',[App\Http\Controllers\Admin\PagosController::class, 'destroy'])->name('admin.oficina.destroy');



Route::get('guardar/tasa/dolar',[App\Http\Controllers\Admin\PagosController::class, 'cambdolar'])->name('home.dolar');


Route::get('admin/oficina',[App\Http\Controllers\Admin\PagosController::class, 'oficina'])->name('admin.oficina.oficina');

Route::post('admin/oficina/crear',[App\Http\Controllers\Admin\PagosController::class, 'oficrear'])->name('admin.oficina.oficina.crear');

Route::get('download/{pagos}',[App\Http\Controllers\Admin\PagosController::class, 'download'])->name('download');

Route::get('admin/pagos/update/{pagos}',[App\Http\Controllers\Admin\PagosController::class, 'actualizar_pagos'])->name('pagos.actualizar.admin');

Route::get('admin/pagos/ver/{pagos}',[App\Http\Controllers\Admin\PagosController::class, 'pagos_ver'])->name('pagos.ver.admin');


Route::get('admin/deudas/rebajar/{pagos}',[App\Http\Controllers\Admin\PagosController::class, 'rebajarDeuda'])->name('rebajar.deuda.admin');


//Usuarios


Route::get('/usuarios',[App\Http\Controllers\Auth\RegisterController::class, 'search'])->name('register.search');

Route::get('/usuarios/{user}/editar',[App\Http\Controllers\Auth\RegisterController::class, 'edit'])
    ->name('register.edit');

Route::get('/usuarios/{user}',[App\Http\Controllers\Auth\RegisterController::class, 'destroy'])
    ->name('register.destroy');

Route::get('/usuariosup/{user}',[App\Http\Controllers\Auth\RegisterController::class, 'update'])
    ->name('register.update');



Route::get('/message',[App\Http\Controllers\ChatController::class, 'sendMessage'])
    ->name('message');




});
