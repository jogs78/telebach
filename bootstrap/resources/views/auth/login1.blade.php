
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<!--nombre de titulo de barra de ventana-->
	<title>Escuela Telebachillerato Núm. 13</title>
	<link rel="stylesheet" href="css/style.css">
	<!--icono del encabezado de la ventana-->
	<link rel="shorcut icon" href="img/LOG.ico" type="image/ico"/>
</head>
<body>
	<div class="header">
	<!--icono de parte superior ala iquierda -->
			<div class="dgeti"><a href="index.php"><img src="img/IMA.png" height="15%" width="89px" alt=""></a></div>
		<div class="texto"><center>
		
		<h2>SISTEMA DE CONTROL ESCOLAR</h2>
		<h3>Escuela Telebachillerato Núm. 13 
		Daniel Cosio Villegas" </h3></center>
		</div>
		<img src="img/sep.png" height="18%" width="18%" alt="">
        </div>
	<div class="content">
				
							                         <!--me mandara al administrado-->
						<h3><span class="log"><img src="img/administrador.png" alt=""></span>Administrador</h3>
				

				<!--formulario-->
				<div class="cuadrologin">
					<form action= "{{ url('/login') }}" method="POST">
						<label>ingrese su usuario aqui para acceder al sistema: </label>
						 <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="correo" value="{{old('email')}}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-md btn-primary btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
            </div><!-- /.col -->
        </div>
						<input type="submit" value="accesar"/>

					</form>
					<!--logo para cada usuario-->
					<div class="logo"><img src="img/IMA.png" alt=""></div>
				</div>
		
		
<!--	</div>  -->
</body>
</html>