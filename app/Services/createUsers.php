<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

    class createUsers
    {
        protected $apiKey;

        public function __construct()
        {
            $this->apiKey = config('wisphub.api_key');
        }

        public function createUser($idZona, $data)
        {
           // dd($data);
            $url = "https://api.wisphub.net/api/clientes/agregar-cliente/{$idZona}";
           dd($url);
            $response = Http::withHeaders([
                'Authorization' => 'Api-Key ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($url, $data);
            dd($response->json());
            return $response->json();
        }
    }
