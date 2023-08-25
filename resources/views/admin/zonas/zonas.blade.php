@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Zonas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Zonas</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

 @endsection

@section('contenido')



<div class="container-fluid">

    <div class="pb-3">
    <a class="btn btn-primary float-let" href="{{route("zonas")}}">Actulizar Zonas</a>
    </div>
    <div class="row">
           <div class="col-md-12">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Zonas</h3>
               </div>

               <!-- /.box-header -->
               <div class="card-body">



                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>

                       <th>Identificador Vensatel</th>
                       <th>Identificador Wisphub</th>
                       <th>Nombre</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach ( $zonas as $zona )

                       <tr>
                        <td>
                            {{ $zona->id_zona }}
                        </td>

                        <td>
                            {{ $zona->id_zona_wisphub }}
                        </td>

                        <td>
                            {{ $zona->nombre }}
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
