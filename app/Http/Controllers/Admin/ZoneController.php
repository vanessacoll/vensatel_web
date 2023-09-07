<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\getZone;
use App\Models\Zone;

class ZoneController extends Controller
{
    protected $getZoneService;

    public function __construct(getZone $getZone)
    {
        $this->getZoneService = $getZone;
    }

    public function getZone()
    {
        $zonas = $this->getZoneService->getZone();

        //dd($zonas);

        if (isset($zonas['results']) && is_array($zonas['results'])) {

            foreach ($zonas['results'] as $apiZona) {
                Zone::updateOrCreate(
                    ['id_zona_wisphub' => $apiZona['id']],
                    ['nombre' => $apiZona['nombre']]
                );
            }

            $status = 'success';
            $content = 'Zonas Actualizadas Exitosamente';

            }else{

            $status = 'error';
            $content = 'Error: '. $zonas['detail'];

            }

            return redirect()->route("admin.zona")->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);


    }

    public function getZoneIndex()
    {
        $zonas = Zone::all();

        return view('admin.zonas.zonas', compact('zonas'));
    }
}
