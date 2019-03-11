@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($degree, ['route' => ['degrees.update', $degree->id], 'method' => 'patch']) !!}

        @include('degrees.fields')

    {!! Form::close() !!}
</div>
@endsection
