<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\getSectorial;
use App\Models\sectorial;

class SectorialController extends Controller
{
    protected $sectorialService;

    public function __construct(getSectorial $sectorialService)
    {
        $this->sectorialService = $sectorialService;
    }

    public function getSectorialData()
    {
        $data = $this->sectorialService->getSectorialData();


        if (isset($data['results']) && is_array($data['results'])) {

            foreach ($data['results'] as $apisectorial) {
                sectorial::updateOrCreate(
                    ['id_sectorial_wisphub' => $apisectorial['id']],
                    ['nombre' => $apisectorial['nombre']]
                );
            }

            $status = 'success';
            $content = 'Sectorial Actualizadas Exitosamente';

            }else{

            $status = 'error';
            $content = 'Error: '. $data['detail'];

            }

            return redirect()->route("admin.sectoriales")->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);




        // Puedes procesar los datos aquí antes de devolver la respuesta
        
        // return response()->json($data);
      
    }

    public function getSectorialIndex()
    {
        $data = sectorial::all();

        return view('admin.sectoriales.sectoriales', compact('data') );
    }
}
