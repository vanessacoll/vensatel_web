<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\User;

class PagosController extends Controller
{
    public function index()
    {
        $pagos = Pagos::all();

        return view('admin.pagos.pagos',compact('pagos'));
   }
}
