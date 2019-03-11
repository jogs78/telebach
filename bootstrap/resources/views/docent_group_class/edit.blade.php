
@extends('layouts.app')
@section('main-content')
<div class="container">


            @include('common.errors') @include('sweet::alert')

    {!! Form::model($asignaciones, ['route' => ['asignaciones.update', $asignaciones->id], 'method' => 'patch']) !!}


            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('docente_id', 'Docente:') !!}
                <select name="docente_id" class="form-control input-lg">
                <option disabled selected value="">Seleccione un Docente</option>
                    @foreach($docent as $docent)
                    <option value="{{$docent->id}}">{{$docent->nombre}} {{$docent->apellido_paterno}} {{$docent->apellido_materno}}</option>
                    @endforeach
                </select>
            </div>

  <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn uppercase btn-primary btn-lg']) !!}


                <form>
                    <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
                </form>
            </div>



@stop