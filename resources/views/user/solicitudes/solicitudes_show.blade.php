@extends('layout_adm.template')

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitudes de Servicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
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

                <div class="row">

                <div class="col-6">

                <p class=" shadow-none">
                <strong>Cliente:</strong> {{ $solicitudes->name }}</p>
                <p class=" shadow-none">
                <strong>Email:</strong> {{$solicitudes->email}}
                <p class=" shadow-none">
                <strong><a href="https://www.google.com/maps/search/?api=1&query={{ $solicitudes->coordenadas }}" target="_blank">Ver Ubicacion</a></strong>
                <p class=" shadow-none">
                <strong>Estatus:</strong> {{$solicitudes->status->descripcion}}




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


<a class="btn btn-default float-right" href="{{ route('solicitudes') }}">Cerrar</a>
</div>
          </div>
          </form>
          <!-- /.box -->
        </div>



           <div class="col-md-12">
        @include('chat.chat-form') 
        </div>
        
         </div>


   </div>


@endsection
