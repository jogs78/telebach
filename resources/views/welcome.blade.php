<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--nombre de titulo de barra de ventana-->
    <title>@yield('title','Escuela Telebachillerato Núm. 13')</title>
    <link rel="stylesheet" href="css/style.css">
    <!--icono del encabezado de la ventana-->
    <link rel="shorcut icon" href="img1/LOG.ico" type="image/ico"/>
</head>
<body>

    <div  class="myheader">
    <!--icono de parte superior ala iquierda -->
            <div class="dgeti"><a href="#"><img src="img1/IMA.png" height="15%" width="89px" alt=""></a></div>
        <div class="texto"><center>

        <h2>SISTEMA DE CONTROL ESCOLAR</h2>
        <h3>Escuela Telebachillerato Núm. 13
        "Daniel Cosio Villegas" </h3></center>
        </div>
        <img src="img1/sep.png" height="18%" width="18%" alt="">
        </div>
    <div  class="content">
        <div data-vide-bg="video/srix">
<div style="margin: 150px auto;" class="content">

                <div style="height: 110%; width: 110%; " class="admin"><a href="{{ url('/home') }}"><span class="log"><img src="img1/e.jpg" alt=""></span>inicia session</a></div> <br> <br>
{{--
                <div class="docente"><a href="{{ url('/login') }}"><span class="log"><img src="img1/docente1.png" alt=""></span>Docente</a></div><br> <br>
 --}}

</div>

</div>

</body>
</html>