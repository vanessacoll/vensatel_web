<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\getPlans;
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
        $plan = $this->getPlans->getPlanInternet();

        dd($plan);

        // Handle the $plan data as needed

      //  return view('your.view', ['plan' => $plan]);
    }

    public function getPlansIndex()
    {
        
    }
}
