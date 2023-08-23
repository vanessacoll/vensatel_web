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
              <li class="breadcrumb-item active">Historial de Pagos</li>
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
                 <h3 class="card-title">Historial de Pagos</h3>
               </div>
               <!-- /.box-header -->
               <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                       <th>Concepto</th>
                       <th>Estatus</th>
                       <th>Monto</th>
                       <th>Imprimir Recibo</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach($deuda as $h)


                       <tr>

                           <td>
                            {{ $h->id_concepto }}
                           </td>
                           <td>
                            {{ $h->id_status }}
                           </td>
                           <td>
                            {{ $h->monto }}
                           </td>
                           <td>


                           </td>




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