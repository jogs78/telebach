@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($director, ['route' => ['contra.update', $director->id], 'method' => 'patch']) !!}

        @include('directors.fields-contra')

    {!! Form::close() !!}
</div>
@endsection
