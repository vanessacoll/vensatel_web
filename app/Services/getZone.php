<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class getZone
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('wisphub.api_key');
    }

    public function getZone()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Api-Key ' . $this->apiKey,
        ])->get('https://api.wisphub.net/api/zonas');

        return $response->json();
    }
}



