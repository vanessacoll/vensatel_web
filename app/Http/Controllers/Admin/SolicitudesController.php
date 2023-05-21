<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Suscribe;
use App\Models\User;

class SolicitudesController extends Controller
{
    public function index()
    {
        $solicitudes = Suscribe::all();

        return view('admin.solicitudes.solicitudes',compact('solicitudes'));
   }

   public function actualizar_solicitudes(Suscribe $solicitudes)
    {

        return view('admin.solicitudes.solicitudes_index', ['solicitudes' => $solicitudes]);

    }

}
