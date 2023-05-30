<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\User;
use App\Models\Status;

class PagosController extends Controller
{
    public function index()
    {
        $pagos = Pagos::all();

        return view('admin.pagos.pagos',compact('pagos'));
   }

   public function pagos_ver(Pagos $pagos)
    {

    	$statuses = Status::whereIn('id_status',['5','6'])->get();
        return view('admin.pagos.pagos_show', ['pagos' => $pagos],compact('statuses'));

    }

    public function actualizar_pagos(Request $request, Pagos $pagos)
    {

        $pagos->id_status   = $request->id_status;
        $pagos->saveOrFail();

        $status = 'success';
        $content = 'Estatus Actualizado exitosamente';

    return redirect()->route("solicitudes.index.admin")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }
}
