<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProxyController extends Controller
{
    public function proxy(Request $request)
    {
        $url = $request->query('url');
        $client = new Client();
        $response = $client->get($url);
        return $response->getBody();
    }
}
