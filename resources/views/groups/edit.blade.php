@extends('layouts.app')
@section('main-content')
<div class="container">
 @include('sweet::alert')
    @include('common.errors')

    {!! Form::model($group, ['route' => ['groups.update', $group->id], 'method' => 'patch']) !!}

        @include('groups.add')

    {!! Form::close() !!}
</div>
@endsection
