@extends('layouts.app')
@section('main-content')
@if($activos->isEmpty())
<div class="row">
    <div class="container">
        <div class="well text-center">No hay periodo Activo, por favor activa un periodo para poder asignar clases al docente en el siguiente
            <a href="{{ url('/periods')}}">LINK</a>.</div>
    </div>
</div>
@else
 @foreach($activos as $item) @if($item->estado == 'Activo')
@endif
 @endforeach
<div class="container">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear asignación en el periodo
                <strong>{{$item->periodo}}</strong>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'asignaciones.store']) !!}







            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('docente_id', 'Docente:') !!}
                <select name="docente_id" class="form-control input-lg">
                <option disabled selected value="">Seleccione un Docente</option>
                    @foreach($docents as $docent)
                    <option value="{{$docent->id}}">{{$docent->nombre}} {{$docent->apellido_paterno}} {{$docent->apellido_materno}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn uppercase btn-primary btn-lg']) !!} {!! Form::reset('Borrar informacion', ['class'
                => 'btn btn-primary btn-lg']) !!}
                <form>
                    <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
                </form>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<div class="row">
    <div class="container">
        @include('common.errors') @include('sweet::alert')

    </div>
</div>
@endif @endsection


