<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\getBalance;

class BalanceController extends Controller
{
    
    protected $getClienteSaldoService;

    public function __construct( getBalance  $getClienteSaldoService)
    {
        $this->getClienteSaldoService = $getClienteSaldoService;
    }

    public function getBalance($clienteId)
    {
        $saldo = $this->getClienteSaldoService->getBalance($clienteId);

        dd($saldo);

//        return view('clientes.saldo', compact('saldo'));
    }

}


// <?php

// namespace App\Http\Controllers;

// use App\Services\GetClienteSaldo;
// use Illuminate\Http\Request;

// class ClienteSaldoController extends Controller
// {

// }

