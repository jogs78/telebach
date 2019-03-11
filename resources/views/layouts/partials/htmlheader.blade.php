<head>
  <meta charset="UTF-8">
  <title> Telebach - control escolar </title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Datatables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
  <!-- Bootstrap 3.3.4 -->
  <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/skins/skin-black.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/skins/skin-green.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/skins/skin-yellow.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/skins/skin-red.css') }}" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
        <!-- Multiple Select -->
        <link href="{{ asset('/css/multiple-select.css') }}" rel="stylesheet" type="text/css" />
        <!-- Select2 -->
        <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <!--<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Selected all -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
      $('select').select2();
    </script>
    <script type="text/javascript">
      $(".js-example-basic-multiple").select2();
    </script>
    <!-- Languaje -->
    <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDmoFbBRqP6TP9yJcSPFQ3ATerTo0jN9bU">

  </script>
  <script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
      var places = new google.maps.places.Autocomplete(document.getElementById('txt1'));
      google.maps.event.addListener(places, 'place_changed', function () {

      });
    });
  </script>
  <!-- Initialize the plugin: -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#demo').multiselect();
    });
  </script>
  <!-- Sweetalert -->
  <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet"/>
  <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
  <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
</head>
