<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Oficinas;
use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\User;
use App\Models\Status;

class PagosController extends Controller
{
    private $disk ="comprobante";

    public function download($pagos)
    {

        if(Storage::disk($this->disk)->exists($pagos)){
            return Storage::disk($this->disk)->download($pagos);


        }

        return response ('', 404);
     }

     public function oficina(){

        return view('admin.oficina');
     }


     public function oficrear(Request $request)
     {
         $command = new Oficinas;
         $command->descripcion = $request->descripcion; 
         $command->ubicacion = $request->ubicacion;
         $command->save();
        
         return redirect()->route('admin.oficina');
 
     }

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

    return redirect()->route("pagos.index.admin")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }
}
