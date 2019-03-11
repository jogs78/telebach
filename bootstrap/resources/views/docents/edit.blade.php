@extends('layouts.app')

@section('main-content')
<div class="container">

    @include('common.errors')

    {!! Form::model($docents, ['route' => ['docents.update', $docents->usuario_id], 'method' => 'patch']) !!}

        @include('docents.fields-edit')

    {!! Form::close() !!}
</div>
@endsection
