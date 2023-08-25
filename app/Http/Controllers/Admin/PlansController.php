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

        $planes = $this->getPlans->getPlanInternet();

        if (isset($planes['results']) && is_array($planes['results'])) {

        foreach ($planes['results'] as $apiPlan) {
            Plan::updateOrCreate(
                ['id_plan_wisphub' => $apiPlan['id']],
                ['nombre' => $apiPlan['nombre'], 'tipo' => $apiPlan['tipo']]
            );
        }

        $status = 'success';
        $content = 'Planes Actualizados Exitosamente';

        }else{

        $status = 'error';
        $content = 'Error: '. $planes['detail'];

        }

        return redirect()->route("admin.planes.plans")->with('process_result', [
            'status' => $status,
            'content' => $content,
        ]);

    }

    public function getPlansIndex()
    {
        $planes = Plan::all();

        return view('admin.planes.plans', compact('planes'));
    }
}
