    @extends('layouts.app')

    @section('main-content')

    <div class="container">

        @include('sweet::alert')

        <div class="row">
            <h1 class="pull-left">Selecciona un nuevo Docente para la Materia  <strong> {{ $matter->name }}</strong> en el grupo {{ $group->name }}</h1>
        </div>

        <div class="row">
            {!!  Form::open(array('action'=>'GroupController@doDocent', 'method' => 'post')) !!}  
            <!--- Degree Field --->
            <div class="form-group col-sm-8 col-lg-8">
            {!! Form::label('docent', 'Docente:') !!}
            {!! Form::select('docent_id', $docents, null, ['placeholder'=>'Selecciona','id'=>'Degree', 'class' => 'form-control']) !!}
            </div>
            <!--<div class="form-group col-sm-8 col-lg-8">
                <select name="matter_id" id="" class="form-control">
                @foreach ($matters as $element)
                    <option value="{{ $element->id }}">{{$element->name}}</option>
                @endforeach
                </select>
            </div>-->
            <!--- Submit Field --->
            <div class="form-group col-sm-12">
                 {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
            <input type="hidden" value="{{ $matter->id }}" name="matter_id">
            <input type="hidden" value="{{ $group->id }}" name="group_id">
            {!! Form::close() !!}
        </div>
    </div>
    @endsection