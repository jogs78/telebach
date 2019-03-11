@extends('layouts.app') @section('main-content')
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
            <tr><td>{{$asignar->period_id}}
               </td>
    			<td>{{$asignar->grupo_id}}</td>
    			<td>{{$asignar->matter_id}}</td>

    			<td>



                              <a href="{!! route('estructura.edit', [$asignar->id]) !!}"><i class="glyphicon glyphicon-edit">Editar</i></a>




                            </td>
                </tr>
                @endforeach
    		</tbody>
    	</table>
    </div>
    </div>
@stop