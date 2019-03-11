@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($director, ['route' => ['directors.update', $director->id], 'method' => 'patch']) !!}

        @include('directors.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
