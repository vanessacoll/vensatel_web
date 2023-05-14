s<script src="{{asset("page_template/js/popper.min.js")}}"></script>
<script src="{{asset("page_template/js/bootstrap.min.js")}}"></script>
<script src="{{asset("page_template/js/anchor.min.js")}}"></script>
<script src="{{asset("page_template/js/is.min.js")}}"></script>
<script src="{{asset("page_template/js/chart.min.js")}}"></script>
<script src="{{asset("page_template/js/countUp.umd.js")}}"></script>
<script src="{{asset("page_template/js/echarts.min.js")}}"></script>
<script src="{{asset("page_template/js/dayjs.min.js")}}"></script>
<script src="{{asset("page_template/js/all.min.js")}}"></script>
<script src="{{asset("page_template/js/lodash.min.js")}}"></script>
<script src="{{asset("page_template/js/prism.js")}}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset("page_template/js/list.min.js")}}"></script>
<script src="{{asset("page_template/js/theme.js")}}"></script>
<script src="{{asset("page_template/js/typed.js") }}"></script>

<script src="{{asset("page_template/js/swiper-bundle.min.js")}}"></script>

<script src="{{asset("page_template/js/leaflet.js")}}"></script>
<script src="{{asset("page_template/js/leaflet.markercluster.js")}}"></script>
<script src="{{asset("page_template/js/leaflet-tilelayer-colorfilter.min.js")}}"></script>

<script src="{{asset("adminlte/plugins/toastr/toastr.min.js")}}"></script>


<script>

function enviar(){

    if(validaForm(1)){

     jQuery.ajax({

                  url: "{{ url('/enviar') }}",
                  method: 'get',
                  data: {

                     name: jQuery('#name').val(),
                     email: jQuery('#email').val(),
                     subject: jQuery('#asunto').val(),
                     message: jQuery('#message').val(),

                  },
                  success: function(result){

                    if(result.errors)
                    {

                    toastr.error(result.errors)

                    }
                    else
                    {

                    toastr.success('Mensaje Enviado exitosamente.')

                      $('#name').val('');
                      $('#email').val('');
                      $('#asunto').val('');
                      $('#message').val('');

                    }
    }});

    }else{

    toastr.warning('No puede enviar campos vacios.')

    }

}

function solicitudservicio(){

if(validaForm(2)){

 jQuery.ajax({

              url: "{{ url('/suscribir') }}",
              method: 'get',
              data: {
                 nombres:   jQuery('#nombres').val(),
                 cedula:    jQuery('#cedula').val(),
                 telefono:  jQuery('#telefono').val(),
                 email:     jQuery('#email').val(),
                 direccion: jQuery('#direccion').val(),
                 latitud:   jQuery('#latitud').val(),
                 longitud:  jQuery('#longitud').val(),
              },
              success: function(result){

                if(result.errors)
                {

                toastr.error(result.errors)

                }
                else
                {

                toastr.success('Solicitud enviada exitosamente, por favor verifique si correo.')

                  $('#nombres').val('');
                  $('#cedula').val('');
                  $('#telefono').val('');
                  $('#email').val('');
                  $('#direccion').val('');
                  $('#latitud').val('');
                  $('#longitud').val('');

                }
}});

    }else{

    toastr.warning('No puede enviar campos vacios.')

    }

}

function validaForm(form){

    if(form==1){

        if($("#name").val() == "" || $("#email").val() == "" || $("#asunto").val() == "" || $("#message").val() == ""){

        return false;

        }

        return true;

    }elseif(form==2){

        if($("#nombres").val() == "" || $("#cedula").val() == "" || $("#telefono").val() == "" || $("#email").val() == "" || $("#direccion").val() == ""){

        return false;

        }

        return true;
    }
}

</script>


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
