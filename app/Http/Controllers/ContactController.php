<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Suscribe;
use App\Models\User;
use App\Mail\Contacto;
use App\Mail\Suscribe_contact;
use App\Mail\NewUserMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Response;


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
        $mail->date    = $date;
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
    $email = $request->email;

    // Verificar si el correo electrónico ya está registrado
    if (User::where('email', $email)->exists()) {
        return response()->json(['errors' => 'El correo electrónico ya está registrado']);
    }else{

    // Crear un objeto con los datos para el envío de correo
    $objDemo = (object) [
        'name' => $request->nombres,
        'email' => $email,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion
    ];

    // Enviar correo de suscripción
    Mail::to('collvanessa041@gmail.com')->send(new Suscribe_contact($objDemo));

    // Obtener la fecha actual
    $date = now()->locale('es');


    // Generar una contraseña aleatoria
    $password = Str::random();

    // Crear un nuevo usuario
    $user = User::create([
        'name' => $request->nombres,
        'cedula' => $request->cedula,
        'email' => $email,
        'password' => Hash::make($password),
        'suscriptor' => 'N',
        'direccion' => $request->direccion,
        'cedula' => $request->cedula,
        'telefono' => $request->telefono
    ]);

    // Asignar el rol "Cliente" al usuario
    $user->assignRole('Cliente');

    // Crear un registro en la tabla de suscriptores
    $mail = new Suscribe($request->input());
    $mail->name = $request->nombres;
    $mail->email = $email;
    $mail->telefono = $request->telefono;
    $mail->coordenadas = $request->latitud.','.$request->longitud;
    $mail->direccion = $request->direccion;
    $mail->id_inmueble = $request->inmueble;
    $mail->date = $date;
    $mail->id_usuario = $user->id;
    $mail->id_status = 1;
    $mail->saveOrFail();

    // Crear un objeto con los datos para el envío de correo al usuario
    $objDemoUser = (object) [
        'name' => $request->nombres,
        'email' => $email,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
        'password' => $password
    ];

    // Enviar correo al nuevo usuario
    Mail::to($email)->send(new NewUserMail($objDemoUser));

    return response()->json(['success' => 'OK']);
    }
}


    public function index(){

         return view('sections_page.services_register');
    }
}
