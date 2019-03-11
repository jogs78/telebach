@extends('layouts.app')@section('main-content')@include('sweet::alert')
 <div class="container">

    <div class="row"><h1 class="pull-left">Semestres y especialidades</h1></div>
    <div class=" row">
        @if($degree->isEmpty())
        <div class="well text-center">No hay registros</div>
        @else
        <table class="table" id="degrees">
            <thead>
                <th>Nombre</th>

                <th>Descripcion</th>
                <th>Accion</th>
                  </thead>
            <tbody>
                @foreach($degree as $degrees)
                <tr>
                    <td>{{$degrees->nombre}}</td>
                    <td>{{$degrees->descripcion}}</td>


                    <td> <button class="btn btn-info" data-name="{{$degrees->nombre}}" data-descripcion="{{$degrees->descripcion}}" data-degree_id="{{$degrees->id}}"  data-toggle="modal" data-target="#edit">Edit</button>
                                    /
                                    <button class="btn btn-danger" data-degree_id={{$degrees->id}} data-toggle="modal" data-target="#delete">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>




        <a class="btn btn-primary pull-left" data-toggle="modal" data-target="#myModal">Agregar Materia</a>


@include('degrees.modal')


@stop