    @extends('layouts.app')

    @section('main-content')

    <div class="container">

        @include('sweet::alert')

        <div class="row">
            <h1 class="pull-left">Agregar materias al grupo <button class="btn bg-maroon">{{ $group->name }}</button></h1>
        </div>

        <div class="row">
            @if($matters->isEmpty())
            <div class="well text-center">No hay registros.</div>
            @else
            <form action="{{ url('addingmatter') }}" method="POST">
            {{ csrf_field() }}
                <table class="table" id="groups">
                    <thead>
                        <th>Seleccionar</th>
                        <th>Materia</th>
                        <th>Clave</th>
                        <th>Descripción</th> 
                    </thead>
                    <tbody>

                        @foreach($matters as $matter)
                        <tr>
                            <td><input type="checkbox" name="rows[{{ $matter->id }}][id]" value="{{ $matter->id }}"></td>
                            <td>{{ $matter->name }}</td>
                            <td>{{ $matter->key }}</td>
                            <td>{!! $matter->description !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="id_group" value="{{ $group->id }}">
                <input type="submit" class="btn bg-navy" value="AGREGAR MATERIAS">
            </form>
            @endif
        </div>
    </div>
    @endsection