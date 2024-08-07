<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class getBalance
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('wisphub.api_key');
    }

    public function getBalance($id_servicio)
    {
        return Http::withHeaders([
            'Authorization' => 'Api-Key ' . $this->apiKey,
        ])->get("https://api.wisphub.net/api/clientes/{$id_servicio}/saldo")->json();
    }
}
