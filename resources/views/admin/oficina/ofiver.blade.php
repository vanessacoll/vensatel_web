@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Oficinas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Oficinas</li>
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
                 <h3 class="card-title">Oficina</h3>
               </div>
              
               <!-- /.box-header -->
               <div class="card-body">

                

                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>

                       <th>Descripcion</th>
                       <th>Ubicacion</th>
                       <th>Opciones</th>
                    </tr>
                   </thead>
                   <tbody>
                   @foreach($oficinas as $datos)

                       <tr>
                        <td>{{$datos->descripcion}}</td>
                        <td>{{$datos->ubicacion}}</td>

                           <td>
                            <div class="row">
                              <div class="col-md-2"> <!-- Esto crea un espacio entre los botones -->
                                  <a class="btn btn-primary" href="{{ route('admin.oficina.ofieditar', $datos) }}">
                                      <i class="fa fa-edit"></i>
                                  </a>
                              </div>
                          
                              <div class="col-md-2"> <!-- Esto crea un espacio entre los botones -->
                                  <form method="POST" action="{{ route('admin.oficina.destroy', $datos) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-primary">
                                          <i class="fas fa-trash"></i> 
                                      </button>
                                  </form>
                              </div>
                          </div>
                          

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
             <a class="btn btn-primary float-let" href="{{ route('admin.oficina.oficina') }}">   Agregar Oficina</a>
            </div>
             </div>
             <!-- /.box -->
           </div>
         </div>


   </div>



@endsection
