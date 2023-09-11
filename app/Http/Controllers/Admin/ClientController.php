<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\getUsers;
use App\Services\getBalance;
use App\Models\User;


class ClientController extends Controller
{
    protected $getUserService;
    protected $getBalanceService;

    public function __construct(getUsers $getUsers, getBalance $getBalanceService)
    {
        $this->getUserService = $getUsers;
        $this->getBalanceService = $getBalanceService;
    }

    public function getUsers()
    {
        set_time_limit(260);

        $users = $this->getUserService->getUsers();

        if (isset($users['results']) && is_array($users['results'])) {


            foreach ($users['results'] as $apiUser) {
                //dd($apiUser);
                User::updateOrCreate(['id_servicio' => $apiUser['id_servicio']],
                [
                    'name' => $apiUser['nombre'],
                    'password' => bcrypt('123456'),
                    'email' => $apiUser['email'],
                    'suscriptor' => 'S',
                    'cedula' => $apiUser['cedula'],
                    'direccion' => $apiUser['direccion'],
                    'localidad' => $apiUser['localidad'],
                    'ciudad' => $apiUser['ciudad'],
                    'telefono' => $apiUser['telefono'],
                    'saldo' => $apiUser['saldo'],
                    'ip_cliente' => $apiUser['ip'],
                    'mac_cpe' => $apiUser['mac_cpe'],
                    'ip_plan' => $apiUser['plan_internet']['id'],
                    'id_sectorial' => $apiUser['sectorial']['id'] ?? null,
                    'id_zona' => $apiUser['zona']['id'],
                    'mac_cpe' => $apiUser['mac_cpe'],
                    'ip_router_wifi' => $apiUser['ip_router_wifi'],
                    'nombre_cpe' => $apiUser['comentarios'],
                ]
                );
            }
//Falta la bandera
            $status = 'success';
            $content = 'Usuarios Actualizados Exitosamente';

            }else{

            $status = 'error';
            $content = 'Error: '. $users['detail'];

            }

            return redirect()->route("admin.cliente.cliente")->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);


    }

    public function getBalance()
    {

            $usuarios = User::whereNotNull('id_servicio')->get();

            foreach ($usuarios as $usuario) {
                $saldo = $this->getBalanceService->getBalance($usuario->id_servicio);

                if (isset($saldo['saldo'])) {

                    $usuario->update(['saldo' => $saldo['saldo']]);

                    $status = 'success';
                    $content = 'Saldos Actualizados Exitosamente';
                } else {
                    $status = 'error';
                    $content = 'Error: '. $saldo['detail'];
                }
            }

            return redirect()->route("admin.cliente.cliente")->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);


    }

}
