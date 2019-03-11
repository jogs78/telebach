@extends('layouts.app') @section('main-content')@if($activos->isEmpty())
<div class="row">
    <div class="container">
        <div class="well text-center"><h2>No hay periodo Activo, por favor activa un periodo para poder asignar materias a los grupos</h2></div>
        <a href="{{url('/periods')}}"><h1>Activar un periodo Aqui haz un clic</h1><i class="glyphicon glyphicon-circle-arrow-up"></i></a></div>
    </div>
    @else
    @foreach($activos as $item) @if($item->estado=='Activo')
@endif
@endforeach

<div class="container">
	@include('sweet::alert')
	<div class="row">
		<h1 class="pull">asignar materias a los grupos</h1>

<a class="btn btn-primary pull-left" style="margin-top: 5px" href="{!! route('estructura.create') !!}">Agregar nuevo</a>
    </div>
    <div class="row">
    	<table class="table">
    		<thead>

            <th>periodo</th>
    			<th>grupos</th>
    			<th>materias</th>
    			<th>accion</th>

    		</thead>
    		<tbody>
            @foreach($asignaciones as $asignar)
            <tr><td>{{$asignar->periodo_id}}
               </td>
    			<td>{{$asignar->grupo_id}}-{{$asignar->turno}}</td>
    			<td>{{$asignar->matter_id}}</td>


    			<td>



                              <a href="{!! route('estructura.edit', [$asignar->id]) !!}"><i class="glyphicon glyphicon-edit">Editar</i></a>


                               <a href="{!! route('estructura.delete', [$asignar->id]) !!}" onclick="return confirm('¿Está seguro quiere borrar esta asignacion?')"><i class="glyphicon glyphicon-remove">Eliminar</i></a></td>


                            </td>
                </tr>
                @endforeach
    		</tbody>
    	</table>
    </div>
    </div>
@endif
@stop