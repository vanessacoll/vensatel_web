<?php

namespace App\Console\Commands;
use App\Services\getBalance;
use Illuminate\Console\Command;
use App\Models\User;


class ActualizarSaldos extends Command
{
    protected $signature = 'actualizar:saldos';
    protected $description = 'Actualiza el saldos de un servicio';
    
        public function handle()
        {
            $getBalanceService = new getBalance();
            $usuarios = User::whereNotNull('id_servicio')->get();

            foreach ($usuarios as $usuario) {
                $saldo = $getBalanceService->getBalance($usuario->id_servicio);

                if (isset($saldo['saldo'])) {

                    $usuario->update(['saldo' => $saldo['saldo']]);
                }
            }

            $this->info("Saldos Actualizados");
        }

    }