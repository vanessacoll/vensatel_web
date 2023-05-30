@extends('layout_adm.template')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Registro de pagos <small>transferencia</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
                 
                <div class="row">
                    <div class="col-6 my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo de tranferencia</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Selecione el tipo de transacción...</option>
                        <option value="1">Tranferencias</option>
                        <option value="2">Divisa</option>
                        </select>
                    </div>
               
                    <div class="col-6">
                        <div class="form-group">
                            <label>Fecha</label>
                            <div class="md-form md-outline input-with-post-icon datepicker">
                              <input placeholder="Select date" type="date" id="example" class="form-control">
                            </div>
                        </div>
                    </div>  
                </div>

                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="mr-sm-2">Referencia de tranferencia</label>
                            <input type="text" class="form-control" placeholder="Referencia">
                          </div>
                    </div>
                  
                    <div class="col-4">
                        <div class="form-group">
                            <label class="mr-sm-2">Monto transferido</label>
                            <input type="text" class="form-control" placeholder="Monto">
                        </div>
                    </div>
                      <div class="col-4 my-1">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Concepto de pago</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Seleccione un Concepto de pago...</option>
                        <option value="2">Tranferencias</option>
                        <option value="3">Divisa</option>
                        </select>
                    </div>
                 </div>
                 
                 <br>

                <div class="row">
                  <div class="col-12">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                      <label class="custom-file-label" for="customFileLang">Ajusta comprobante de pago</label>
                    </div>
                  </div>
                </div>
                 
                <div class="row my-3">
                  <div class="col-6">
                    <div class="form-group">
                        <label class="mr-sm-2">Numero de Solicitud</label>
                        <input type="text" class="form-control" placeholder="Numero">
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
