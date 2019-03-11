@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($period, ['route' => ['periods.update', $period->id], 'method' => 'patch']) !!}

        @include('periods.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
