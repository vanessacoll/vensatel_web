@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>pagos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Pagos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

 @endsection

@section('contenido')

<div class="container-fluid">

    <div class="row">
           <div class="col-md-12">
             <div class="card card-primary card-outline">
               <div class="card-header">
                 <h3 class="card-title">Listado de Pagos</h3>
               </div>
               <!-- /.box-header -->
               <div class="card-body">

                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                       <th>Cliente</th>
                       <th>Estatus</th>
                       <th>Metodo de Pago</th>
                       <th>Concepto</th>
                       <th>Monto</th>
                       <th></th>
                    </tr>
                   </thead>
                   <tbody>
                   @foreach($pagos as $pago)

                       <tr>

                           <td>{{$pago->user->name}}</td>
                           <td>{{$pago->status->descripcion}}</td>
                           <td>{{$pago->metodo->descripcion}}</td>
                           <td>{{$pago->concepto->descripcion}}</td>
                           <td>{{$pago->monto}}</td>

                           <td>


                               <a class="btn btn-info" href="{{route("pagos.ver.admin",['pagos' => $pago->id_pago])}}">
                                   <i class="fa fa-eye"></i>
                               </a>


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
