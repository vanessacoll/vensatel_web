<?php

namespace App\Http\Controllers;

use App\Models\Tasa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasa = Tasa::latest('fecha')->first();

        return view('home', compact('tasa'));
    }
}
