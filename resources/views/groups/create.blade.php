@extends('layouts.app') @section('main-content')
<div class="container">

    @include('common.errors') @include('sweet::alert') {!! Form::open(['route' => 'groups.store']) !!}
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear un nuevo grupo</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('groups.fields') {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection