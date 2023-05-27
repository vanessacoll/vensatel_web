<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Suscribe;
use App\Models\User;
use App\Models\Status;

class SolicitudesController extends Controller
{
    public function index()
    {
        $solicitudes = Suscribe::all();

        return view('admin.solicitudes.solicitudes',compact('solicitudes'));
   }

   public function solicitudes_ver(Suscribe $solicitudes)
    {

    	$statuses = Status::whereIn('id_status',['1','2','3','4','7','8'])->get();
        return view('admin.solicitudes.solicitudes_show', ['solicitudes' => $solicitudes],compact('statuses'));

    }

    public function actualizar_solicitudes(Request $request, Suscribe $solicitudes)
    {

        
        if($request->id_status == 3){

        $user = User::where('id', $solicitudes->id_usuario)->first();

        // Asignar el rol "Cliente Aprobado" al usuario
        $user->assignRole('Cliente Aprobado');

        }elseif($request->id_status == 7){

        //Aca hay que consultar si el pago esta confirmado

        $user = User::where('id', $solicitudes->id_usuario)->first();

        // Asignar el rol "Suscriptor" al usuario
        $user->assignRole('Suscriptor');

        }

        $solicitudes->id_status   = $request->id_status;
        $solicitudes->saveOrFail();
   
        $status = 'success';
        $content = 'Estatus Actualizado exitosamente';

    return redirect()->route("solicitudes.index.admin")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }

}
