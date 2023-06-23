<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Suscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {

    	$date = Carbon::now()->locale('es');

    	$solicitud = Suscribe::where('id_contact',$request->id_solicitud)->first();

        $message = new Message($request->input());
        $message->id_usuario_from = Auth::id();
        $message->id_usuario_to   = $solicitud->id_usuario;
        $message->message 		  = $request->message;
        $message->id_contact      = $request->id_solicitud;
        $message->date    		  = $date;
        $message->save();

        $status = 'success';
        $content = 'Seguimiento Registrado exitosamente';

    return back()->with('process_result', [
        'status' => $status,
        'content' => $content,
    ]);

        
    }
}
