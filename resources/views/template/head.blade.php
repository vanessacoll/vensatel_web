<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Vensatel</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="template/images/icono.png">
    <link rel="apple-touch-icon" href="template/images/icono.png">
    <link rel="apple-touch-icon" sizes="72x72" href="template/images/icono.png">
    <link rel="apple-touch-icon" sizes="114x114" href="template/images/icono.png">


    <script src="{{asset("page_template/js/config.js")}}"></script>
    <script src="{{asset("page_template/js/simplebar.min.js")}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <link href="{{asset("page_template/css/simplebar.min.css")}}" rel="stylesheet">
    <link href="{{asset("page_template/css/theme-rtl.min.css")}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset("page_template/css/theme.min.css")}}" rel="stylesheet" id="style-default">
    {{--<link href="{{asset("assets/template_dark/css/choices.min.css")}}" rel="stylesheet">--}}
    <link href="{{asset("page_template/css/select2.min.css")}}" rel="stylesheet">
    <link href="{{asset("page_template/css/prism-okaidia.css")}}" rel="stylesheet">
    <link href="{{asset("adminlte/plugins/toastr/toastr.min.css")}}" rel="stylesheet">

    <link href="{{asset("page_template/css/leaflet.css")}}" rel="stylesheet">

    <link href="{{asset("page_template/css/MarkerCluster.css")}}" rel="stylesheet">
    <link href="{{asset("page_template/css/MarkerCluster.Default.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />



    <link href="{{asset("page_template/css/swiper-bundle.min.css")}}" rel="stylesheet">

    <link href="../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>

    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  </head>
