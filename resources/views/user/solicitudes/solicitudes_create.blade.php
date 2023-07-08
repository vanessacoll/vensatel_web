@extends('layout_adm.template')

@section('styles')

<link href="{{asset("page_template/css/leaflet.css")}}" rel="stylesheet">

    <link href="{{asset("page_template/css/MarkerCluster.css")}}" rel="stylesheet">
    <link href="{{asset("page_template/css/MarkerCluster.Default.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

@endsection

 @section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrar Solicitudes de Servicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/solicitudes">solicitudes</a></li>
              <li class="breadcrumb-item active">Registrar Solicitudes de Servicio</li>
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
                 <h3 class="card-title">Crear nueva solicitud de servicio</h3>
               </div>

                <form method="GET" action="{{route("solicitudes.registrar")}}">
                    @csrf
                   <div class="card-body">


   <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula"  placeholder="Ingrese cedula">
            </div>
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <label for="telefono">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres">
            </div>
        </div>
     </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="telefono">telefono</label>
                <input type="text" name="telefono" data-inputmask='"mask": "+58(999) 999-9999"' data-mask class="form-control" id="telefono" placeholder="Ingrese numero de Telefono" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese Email" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Seleccione su direccion en el mapa" required  readonly>
            </div>
        </div>
    </div>


        <input type="text" id="latitud" name="latitud" hidden>
            <input type="text" id="longitud" name="longitud" hidden>


            <div class="col-md-12">

          <div id="map" style="height:300px; width: 950px"></div>


        </div>


    </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Crear Solicitud</button>
            <a class="btn btn-default float-right" href="{{route("home")}}">Cerrar</a>
        </div>
                   </form>
             <!-- /.box -->

         </div>


   </div>
    </div>
</div>


@endsection

@section('scripts')

<script src="{{asset("page_template/js/leaflet.js")}}"></script>
<script src="{{asset("page_template/js/leaflet.markercluster.js")}}"></script>
<script src="{{asset("page_template/js/leaflet-tilelayer-colorfilter.min.js")}}"></script>

<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>

var mymap = L.map('map').setView([8.295943, -62.731281], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
  maxZoom: 18
}).addTo(mymap);

var marker = L.marker([8.295943, -62.731281], { draggable: true }).addTo(mymap);

marker.on('dragend', function(e) {
  obtenerDireccion(e.target.getLatLng());
  obtenerCoordenadas(e.target.getLatLng());
});

function obtenerDireccion(latlng) {
  axios.get('https://nominatim.openstreetmap.org/reverse', {
    params: {
      lat: latlng.lat,
      lon: latlng.lng,
      zoom: mymap.getZoom(),
      addressdetails: 1,
      format: 'json'
    }
  }).then(function(response) {
    var address = response.data.display_name;
    document.getElementById('direccion').value = address;
  }).catch(function(error) {
    console.log(error);
  });
}

function obtenerCoordenadas(latlng) {
  document.getElementById('latitud').value = latlng.lat;
  document.getElementById('longitud').value = latlng.lng;
}

mymap.on('dblclick', function(e) {
  marker.setLatLng(e.latlng);
  obtenerDireccion(e.latlng);
  obtenerCoordenadas(e.latlng);
});

document.getElementById('direccion').addEventListener('input', function() {
  var direccion = document.getElementById('direccion').value;
  axios.get('https://nominatim.openstreetmap.org/search', {
    params: {
      q: direccion,
      format: 'json'
    }
  }).then(function(response) {
    var latlng = [response.data[0].lat, response.data[0].lon];
    marker.setLatLng(latlng);
    obtenerCoordenadas(latlng);
  }).catch(function(error) {
    console.log(error);
  });
});

</script>

<script>

// No quitar esto porque sino le entra el demonio y no funciona el mapa
    $(document).ready(function() {
        $('#exampleModal').on('shown.bs.modal', function() {
            // Inicializa el mapa
            var map = L.map('map').setView([51.505, -0.09], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
                maxZoom: 18,
            }).addTo(map);

            // Invalida el tamaño del mapa para forzar una actualización
            map.invalidateSize();
        });
    });
    </script>

@endsection
