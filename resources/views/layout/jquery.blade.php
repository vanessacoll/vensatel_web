 	    <script type="text/javascript" src="{{asset("template/jquery.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("template/bootstrap.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("template/plugins.js")}}"></script>

        <script type="text/javascript" src="{{asset("template/main.js")}}"></script>

        <script>
function enviar(){

 // alert("hola");
  jQuery.ajax({


                  url: "{{ url('/enviar') }}",
                  method: 'get',
                  data: {

                     name: jQuery('#cf-name').val(),
                     email: jQuery('#cf-email').val(),
                     subject: jQuery('#cf-subject').val(),
                     message: jQuery('#cf-message').val(),

                  },
                  success: function(result){

                    if(result.errors)
                    {

                    //$('#text3').text(result.errors);

                    //$('#request_denied').modal('show');
                    alert("ERORR");

                    }
                    else
                    {

                      alert("hola");

                    // $('#text1').text(result.success.plan);
                    // $('#text5').text(result.success.ubicacion);
                    // $('#text2').text(result.success.user);
                    // $('#text4').text(result.success.pass);

                    // $('#approved_payment').modal('show');

                    }
    }});

}

</script>

        <script>
function enviar_sus(){

 // alert("hola");
  jQuery.ajax({


                  url: "{{ url('/suscribir') }}",
                  method: 'get',
                  data: {

                     nombre: jQuery('#nombre').val(),
                     email: jQuery('#email').val(),
                     telefono: jQuery('#telefono').val(),
                     direccion: jQuery('#address-input').val(),
                     inmueble: jQuery('#inmueble').val(),
                     latitude: jQuery('#address_latitude').val(),
                     longitude: jQuery('#address_longitude').val(),

                  },
                  success: function(result){

                    if(result.errors)
                    {

                    //$('#text3').text(result.errors);

                    //$('#request_denied').modal('show');
                    alert("ERORR");

                    }
                    else
                    {

                      alert("hola1");

                    // $('#text1').text(result.success.plan);
                    // $('#text5').text(result.success.ubicacion);
                    // $('#text2').text(result.success.user);
                    // $('#text4').text(result.success.pass);

                    // $('#approved_payment').modal('show');

                    }
    }});

}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initAutocomplete&libraries=places&v=weekly"async></script>

<script>

	// This method will be initialised by our script call-back
function initAutocomplete() {
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
  // here we are getting the input keywords in locationInput constant
    const locationInputs = document.getElementsByClassName("map-input");

    const autocompletes = [];
    const geocoder = new google.maps.Geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];
        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;


        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;
        autocompletes.push({input: input , autocomplete: autocomplete});
      // manipulating our latitude and longitude to send it to autocomplete method
    }

    for (let i = 0; i < autocompletes.length; i++) {
        const input = autocompletes[i].input;
        const autocomplete = autocompletes[i].autocomplete;

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            const place = autocomplete.getPlace();
            // this place variable will fetch the places mathed to your keyword
            geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    const lat = results[0].geometry.location.lat();
                    const lng = results[0].geometry.location.lng();
                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            });

            if (!place.geometry) {
                alert("No details available for input: '" + place.name + "'");
                input.value = "";
                return;
            }

        });
    }
}

function setLocationCoordinates(key, lat, lng) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");
    latitudeField.value = lat;
    longitudeField.value = lng;
    console.log(lat);
    console.log(lng);
}
</script>
