@extends('layout_adm.template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pago Movil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/pagos">Pagos</a></li>
              <li class="breadcrumb-item active">Pago Movil</li>
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

            <div class="callout callout-primary p-2 mb-3">
                <h5><i class="fas fa-credit-card ml-3 mt-3"></i> Vensatel </h5>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="card-title">Teléfono: 0424-9147616</h6>
                            <br>
                            <h6 class="card-title">Documento: J-41235318-7</h6>
                            <br>
                            <h6 class="card-title">Banco Mercantil</h6>
                        </div>  
                    </div>
                </div>
                
            </div>

             <div class="card card-primary">
               <div class="card-header">
                 <h3 class="card-title">Registrar Pago Movil</h3>
               </div>
               <form method="GET" action="{{route("pago.movil.registrar")}}">
                @csrf
               <div class="card-body">


               <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" data-inputmask='"mask": "+58(999) 999-9999"' data-mask placeholder="Ingrese numero de telofono">
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fecha de Pago:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Ingrese fecha de Pago" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="referencia">Numero de referencia</label>
            <input type="text" name="referencia" class="form-control" id="referencia" placeholder="Ingrese numero de referencia">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="text" name="monto" class="form-control" id="monto" oninput="validarMonto(this)" value="0.00" placeholder="Ingrese monto">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="concepto">Concepto de pago</label>
            <select required name="concepto" class="form-control" style="width: 100%;" id="concepto">
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
                <input type="text" name="solicitud" class="form-control" placeholder="Ingrese numero de su solicitud de servicio">
            </div>
        </div>
    </div>
</div>

</div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar Pago</button>
        <a class="btn btn-default float-right" href="{{route("home")}}">Cerrar</a>
    </div>
               </form>
             </div>
             <!-- /.box -->
           </div>
         </div>


   </div>



@endsection
