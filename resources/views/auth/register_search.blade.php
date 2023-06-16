@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
                 <h3 class="card-title">Listado de Usuarios</h3>
               </div>
               <!-- /.box-header -->
               <div class="card-body">

                <a href="{{route("register")}}" class="btn btn-primary float-right mb-2 ml-2" >Registrar Usuario</a>

                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                      <th>Cedula</th>
                      <th>Nombres</th>
                      <th>Email</th>
                      <th>Opciones</th>

                    </tr>
                   </thead>
                   <tbody>
                   @foreach($users as $user)

                       <tr>
                        <td>{{$user->cedula}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td>


                               <a class="btn btn-danger" href="{{route("register.destroy",['user' => $user->id])}}">
                                   <i class="fa fa-trash"></i>
                               </a>

                               <a class="btn btn-warning" href="{{route("register.edit",['user' => $user->id])}}">
                                   <i class="fa fa-edit"></i>
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
