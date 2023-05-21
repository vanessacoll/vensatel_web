<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reclamos;
use App\Models\User;

class ReclamosController extends Controller
{
    public function index()
    {
        $reclamos = Reclamos::all();

        return view('admin.reclamos.reclamos',compact('reclamos'));
   }
}
