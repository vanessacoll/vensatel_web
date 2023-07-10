@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Oficinas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Agregar Oficinas</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

 @endsection

@section('contenido')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Registro de Oficinas<small>.</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{ route('admin.oficina.crear') }}" method="POST"   enctype="multipart/form-data" >

              @csrf
              <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <div id="">
                                <label for="solicitud">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion de oficina">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div id="">
                                <label for="solicitud">Ubicacion</label>
                                <input type="text" name="ubicacion" class="form-control" placeholder="Ubicacion de oficina">
                            </div>
                        </div>
                    </div>

                </div>
                 
       
                  
                
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


@endsection
