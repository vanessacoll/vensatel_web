@extends('layout_adm.template')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pago en Oficina</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pagos">Pagos</a></li>
              <li class="breadcrumb-item active">Pago en Oficina</li>
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
              <h3 class="card-title">Registro de pago en oficina</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{ route('pagos.pago_en_oficinaCita') }}" method="POST"   enctype="multipart/form-data" >

              @csrf
              <div class="card-body">
                 
                    <div class="row">
                        <div class="col-6 my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Oficina</label>
                            <select class="custom-select mr-sm-2" name="id_oficina" id="inlineFormCustomSelect" required>
                            <option selected>Selecione la Oficina...</option>
                                                  @foreach($oficinas as $modelo)
                                            <option value="{{$modelo->id_oficina}}">
                                              {{$modelo->descripcion}} 
                                            </option>
                                          @endforeach 
                            </select>
                        </div>
                  
                        <div class="col-6">
                            <div class="form-group">
                              <label>Fecha</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" name="fecha" placeholder="Fecha de visita" class="form-control datetimepicker-input" required />
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <label for="">Hora</label>
                        <div class="input-group ">
                          <input type="time" name="hora" class="form-control" required>
                          <div class="input-group-append">
                           
                          </div>
                        </div>
                      </div>
                                
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="concepto">Motivo</label>
                            <select required name="id_concepto" class="form-control" style="width: 100%;" id="concepto" required>
                                <option value="">Seleccione Motivo...</option>
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
                  <button type="submit" class="btn btn-primary">Registrar Pago</button>
                  <a class="btn btn-default float-right" href="{{route("home")}}">Cerrar</a>
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