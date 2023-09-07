<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class deleteUser
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('wisphub.api_key');
    }

    public function deleteUser($id_servicio)
    {
        $url = "https://api.wisphub.net/api/clientes/{$id_servicio}/perfil";

        $response = Http::withHeaders([
            'Authorization' => 'Api-Key ' . $this->apiKey,
        ])->delete($url);

        return $response->json();
    }
}
