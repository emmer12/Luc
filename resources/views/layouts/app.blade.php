<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
          rel="stylesheet">
    <!-- Bootstrap CSS File -->
  <link href="{{asset("extranet/lib/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Libraries CSS Files -->
  <link href="{{asset("extranet/lib/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href={{ asset("extranet/lib/animate/animate.min.css")}} rel="stylesheet">
    <link href={{ asset("extranet/lib/ionicons/css/ionicons.min.css")}} rel="stylesheet">
    <link href={{ asset("extranet/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">
    <link href={{ asset("extranet/lib/magnific-popup/magnific-popup.css")}} rel="stylesheet">
    <link href={{ asset("extranet/lib/ionicons/css/ionicons.min.css")}} rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href={{ asset("extranet/css/style.css")}} rel="stylesheet">
    {{-- <link href={{ asset("/css/home.css")}} rel="stylesheet"> --}}
</head>
<body>
    <div id="body">

        @include('inc/nav')

          @yield('content')
          

        @include('inc/footer')
    </div>

    <script src={{asset("extranet/lib/jquery/jquery.min.js")}}></script>
    <script src={{asset("extranet/lib/jquery/jquery-migrate.min.js")}}></script>
    <script src={{asset("extranet/lib/bootstrap/assets/extranet/js/bootstrap.bundle.min.html")}}></script>
    <script src={{asset("extranet/lib/easing/easing.min.js")}}></script>
    <script src={{asset("extranet/lib/superfish/hoverIntent.js")}}></script>
    <script src={{asset("extranet/lib/superfish/superfish.min.js")}}></script>
    <script src={{asset("extranet/lib/wow/wow.min.js")}}></script>
    <script src={{asset("extranet/lib/owlcarousel/owl.carousel.min.js")}}></script>
    <script src={{asset("extranet/lib/magnific-popup/magnific-popup.min.js")}}></script>
    <script src={{asset("extranet/lib/sticky/sticky.js")}}></script>
    {{-- <script src={{asset("../cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js")}}></script> --}}
    <!-- Main Javascript File -->
    <script src={{asset("extranet/js/jquery.validate.min.js")}}></script>
    <script src={{asset("extranet/js/main.js")}}></script>
    <script type="text/javascript">

    new WOW().init();

    </script>
</body>
</html>
