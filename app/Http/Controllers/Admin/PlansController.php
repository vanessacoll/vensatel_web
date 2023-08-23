<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Services\getPlans;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    protected $getPlans;

    public function __construct(getPlans $getPlans)
    {
        $this->getPlans = $getPlans;
    }


    public function getPlans()
    {
        try {
            $planes = $this->getPlans->getPlanInternet();
    
            if (isset($planes['results']) && is_array($planes['results'])) {
                foreach ($planes['results'] as $plan) {    
                    Plan::updateOrCreate(
                        ['id_plan_wisphub' => $plan['id']],
                        ['nombre' => $plan['nombre'], 'tipo' => $plan['tipo']]
                    );
                }
    
                $status = 'success';
                $content = 'Planes Actualizados Exitosamente';
            } else {
                $status = 'error';
                $content = 'Error en la respuesta de la API: No se encontraron resultados válidos';
            }
    
            return redirect()->route("admin.planes.plans")->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);
        } 
        catch (RequestException $e) {
            if ($e->hasResponse()) {
                $responseBody = $e->getResponse()->getBody();
                $errorMessage = json_decode($responseBody, true);
    
                $status = 'error';
                $content = 'Error en la API: ' . $errorMessage['detail'];
            } else {
                $status = 'error';
                $content = 'Error de conexión: No se pudo resolver el host';
            }
    
            return redirect()->route("admin.planes.plans")->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);
        }
    }
    



    // public function getPlans()
    // {
        

    //     try {

    //         $planes = $this->getPlans->getPlanInternet();

    //         if (isset($planes['results']) && is_array($planes['results'])) {
    //             foreach ($planes['results'] as $plan) {    
    //                 Plan::updateOrCreate(
    //                     ['id_plan_wisphub' => $plan['id']],
    //                     ['nombre' => $plan['nombre'], 'tipo' => $plan['tipo']]
    //                 );
    //             }
    //         }

    //         $status = 'success';
    //         $content = 'Planes Actualizados Exitosamente';

    //        return redirect()->route("admin.planes.plans")->with('process_result',[
    //             'status' => $status,
    //             'content' => $content,
    //        ]);
    
    //     } catch (RequestException $e) {

    //         if ($e->hasResponse()) {
    //          $responseBody = $e->getResponse()->getBody();
    //          $errorMessage = json_decode($responseBody, true);

    //          $status = 'error';
    //          $content = 'Error en la API: ' . $errorMessage['detail'];

    //          return redirect()->route("admin.planes.plans")->with('process_result', [
    //              'status' => $status,
    //              'content' => $content,
    //          ]);
           
           
    //         } else {
                
    //             $status = 'error';
    //             $content = 'Error de conexión: No se pudo resolver el host';

    //             return redirect()->route("admin.planes.plans")->with('process_result', [
    //                 'status' => $status,
    //                 'content' => $content,
    //             ]);
                
    //         }

        
    //     }


    //     // Handle the $plan data as needed

    //   //  return view('your.view', ['planes' => $planes]);
    // }

    public function getPlansIndex()
    {
        $planes = Plan::all();

        return view('admin.planes.plans', compact('planes'));
    }
}
