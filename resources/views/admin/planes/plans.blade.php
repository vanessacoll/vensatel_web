@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Planes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Planes</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

 @endsection

@section('contenido')
 


<div class="container-fluid">

    <div class="pb-3">
    <a class="btn btn-primary float-let" href="{{route("plan")}}">Actulizar Planes</a>
    </div>    
    <div class="row">
           <div class="col-md-12">
             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Planes</h3>
               </div>
              
               <!-- /.box-header -->
               <div class="card-body">

                

                   <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>

                       <th>Identificador Vensatel</th>
                       <th>Identificador Wisphub</th>
                       <th>Nombre</th>
                       <th>Tipo</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach ( $planes as $p )
                        
                       <tr>
                        <td>
                            {{ $p->id_plan }}
                        </td>
                        
                        <td>
                            {{ $p->id_plan_wisphub }}
                        </td>

                        <td>
                            {{ $p->nombre }}
                        </td>
                         
                        <td>
                            {{ $p->tipo }}
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
             {{-- <a class="btn btn-primary float-let" href=''>Actulizar Planes</a> --}}

            </div>
             </div>
             <!-- /.box -->
           </div>
         </div>


   </div>





@endsection
