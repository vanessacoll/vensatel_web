@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitudes de Servicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Solicitudes de Servicio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

 @endsection

@section('contenido')

<div class="container-fluid">

    <div class="row">
           <div class="col-md-12">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Listado de Solicitudes</h3>
               </div>
               <!-- /.box-header -->
               <div class="card-body">

                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                       <th>Solicitud</th>
                       <th>Cliente</th>
                       <th>Email</th>
                       <th>Direccion</th>
                       <th>Estatus</th>
                       <th>Ver</th>
                    </tr>
                   </thead>
                   <tbody>
                   @foreach($solicitudes as $solicitud)

                       <tr>
                           <td>#{{$solicitud->id_contact}}</td>
                           <td>{{$solicitud->name}}</td>
                           <td>{{$solicitud->email}}</td>
                           <td>{{$solicitud->direccion}}</td>
                           <td>{{$solicitud->status->descripcion}}</td>

                           <td>


                               <a class="btn btn-primary" href="{{route("solicitudes.ver.admin",['solicitudes' => $solicitud->id_contact])}}">
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
