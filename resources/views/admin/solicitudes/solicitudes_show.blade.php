@extends('layout_adm.admin_template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitudes de Servicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Solicitudes de Servicio</li>
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
              <h3 class="card-title">Datos de la Solicitud #{{ $solicitudes->id_contact }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

              <form method="GET" action="{{route("solicitudes.actualizar.admin",['solicitudes' => $solicitudes->id_contact])}}">
               @method("PUT")
                @csrf

                @php

                $disabled = '';
                 if($solicitudes->id_status == 4 || $solicitudes->id_status == 7 || $solicitudes->id_status == 8){
                 $disabled = 'disabled';
                }

                @endphp

                <div class="row">

                <div class="col-6">

                <p class=" shadow-none">
                <strong>Cliente:</strong> {{ $solicitudes->name }}</p>
                <p class=" shadow-none">
                <strong>Email:</strong> {{$solicitudes->email}}
                <p class=" shadow-none">
                <strong><a href="https://www.google.com/maps/search/?api=1&query={{ $solicitudes->coordenadas }}" target="_blank">Ver Ubicacion</a></strong>


<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Estatus</label>
    <div class="col-sm-6">
        <select required name="id_status" class="form-control" style="width: 100%;" {{ $disabled }}>
            <option value="">Seleccione</option>
            @foreach($statuses as $status)
                @if($solicitudes->id_status == 1 && in_array($status->id_status, [1, 2, 3, 4]))
                    <option value="{{$status->id_status}}" @if( $solicitudes->id_status == $status->id_status) selected='selected' @endif>{{$status->descripcion}}</option>
                @elseif($solicitudes->id_status == 2 && in_array($status->id_status, [2, 3, 4]))
                    <option value="{{$status->id_status}}" @if( $solicitudes->id_status == $status->id_status) selected='selected' @endif>{{$status->descripcion}}</option>
                @elseif($solicitudes->id_status == 3 && in_array($status->id_status, [3, 7, 8]))
                    <option value="{{$status->id_status}}" @if( $solicitudes->id_status == $status->id_status) selected='selected' @endif>{{$status->descripcion}}</option>
                @elseif($solicitudes->id_status != 1 && $solicitudes->id_status != 2 && $solicitudes->id_status != 3 && $status->id_status != 1)
                    <option value="{{$status->id_status}}" @if( $solicitudes->id_status == $status->id_status) selected='selected' @endif>{{$status->descripcion}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>




                </div>

                <div class="col-6">

                <p class=" shadow-none">
                <strong>Telefono:</strong> {{ $solicitudes->telefono }}</p>


                <p class=" shadow-none">
                <strong>Direccion:</strong> {{ $solicitudes->direccion }}</p>

                <p class=" shadow-none">
                <strong>Fecha de Solicitud:</strong> {{ $solicitudes->date }}</p>


                </div>

                </div>


            </div>

            <div class="card-footer">

<button class="btn  btn-primary" {{ $disabled }}>Actualizar</button>
<a class="btn btn-default float-right" href="{{ route('solicitudes.index.admin') }}">Cerrar</a>
</div>
          </div>
          </form>
          <!-- /.box -->
        </div>



           <div class="col-md-12">

            @livewire("chat-form")

            </div>
         </div>


   </div>


@endsection
