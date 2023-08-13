<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class getPlans
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('wisphub.api_key');
    }

    public function getPlanInternet()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Api-Key ' . $this->apiKey,
        ])->get('https://api.wisphub.net/api/plan-internet');

        return $response->json();
    }
}

