<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Suscribe;
use App\Models\User;
use App\Models\Status;
use App\Models\Pagos;
use App\Models\Reclamos;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $creadas = Suscribe::where('id_status','1')->get();

        $aprobadas = Suscribe::where('id_status','3')->get();

        $rechazadas = Suscribe::where('id_status','4')->get();

        $cerradas = Suscribe::where('id_status','7')->get();

        $pregistrados = Pagos::where('id_status','5')->get();

        $pconfirmados = Pagos::where('id_status','6')->get();

        $rregistrados = Reclamos::where('id_status','1')->get();

        $ratendidos = Reclamos::where('id_status','7')->get();
        
        $ppagomovil = Pagos::where('id_metodo','1')->get();
        
        $pdivisas = Pagos::where('id_metodo','3')->get();
        
        $ptransferencias = Pagos::where('id_metodo','2')->get();
       
        $poficina = Pagos::where('id_metodo','4')->get();

        $pagos = Pagos::all();

        return view('admin.home',compact('creadas','aprobadas','rechazadas','cerradas','pregistrados','pconfirmados','ppagomovil','pdivisas','ptransferencias','poficina','rregistrados','ratendidos','pagos'));
    }
}
