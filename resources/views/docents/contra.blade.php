@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($do, ['route' => ['contradocente.update', $do->id], 'method' => 'patch']) !!}

        @include('docents.fields-con')

    {!! Form::close() !!}
</div>
@endsection
