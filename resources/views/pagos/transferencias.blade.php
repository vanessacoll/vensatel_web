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
            <form  action="{{ route('pagos.transferencias-comprobante') }}" method="POST" enctype="multipart/form-data" >

              @csrf
              <div class="card-body">
                 
                    <div class="row">
                        <div class="col-6 my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo de tranferencia</label>
                            <select class="custom-select mr-sm-2" name="id_metodo" id="inlineFormCustomSelect">
                            <option selected>Selecione el tipo de transacción...</option>
                                          @foreach($metodoPago as $modelo)
                                            <option value="{{$modelo->id_metodo}}">
                                              {{$modelo->descripcion}} 
                                            </option>
                                          @endforeach
                            </select>
                        </div>
                  
                        <div class="col-6">
                            <div class="form-group">
                              <label>Fecha</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" name="fecha" class="form-control datetimepicker-input"/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                      <div class="col-6">
                          <div class="form-group">
                              <label class="mr-sm-2">Referencia de tranferencia</label>
                              <input type="text" name="referencia" class="form-control" placeholder="Referencia">
                            </div>
                      </div>
                    
                      <div class="col-6">
                          <div class="form-group">
                              <label class="mr-sm-2">Monto transferido</label>
                              <input type="text" name="monto" class="form-control" placeholder="Monto">
                          </div>
                      </div>
                  </div>
                  
                  <br>

                  <div class="row">
                    <div class="col-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFileLang" lang="es">
                        <label class="custom-file-label" for="customFileLang">Ajusta comprobante de pago</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row my-3">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="concepto">Concepto de pago</label>
                            <select required name="id_concepto" class="form-control" style="width: 100%;" id="concepto">
                                <option value="">Seleccione</option>
                                @foreach($conceptoPagos as $concepto)
                                <option value="{{$concepto->id_concepto}}">
                                    {{$concepto->descripcion}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                      <div class="col-md-6">
                          <div class="form-group">
                              <div id="campoAdicional" style="display: none;">
                                  <label for="solicitud">Numero de Solicitud</label>
                                  <input type="text" name="id_contact" class="form-control" placeholder="Ingrese numero de su solicitud de servicio">
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
