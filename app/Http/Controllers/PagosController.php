<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConceptoPago;
use App\Models\Pago;
use App\Models\MetodoPago;
use App\Models\oficinas;
use App\Models\Pagos;
use App\Models\User;
use App\Models\Deuda;
use App\Models\Suscribe;
use App\Api\AesCipher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


error_reporting(E_ALL);
class PagosController extends Controller
{
    private $disk ="comprobante";
    

    public function clientes(){
        $clientes = User::where('isAdmin', 0)->get();

        return view('admin.cliente.cliente', compact('clientes'));
    }
    

    public function historial() {

        $deuda = Pagos::where('id_usuario',Auth::user()->id)->get();


        return view('historial.historial_show',compact('deuda'));
    }

    public function pagos(){
        
        $deuda = Deuda::where('id_usuario',Auth::user()->id)->get();
    
        return view('user.pagos.pagos',compact('deuda'));
    }


    public function oficina(){

        $oficinas = oficinas::all();
        $conceptoPagos = ConceptoPago::all();

        return view('pagos.pago_en_oficina',compact('oficinas','conceptoPagos'));
    }

    public function CitaOficina(Request $request)
    {

       $pagos = "";
        if($request->id_contact != ""){
            $pagos = Pagos::where('id_contact',$request->id_contact)->get();
        }

        $cita = Pagos::where('id_metodo','4')
                      ->where('id_usuario',Auth::user()->id)
                      ->where('id_status','5')->get();

        if(count($cita)>0){

          $status = 'error';
                    $content = 'El usuario ya posee una cita pendiente por realizar';

                         return redirect()->route("pagos.pago_en_oficina")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

        }

        $citas = Pagos::where('id_metodo','4')
                      ->where('id_status','5')
                      ->where('fecha',$request->fecha)->get();

        if(count($citas)>5){

          $status = 'error';
                    $content = 'Lo sentimos, el dia '.$request->fecha.' ya no se encuentra disponible para agendar mas citas';

                         return redirect()->route("pagos.pago_en_oficina")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

        }

        if($request->id_contact != ""){

                $solicitud = Suscribe::where('id_contact',$request->id_contact)->exists();

                if($solicitud && !$pagos){

                $flight = new Pagos;
                $flight->id_usuario = Auth::user()->id ;
                $flight->id_oficina = $request->id_oficina;
                $flight->fecha = $request->fecha; 
                $flight->hora = $request->hora;
                $flight->id_concepto = $request->id_concepto;
                $flight->id_contact = $request->id_contact;
                $flight->id_status = '1'; 
                $flight->id_metodo = '4'; 
                $flight->save();

                }else{

                    $status = 'error';
                    $content = 'No existe solicitud ingresada con ese numero o ya tiene un pago asociado';

                         return redirect()->route("pagos.pago_en_oficina")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

                }
            }else{

                $flight = new Pagos;
                $flight->id_usuario = Auth::user()->id ;
                $flight->id_oficina = $request->id_oficina;
                $flight->fecha = $request->fecha; 
                $flight->hora = $request->hora;
                $flight->id_concepto = $request->id_concepto;
                $flight->id_status = '1'; 
                $flight->id_metodo = '4'; 
                $flight->save();

            }

      $status = 'success';
      $content = 'Pago registrado exitosamente';

      return redirect()->route("pagos.pago_en_oficina")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

    }


    public function index(){

        $metodoPago = metodoPago::whereIn('id_metodo',[2,3])->get();
        $conceptoPagos = ConceptoPago::all();

        return view('pagos.transferencias',compact('conceptoPagos','metodoPago'));
    }

    public function PagoMovil(){

        $conceptoPagos = ConceptoPago::all();

        return view('user.pagos.pago_movil',compact('conceptoPagos'));
    }


    public function transferencia(Request $request)
    {

      $pagos = "";
        if($request->id_contact != ""){
            $pagos = Pagos::where('id_contact',$request->id_contact)->get();
        }

        $transferencia = Pagos::whereIn('id_metodo',['2','3'])
                      ->where('referencia',$request->referencia)->get();

        if(count($transferencia)>0){

          $status = 'error';
          $content = 'Lo sentimos, un pago ya se encuentra registrado por ese serial';

          return redirect()->route("pagos.transferencias")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

        }

         if($request->id_contact != ""){

                $solicitud = Suscribe::where('id_contact',$request->id_contact)->exists();

                if($solicitud && !$pagos){


                $date = Carbon::now();
                $file = $request->file;
                $name = Auth::user()->id.$date.$file->getClientOriginalName(); 
                $file->storeAs('',$name,$this->disk);  

                $flight = new Pagos;
                $flight->id_usuario = Auth::user()->id ;
                $flight->id_metodo = $request->id_metodo;
                $flight->fecha = $request->fecha; 
                $flight->referencia = $request->referencia;
                $flight->monto = $request->monto;
                $flight->comprobante = $name;
                $flight->id_concepto = $request->id_concepto;
                $flight->id_contact = $request->id_contact;
                $flight->id_status = '5'; 
                $flight->save();

                }else{

                    $status = 'error';
                    $content = 'No existe solicitud ingresada con ese numero o ya tiene un pago asociado';

                         return redirect()->route("pagos.transferencias")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

                }
            }else{

                $date = Carbon::now();
                $file = $request->file;
                $name = Auth::user()->id.$date.$file->getClientOriginalName(); 
                $file->storeAs('',$name,$this->disk);  

                $flight = new Pagos;
                $flight->id_usuario = Auth::user()->id ;
                $flight->id_metodo = $request->id_metodo;
                $flight->fecha = $request->fecha; 
                $flight->referencia = $request->referencia;
                $flight->monto = $request->monto;
                $flight->comprobante = $name;
                $flight->id_concepto = $request->id_concepto;
                $flight->id_status = '5'; 
                $flight->save();

            }

      $status = 'success';
      $content = 'Pago registrado exitosamente';

      return redirect()->route("pagos.transferencias")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

    }

