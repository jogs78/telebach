@extends('layouts.app') @section('main-content')
<div class="container">
    <?php
	$period = DB::select('select * from periodos where estado = ?', ['Activo']);
    ?>
        @include('common.errors') {!! Form::open(['route' => 'periods.store']) !!}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Crear ciclo escolar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('periods.fields') {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
@endsection