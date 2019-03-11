
@extends('layouts.app')
@section('main-content')
<div class="container">


            @include('common.errors') @include('sweet::alert')

    {!! Form::model($asignaciones, ['route' => ['estructura.update', $asignaciones->id], 'method' => 'patch']) !!}

@include('estructura.formulario')



@stop