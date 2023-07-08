<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Suscribe;
use Carbon\Carbon;
use App\Mail\Suscribe_contact;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class SolicitudesController extends Controller
{
    public function solicitudes(){

        $solicitudes = Suscribe::where('id_usuario',Auth::user()->id)->get();

        return view('user.solicitudes.solicitudes',compact('solicitudes'));

    }

    public function solicitudesVer(Suscribe $solicitudes)
    {
        $messages = Message::where('id_contact',$solicitudes->id_contact)
                            ->where('id_usuario_to',$solicitudes->id_usuario)->get();

        return view('user.solicitudes.solicitudes_show', ['solicitudes' => $solicitudes],compact('messages'));

    }

    public function solicitudesCrear(){

        $solicitudes = Suscribe::where('id_usuario',Auth::user()->id)
                               ->whereIn('id_status',['1','2','3'])->get();

        if(count($solicitudes)>0){

        $status = 'error';
        $content = 'Actualmente posee una solicitud en proceso';

        return back()->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

        }else{

            return view('user.solicitudes.solicitudes_create');

        }

    }

    public function solicitudesRegistrar(Request $request)
    {

        $solicitud = Suscribe::where('id_usuario', Auth::user()->id)
                               ->whereNotIn('id_status',[7,8,4])
                               ->where('cedula',$request->cedula)->first();

        if(!$solicitud){
        $email = $request->email;
        $date = now()->locale('es');

        // Crear un objeto con los datos para el envío de correo
        $objDemo = (object) [
            'name' => $request->nombres,
            'email' => $email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion
        ];

        // Enviar correo de suscripción
        Mail::to('collvanessa041@gmail.com')->send(new Suscribe_contact($objDemo));

        $solicitudes = New Suscribe($request->input());
        $solicitudes->name = $request->nombres;
        $solicitudes->email = $email;
        $solicitudes->telefono = $request->telefono;
        $solicitudes->coordenadas = $request->latitud.','.$request->longitud;
        $solicitudes->direccion = $request->direccion;
        $solicitudes->id_inmueble = $request->inmueble;
        $solicitudes->date = $date;
        $solicitudes->id_usuario = Auth::user()->id;
        $solicitudes->id_status = 1;
        $solicitudes->saveOrFail();

        $status = 'success';
        $content = 'Solicitud Registrada exitosamente';

    return redirect()->route("solicitudes")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

        }else{

        $status = 'errors';
        $content = 'Actualmente ya posee una solicitud en progreso';

    return redirect()->route("solicitudes")->with('process_result',[
                'status' => $status,
                'content' => $content
            ]);

        }


    }
}
