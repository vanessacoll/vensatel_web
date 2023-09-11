@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
                 <h3 class="card-title">Clientes</h3>
               </div>

               <!-- /.box-header -->
               <div class="card-body">



                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>

                       <th>Mombre</th>
                       <th>Cedula</th>
                       <th>Email</th>
                       <th>Telefono</th>
                       <th>Saldo</th>
                       <th>Opciones</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach ( $clientes as $cliente )

                       <tr>
                        <td>
                            {{ $cliente->name }}
                        </td>

                        <td>
                            {{ $cliente->cedula }}
                        </td>

                        <td>
                           {{ $cliente->email }}
                        </td>

                        <td>
                            {{ $cliente->telefono }}
                        </td>
                        <td>
                            {{ $cliente->saldo }}
                        </td>
                        <td>

                          <a class="btn btn-primary" href="{{ route('admin.cliente.registroWisphub') }}">
                            <i class="fa fa-edit"></i>
                            Registro Wisphub
                         </a>


                        </td>

                       </tr>
                    @endforeach

                   </tbody>
                 </table>
               </div>
               <div class="card-footer">


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
