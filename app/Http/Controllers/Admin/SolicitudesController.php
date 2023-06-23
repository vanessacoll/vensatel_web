<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Suscribe;
use App\Models\User;
use App\Models\Status;
use App\Models\Pagos;
use App\Models\Plan;
use App\Models\Deuda;
use App\Models\Message;
use Carbon\Carbon;


class SolicitudesController extends Controller
{
    public function index()
    {
        $solicitudes = Suscribe::all();

        return view('admin.solicitudes.solicitudes',compact('solicitudes'));
   }

   public function solicitudes_ver(Suscribe $solicitudes)
    {

        $messages = Message::where('id_contact',$solicitudes->id_contact)
                            ->where('id_usuario_to',$solicitudes->id_usuario)->get();
        $planes = Plan::all();
        $deuda = Deuda::where('id_contact',$solicitudes->id_contact)->get();
    	$statuses = Status::whereIn('id_status',['1','2','3','4','7','8'])->get();
        return view('admin.solicitudes.solicitudes_show', ['solicitudes' => $solicitudes],compact('statuses','deuda','planes','messages'));

    }

    public function actualizar_solicitudes(Request $request, Suscribe $solicitudes)
    {


        $user = User::where('id', $solicitudes->id_usuario)->first();
        
        if($request->id_status == 3){

        $user->assignRole('Cliente Aprobado');

        }elseif($request->id_status == 7){

        //Aca hay que consultar si el pago esta confirmado
        $pagos = Pagos::where('id_contact', $solicitudes->id_contact)->first();

            if($pagos && ($pagos->id_status == 6)){

             $user->assignRole('Suscriptor');

             }else{

                return back()->with('process_result', [
                    'status' => 'error',
                    'content' => 'Esta solicitud no posee pago registrado o confirmado',
                ]);
                die();
             }

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

    public function solicitudes_deuda(Request $request, Suscribe $solicitudes)
    {


        $user = User::where('id', $solicitudes->id_usuario)->first();
        $date = now()->locale('es');
        
        $deuda = new Deuda($request->input());
        $deuda->id_usuario      = $user->id;
        $deuda->id_plan         = $request->id_plan;
        $deuda->fecha           = $date; 
        $deuda->monto           = $request->monto;
        if($request->monto_e != '0.00'){
        $deuda->monto_extra     = $request->monto_e;
        $deuda->concepto_extra  = $request->concepto;
        }
        $deuda->id_status       = '1';
        $deuda->id_concepto     = '1';
        $deuda->id_contact      = $solicitudes->id_contact;
        $deuda->save();   

        $solicitudes->pago      = true;
        $solicitudes->saveOrFail();
   
        $status = 'success';
        $content = 'Deuda Registrada exitosamente';

    return back()->with('process_result', [
        'status' => $status,
        'content' => $content,
    ]);

    }

}
