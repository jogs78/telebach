@extends('layouts.app') @section('main-content')
<div class="container">

	@include('sweet::alert')

	<div class="row">
		<h1 class="pull-left">Asignar materias al docente</h1>


	</div><div class="row">

			<!-- /.box-header -->

				<table class="table" id="">
					<thead>

						<th>Ciclo Escolar</th>
						<th>Materia</th>
						<th>Grupo</th>

<th>asignar docente</th>
						<th>Ver asignacion</th>
						<th>Eliminar Asignacion</th>
					</thead>
					<tbody>@foreach($asignaciones as $asignacion)
						<tr>
						{{-- <td>{!!$asignacion->id!!}</td> --}}
						 @include('docent_group_class.view-matters')
<td>
								{!! $asignacion->np !!}
							</td>
							<td>{!! $asignacion->nombre_materia !!}</td>
							<td>{!! $asignacion->nombre_grupo !!}</td>

							<td>

		{{--					<a class="btn btn-primary pull-right" style="margin-top: 25px" !!}">Crear carga docente</a>

glyphicon-remove"></i></a>
 --}}


							  <a href="{!! route('asignaciones.edit', [$asignacion->id]) !!}">asignar docente  <i class="glyphicon glyphicon-plus-sign"></i></a>


{{--
								<td> <button type="button" class="uppercase btn bg-navy" data-docente_id="{{$asignacion->docente_id}}" data-asignacion_id="{{$asignacion->id}}" data-toggle="modal" data-target="#viewMatters">Agregar docente <i class="glyphicon glyphicon-plus-sign">	</i></button></td>--}}

</td>
							<td>	  @foreach(App\DocentGroupClass::where('id','=',$asignacion->id)->get() as $element)
        @php
        $materia = App\Models\Matter::find($element->materia_id);
          $group = App\Models\Group::find($element->grupo_id);
          $period = App\Models\Period::find($element->periodo_id);
          $usuarios=App\User::find($element->docente_id);



@endphp

@if(is_null($usuarios))
<h4>No hay maestros asignado</h4>
@else
<h4 style="color: red" class="modal-title">
Profesor:  {{$usuarios->nombre.' '.$usuarios->apellido_paterno. '  ' .$usuarios->apellido_materno}}</h4>
@endif
  @endforeach
</td>

<td>

							   <a href="{!! route('asignaciones.delete', [$asignacion->id]) !!}" onclick="return confirm('¿Está seguro quiere borrar esta asignacion?')"><i class="glyphicon glyphicon-remove">Eliminar</i></a></td>
</td>

						</tr>
			@endforeach
					</tbody>
				</table>
			</div>

		</div>


@endsection