@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pagos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Pagos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

 @endsection

@section('contenido')

<div class="container-fluid">

    <div class="row">
    

       <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos del Pago</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              <form method="GET" action="{{route("pagos.actualizar.admin",['pagos' => $pagos->id_pago])}}">
               @method("PUT")
                @csrf

                @php 

                $disabled = ''; 
                 if($pagos->id_status == 6){
                 $disabled = 'disabled';
                }

                @endphp

                <div class="row">

                <div class="col-6">

                <p class=" shadow-none">
                <strong>Cliente:</strong> {{ $pagos->user->name }}</p>
                <p class=" shadow-none">
                <strong>Metodo de pago:</strong> {{$pagos->metodo->descripcion}} 
                <p class=" shadow-none">
                <strong>Descripcion del pago:</strong> {{ $pagos->concepto->descripcion }}
                @if($pagos->id_concepto == 1)
                <p class=" shadow-none">
                <strong>Solicitud:</strong> #{{ $pagos->id_contact }}
                @endif


<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Estatus</label>
    <div class="col-sm-6">
        <select required name="id_status" class="form-control" style="width: 100%;" {{ $disabled }}>
            <option value="">Seleccione</option>
            @foreach($statuses as $status)
                    <option value="{{$status->id_status}}" @if( $pagos->id_status == $status->id_status) selected='selected' @endif>{{$status->descripcion}}</option>
            @endforeach
        </select>
    </div>
</div>


                </div>

                <div class="col-6">

                <p class=" shadow-none">
                <strong>Fecha de Pago:</strong> {{ $pagos->fecha }} 
                @if(isset($pagos->hora))
                <strong>Hora:</strong> {{ $pagos->hora }}
                @endif
                </p>
                    
                <p class=" shadow-none">
                <strong>Monto:</strong> {{ $pagos->monto }}</p>

                <p class=" shadow-none">
                <strong>Referencia:</strong> {{ $pagos->referencia }}</p>

                @if(isset($pagos->telefono))
                <p class=" shadow-none">
                <strong>Telefono:</strong> {{ $pagos->telefono }}
                @endif

                @if(isset($pagos->comprobante))
                <p class=" shadow-none">
                <strong>Comprobante de Pago:</strong> {{ $pagos->comprobante }}
                @endif

                @if(isset($pagos->id_oficina))
                <p class=" shadow-none">
                <strong>Comprobante de Pago:</strong> {{ $pagos->oficinas->descripcion }}
                @endif
                
                @if (isset($pagos->comprobante))
              <a class="btn btn-primary" href="{{route("download", ['pagos'=> $pagos->comprobante])}}">
                  Descargar
              </a>
              @endif

                </div>

                </div>

       
                     
            </div>

            <div class="card-footer">

               <button class="btn  btn-primary" {{ $disabled }}>Actualizar</button>
              <a class="btn btn-default float-right" href="{{ route('pagos.index.admin') }}">Cerrar</a>
            </div>
          </div>
          </form> 
          <!-- /.box -->
        </div>



         </div>


   </div>


@endsection
