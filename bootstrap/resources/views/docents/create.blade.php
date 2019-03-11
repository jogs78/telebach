@extends('layouts.app') @section('main-content')
<div class="container">
    @include('common.errors') {!! Form::open(['route' => 'docents.store']) !!}
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Agregar un nuevo docente</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include('docents.fields') {!! Form::close() !!}
              @include('sweet::alert')
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection