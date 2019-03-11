@extends('layouts.app')@section('main-content')@include('sweet::alert')
<div class="container">
<div class="row"><h1 class="pull-left">Materias</h1></div>
	<div class=" row">
		{{--@if($matters->isEmpty())
		<div class="well text-center">No hay registros</div>
		@else--}}
		<table class="table" id="materias">
			<thead>
				<th>Nombre</th>
				<th>Clave</th>
				<th>Descripcion</th>
				<th>unidades</th>
				<th>semestres y especialidades</th>
				</thead>
			<tbody>
				@foreach($iner as $matters)
				<tr>
					<td>{{$matters->nombre}}</td>
					<td>{{$matters->clave}}</td>
					<td>{{ $matters->descripcion}}</td>
					<td>{{$matters->unidades}}</td>
					<td>{{$matters->especialidad_id}}</td>

					<td> <button class="btn btn-info" data-name="{{$matters->nombre}}" data-key="{{$matters->clave}}" data-descripcion="{{$matters->descripcion}}" data-unidades="{{$matters->unidades}}"  data-degree_id="{{$matters->especialidad_id}}" data-matter_id="{{$matters->id}}"  data-toggle="modal" data-target="#edit">Editar</button>
									/
				<button class="btn btn-danger" data-matter_id={{$matters->id}} data-toggle="modal" data-target="#delete">Eliminar</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	{{--     	@endif--}}
	</div>
</div>





		<a class="btn btn-primary pull-left" data-toggle="modal" data-target="#myModal">Agregar Materia</a>



@include('matter.modal')


@stop