<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Suscribe;
use App\Models\User;
use App\Mail\Contacto;
use App\Mail\Suscribe_contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{

    public function Enviar(Request $request)
    {
        try{

        $date = Carbon::now()->locale('es');

    	$objDemo = new \stdClass($request->input());
        $objDemo->name    = $request->name;
        $objDemo->email   = $request->email;
        $objDemo->subject = $request->subject;
        $objDemo->message = $request->message;
        $objDemo->date    = $date;


        Mail::to('ventas@vensatel.com')->send(new Contacto($objDemo));

        $mail = new Contact($request->input());
        $mail->name    = $request->name;
        $mail->email   = $request->email;
        $mail->subject = $request->subject;
        $mail->message = $request->message;
        $mail->date   = $date;
        $mail->saveOrFail();


         return response()->json([
                  'success' => 'OK'
                ]);

         }catch (\Exception $e){

            return response()->json([
                  'errors' => 'Error al enviar mensaje.'
                ]);
        }


	}


	public function Suscribir(Request $request)
    {

    	$objDemo = new \stdClass($request->input());
        $objDemo->name    = $request->nombre;
        $objDemo->email   = $request->email;
        $objDemo->telefono = $request->telefono;
        $objDemo->direccion = $request->direccion;


        //Mail::to('rmendoza9@gmail.com')->send(new Suscribe_contact($objDemo));

        $date = Carbon::now()->locale('es');

        $mail = new Suscribe($request->input());
        $mail->name    = $request->nombres;
        $mail->email   = $request->email;
        $mail->telefono = $request->telefono;
        $mail->coordenadas = $request->latitud.','.$request->longitud;
        $mail->direccion = $request->direccion;
        $mail->id_inmueble = $request->inmueble;
        $mail->date   = $date;
        $mail->saveOrFail();

        $user = User::create([
            'name' => $request->nombres,
            'cedula' => $request->cedula,
            'email' => $request->email,
            'password' => Hash::make($request->contraseña),
            'suscriptor' => 'N',
            'direccion' => $request->direccion,
            'cedula' => $request->cedula
        ]);

        $user->assignRole('Cliente');

        $objDemoUser = new \stdClass($request->input());
        $objDemoUser->name      = $request->nombre;
        $objDemoUser->email     = $request->email;
        $objDemoUser->telefono  = $request->telefono;
        $objDemoUser->direccion = $request->direccion;
        $objDemoUser->usuario   = $user->usuario;
        $objDemoUser->password  = $user->password;


        //Mail::to('rmendoza9@gmail.com')->send(new Suscribe_contact($objDemo));

         return response()->json([
                  'success' => 'OK'
                ]);


	}

    public function index(){

         return view('sections_page.services_register');
    }
}
