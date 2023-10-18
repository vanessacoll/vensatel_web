<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deuda;
use App\Models\Factura;
use App\Models\Oficinas;
use App\Models\Pagos;
use App\Models\PagoxDeuda;
use App\Models\Plan;
use App\Models\sectorial;
use App\Models\Status;
use App\Models\Tasa;
use App\Models\User;
use App\Models\Zone;
use App\Services\createUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagosController extends Controller
{
    private $disk = "comprobante";

    public function regWisphub(User $cliente)
    {

        $plan = Plan::all();
        $sectorial = sectorial::all();
        $zone = Zone::all();

        return view('admin.cliente.registroWisphub', compact('plan', 'sectorial', 'zone', 'cliente'));
    }

    public function GuaRegWisphub(Request $request, User $cliente)
    {
        $cliente->usuario_rb = $request->usuario_rb;
        $cliente->ip_cliente = $request->ip_cliente;
        $cliente->mac_cpe = $request->mac_cpe;
        $cliente->direccion = $request->direccion;
        $cliente->localidad = $request->localidad;
        $cliente->ciudad = $request->ciudad;
        $cliente->ip_router_wifi = $request->ip_router_wifi;
        $cliente->nombre_cpe = $request->nombre_cpe;
        $cliente->id_plan = $request->id_plan;
        $cliente->id_sectorial = $request->id_sectorial;
        $cliente->id_zona = $request->id_zona;
        $cliente->saveOrFail();

        $createUsers = new createUsers();

        $idZona = $request->id_zona;
        $datosUsuario = [

            "nombre" => $cliente->name,
            "email" => $cliente->email,
            "telefono" => $cliente->telefono,
            "cedula" => $cliente->cedula,
            "apellidos" => $cliente->name,

            "usuario_rb" => $request->usuario_rb,
            "ip_cliente" => $request->ip_cliente,
            "mac_cpe" => $request->mac_cpe,
            "direccion" => $request->direccion,
            "localidad" => $request->localidad,
            "ciudad" => $request->ciudad,
            "ip_router_wifi" => $request->ip_router_wifi,
            "comentarios" => $request->nombre_cpe,
            "id_plan" => $request->id_plan,
            "id_sectorial" => $request->id_sectorial,
            "id_zona" => $request->id_zona
        ];
        $respuesta = $createUsers->createUser($idZona, $datosUsuario);

  
        dd($respuesta);

        return redirect()->route('admin.cliente.cliente');
    }

    public function cambdolar(Request $request)
    {

        $dolar = new Tasa;
        $dolar->precio = $request->precio;
        $dolar->fecha = $request->fecha;
        $dolar->save();

        return redirect()->route('admin.home');

    }

    public function download($pagos)
    {

        if (Storage::disk($this->disk)->exists($pagos)) {
            return Storage::disk($this->disk)->download($pagos);

        }

        return response('', 404);
    }

    public function ofieditar(Oficinas $datos)
    {

        return view('admin.oficina.ofieditar', ['datos' => $datos]);
    }

    public function ofiver()
    {

        $oficinas = Oficinas::all();

        return view('admin.oficina.ofiver', compact('oficinas'));
    }

    public function oficina()
    {

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

        return view('admin.pagos.pagos', compact('pagos'));
    }

    public function pagos_ver(Pagos $pagos)
    {

        $deudas = Deuda::where('id_usuario', $pagos->id_usuario)
            ->where('id_status', 1)->get();
        $statuses = Status::whereIn('id_status', ['5', '6'])->get();
        return view('admin.pagos.pagos_show', ['pagos' => $pagos], compact('statuses', 'deudas'));

    }

    public function actualizar_pagos(Request $request, Pagos $pagos)
    {

        $pagos->id_status = $request->id_status;
        $pagos->saveOrFail();

        $status = 'success';
        $content = 'Estatus Actualizado exitosamente';

        return redirect()->route("pagos.index.admin")->with('process_result', [
            'status' => $status,
            'content' => $content,
        ]);

    }

    public function rebajarDeuda(Request $request, Pagos $pagos)
    {
        $date = Carbon::now()->locale('es');

        $pagos->asociado = 'S';
        $pagos->saveOrFail();

        $deuda::where('id_deuda', $request->id_deuda)->firts();

        $pagoxdeuda = new PagoxDeuda;
        $pagoxdeuda->id_pago = $pagos->id_pago;
        $pagoxdeuda->id_deuda = $request->id_deuda;
        $pagoxdeuda->mto_pag = $pagos->monto;
        $pagoxdeuda->mto_deu = $deuda->monto;
        $pagoxdeuda->fecha_pag = $pagos->fecha;
        $pagoxdeuda->save();

        //aca debo definir si la deuda se va a cero o se suma los detalladados
        if ($pagos->monto > $deuda->monto) {

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

        } else if ($pagos->monto == $deuda->monto) {

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

        return redirect()->route("pagos.index.admin")->with('process_result', [
            'status' => $status,
            'content' => $content,
        ]);

    }

    public function destroy(Oficinas $datos)
    {
        $datos->delete();

        return redirect()->route('admin.oficina.ofiver');
    }

}
