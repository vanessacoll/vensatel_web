@extends('layout_adm.template')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item active">pagos</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">

  <div class="row">
         <div class="col-md-12">
           <div class="card card-primary"> 
             <div class="card-header">
               <h3 class="card-title">Consulta de Deudas</h3>
             </div>

             @include('user.pagos.pagos_modal')
      
             <!-- /.box-header -->
             <!-- Button trigger modal -->
             <div class="card-body">
              <a href="" class="btn btn-primary float-right mb-2 ml-2 " data-toggle="modal" data-target="#exampleModalCenter">
                <i class="nav-icon fas fas fa-cash-register"></i>
                Notificar Pago
              </a>
                 <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                     <th>Concepto</th>
                     <th>Concepto Extra</th>
                     <th>Fecha</th>
                     <th>Monto</th>
                     <th>Monto Extra</th>
                     <th>Total</th>
                  </tr>
                 </thead>
                 <tbody>
                    @foreach($deuda as $saldo)
                     <tr>

                         <td>{{$saldo->id_concepto}}</td>
                         <td>{{$saldo->concepto_extra}}</td>
                         <td>{{$saldo->fecha}}</td>
                         <td>{{$saldo->monto}}</td>
                         <td>{{$saldo->monto_extra}}</td>
                         <td>{{$saldo->monto + $saldo->monto_extra}}</td>

                     </tr>
                    @endforeach   

                 </tbody>
               </table>
             </div>

             <div class="card-footer">
 <a class="btn btn-default float-right" href="{{route("admin.home")}}">Cerrar</a>
 </div>
           </div>
           <!-- /.box -->
         </div>
       </div>


 </div>

@endsection