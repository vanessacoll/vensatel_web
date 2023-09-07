<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class getUsers
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('wisphub.api_key');
    }

    public function getUsers()
    {
        $url = 'https://api.wisphub.net/api/clientes';

        $response = Http::withHeaders([
            'Authorization' => 'Api-Key ' . $this->apiKey,
        ])->get($url);

        return $response->json();
    }
}