    public function RegistrarPagoMovil(Request $request){

        $pagos = "";
        if($request->solicitud != ""){
            $pagos = Pagos::where('id_contact',$request->solicitud)->get();
        }

        //Datos obtenidos del Request
        $referencia = $request->referencia;
        $tel1 = preg_replace("/[^0-9\s]/", "", $request->telefono);
        $tel2 = "58249147616";
        $precio = $request->precio;
        $date = $request->fecha;

        //telefonos
        $ori  = mb_convert_encoding($tel1, "UTF-8");
        $des  = mb_convert_encoding($tel2, "UTF-8");

        //Clave secreta enviada por el Banco
        $keybank = mb_convert_encoding("A11103402525120190822HB01", "UTF-8");
        #$keybank = mb_convert_encoding("A11380371481620220721TP00", "UTF-8");

        # Generacion del hash a partir de la clave secreta del banco
        $keyhash = AesCipher::createKeyhash($keybank);

        # Encripta el CVV
        $oriencrypt = AesCipher::encrypt($keyhash,$ori);
        $desencrypt = AesCipher::encrypt($keyhash,$des);


        $curl = curl_init();

      curl_setopt_array($curl, [
          CURLOPT_URL =>"https://apimbu.mercantilbanco.com/mercantil-banco/sandbox/v1/mobile-payment/search",
          #CURLOPT_URL =>"https://apimbu.mercantilbanco.com/mercantil-banco/prod/v1/mobile-payment/search",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"merchant_identify\":{\"integratorId\":\"1\",\"merchantId\":\"243236\",\"terminalId\":\"1\"},\"client_identify\":{\"ipaddress\":\"10.0.0.1\",\"browser_agent\":\"Chrome 18.1.3\",\"mobile\":{\"manufacturer\":\"Samsung\",\"model\":\"S9\",\"os_version\":\"Oreo 9.1\",\"location\":{\"lat\":37.422476,\"lng\":122.08425}}},\"search_by\":{\"amount\":$precio,\"currency\":\"ves\",\"origin_mobile_number\":\"$oriencrypt\",\"destination_mobile_number\":\"$desencrypt\",\"payment_reference\":\"$referencia\",\"trx_date\":\"$date\"}}",
          CURLOPT_HTTPHEADER => [
            "X-IBM-Client-Id: 81188330-c768-46fe-a378-ff3ac9e88824",
          #  "X-IBM-Client-Id: 4e117203-e3da-434e-b617-1d34acf07622",
            "accept: application/json",
            "content-type: application/json"
          ],
        ]);


        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded_json = json_decode($response, true);

        $trans ="";
        $error ="";

       if (isset ($decoded_json['transaction_list'])){

        $trans = $decoded_json['transaction_list'];

        }

        if (isset ($decoded_json['error_list'])){

        $error = $decoded_json['error_list'];

        }

        if ($err) {
            return response()->json([
                     'errors' => $err
                   ]);
         }elseif($trans){

            if($request->solicitud != "" && count($pagos) > 0){

            $status = 'error';
            $content = 'Ya se encuentra un pago Registrado';

            return redirect()->route("pago.movil")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

            }else{

            if($request->solicitud != ""){

                $solicitud = Suscribe::where('id_contact',$request->solicitud)->exists();

                if($solicitud && !$pagos){

                $pago = Pagos::create(
                    ['id_usuario' => Auth::user()->id,
                     'id_status' => 5,
                     'id_metodo' => 1,
                     'referencia' => $request->referencia,
                     'telefono' => $request->telefono,
                     'fecha' => $request->fecha,
                     'monto' => $request->monto,
                     'id_contact' => $request->solicitud,
                     'id_concepto' => $request->concepto,
                    ]);

                }else{

                    $status = 'error';
                    $content = 'No existe solicitud ingresada con ese numero o ya tiene un pago asociado';

                         return redirect()->route("pago.movil")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);

                }
            }else{

                $pago = Pagos::create(
                    ['id_usuario' => Auth::user()->id,
                     'id_status' => 5,
                     'id_metodo' => 1,
                     'referencia' => $request->referencia,
                     'telefono' => $request->telefono,
                     'fecha' => $request->fecha,
                     'monto' => $request->monto,
                     'id_concepto' => $request->concepto,
                    ]);

            }

                         $status = 'success';
                         $content = 'Pago registrado exitosamente';

                         return redirect()->route("pago.movil")->with('process_result',[
                            'status' => $status,
                            'content' => $content,
                       ]);
                   }

         }elseif($error){

             foreach($error as $country) {
               $des = $country['description'];
             }

             $status = 'error';
             $content = $des;

             return redirect()->route("pago.movil")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

         }
    }


    public function VerPagos(){


    }

    public function VerPagosShow(){

      
    }

}
