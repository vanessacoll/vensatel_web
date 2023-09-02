<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class getSectorial
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('wisphub.api_key');
    }

    public function getSectorialData()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Api-Key ' . $this->apiKey,
        ])->get('https://api.wisphub.net/api/sectorial/');

        return $response->json();
    }
}
