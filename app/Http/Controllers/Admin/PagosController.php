<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Oficinas;
use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Deuda;
use App\Models\PagoxDeuda;
use App\Models\Factura;
use App\Models\User;
use App\Models\Status;
use App\Models\Tasa;
use Carbon\Carbon;


class PagosController extends Controller
{
    private $disk ="comprobante";

    public function cambdolar(Request $request){

        $dolar = new Tasa;
        $dolar->precio = $request->precio; 
        $dolar->fecha = $request->fecha;
        $dolar->save();

        return redirect()->route('admin.home');

    }

    public function download($pagos)
    {

        if(Storage::disk($this->disk)->exists($pagos)){
            return Storage::disk($this->disk)->download($pagos);


        }

        return response ('', 404);
     }    

     public function ofieditar(Oficinas $datos)
     {

         return view('admin.oficina.ofieditar', ['datos' => $datos]);
     }



     public function ofiver(){

        $oficinas = Oficinas::all();

        return view('admin.oficina.ofiver', compact('oficinas'));
     }

     public function oficina(){

        return view('admin.oficina.oficina');
     }


     public function oficrear(Request $request)
     {
         $command = new Oficinas;
         $command->descripcion = $request->descripcion; 
         $command->ubicacion = $request->ubicacion;
         $command->save();
        
         return redirect()->route('admin.oficina.oficina');
     }


     public function ofiactualizar(Request $request, Oficinas $datos)
     {
        
        $datos->descripcion = $request->descripcion; 
        $datos->ubicacion = $request->ubicacion;
        $datos->saveOrFail();
         
         return redirect()->route('admin.oficina.ofiver');
 
     }

    public function index()
    {
        $pagos = Pagos::all();

        return view('admin.pagos.pagos',compact('pagos'));
   }

   public function pagos_ver(Pagos $pagos)
    {

        $deudas = Deuda::where('id_usuario',$pagos->id_usuario)
                      ->where('id_status',1)->get();
    	$statuses = Status::whereIn('id_status',['5','6'])->get();
        return view('admin.pagos.pagos_show', ['pagos' => $pagos],compact('statuses','deudas'));

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


    public function rebajarDeuda(Request $request, Pagos $pagos)
    {
        $date = Carbon::now()->locale('es');

        $pagos->asociado   = 'S';
        $pagos->saveOrFail();

        $deuda::where('id_deuda',$request->id_deuda)->firts();

        $pagoxdeuda = new PagoxDeuda;
        $pagoxdeuda->id_pago = $pagos->id_pago; 
        $pagoxdeuda->id_deuda = $request->id_deuda;
        $pagoxdeuda->mto_pag = $pagos->monto; 
        $pagoxdeuda->mto_deu = $deuda->monto;
        $pagoxdeuda->fecha_pag = $pagos->fecha;
        $pagoxdeuda->save();

        //aca debo definir si la deuda se va a cero o se suma los detalladados
        if($pagos->monto > $deuda->monto){

            $usuario = Usuario::find($pagos->id_usuario); 
                if ($usuario) {
                    $nuevoSaldo = $usuario->saldo + ($pagos->monto - $deuda->monto);
                    $usuario->saldo = $nuevoSaldo;
                    $usuario->save();
                }

            $factura = new Factura;
            $factura->fecha = $date; 
            $factura->id_concepto = $pagos->id_concepto;
            $factura->id_usuario = $pagos->id_usuario; 
            $factura->monto = $deuda->monto;
            $factura->id_deuda = $deuda->id_deuda;
            $factura->save();


        }else if($pagos->monto == $deuda->monto){

            $factura = new Factura;
            $factura->fecha = $date; 
            $factura->id_concepto = $pagos->id_concepto;
            $factura->id_usuario = $pagos->id_usuario; 
            $factura->monto = $deuda->monto;
            $factura->id_deuda = $deuda->id_deuda;
            $factura->save();

        }

        $status = 'success';
        $content = 'Deuda Asociada exitosamente';

    return redirect()->route("pagos.index.admin")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }

    public function destroy(Oficinas $datos)
    {
        $datos-> delete();

        return redirect()->route('admin.oficina.ofiver');
    }

}
