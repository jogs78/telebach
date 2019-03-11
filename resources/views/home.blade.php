@extends('layouts.app')

@section('htmlheader_title')
inicio
@endsection


@section('main-content')
<?php
$directors=App\User::usuarios();
$docent=App\User::usuarios1();
//$directors = App\User::usuarios();
//$director=App\User::count($directors);
/*$docents = App\Models\Docent::count();
$students = App\Models\Student::count();
$period_active = DB::select('select * from periods where status = ?', ['Activo']);*/
?>
@include('flash::message')
<div class="container spark-screen">
	@role('admi')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{{--<div class="col-md-4">
				<div class="info-box">
					<!-- Apply any bg-* class to to the icon to color it -->
					<span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Directores dados de alta</span>
						<span class="info-box-number">{!!count($directors) !!}</span>
				</div><!-- /.info-box -->
			</div>
			</div> --}}
			<div class="col-md-4">
				<div class="info-box">
					<!-- Apply any bg-* class to to the icon to color it -->
					<span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Docentes dados de alta</span>
							<span class="info-box-number">{!!count($docent)!!}</span>
					</div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>



		</div>
	</div>

				<!-- /.box-header -->


		<!-- /.col -->
		@endrole
		@role('docent')

						<?php
                $user = Auth::user();





                ?>

                <h1>Bienvenido Profresor</h1>
				</div><!-- /.info-box -->


						@endrole



									</div>
									@endsection
