<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\getZone; // Cambié "getZone" a "GetZone" para seguir las convenciones de nombres

class ZoneController extends Controller
{
    protected $getZoneService;

    public function __construct(getZone $getZoneService)
    {
        $this->getZoneService = $getZoneService;
    }

    public function getZone() // Cambié el nombre del método para ser más descriptivo
    {
        $zonas = $this->getZoneService->getZone();


        dd($zonas);

        // return view('zonas.index', compact('zonas'));
    }
}
