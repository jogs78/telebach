@extends('layouts.app') @section('main-content')

<div class="container">

    @include('sweet::alert')

    <div class="row">
        <h1 class="pull">Catalogo de periodos</h1>
        <a class="btn btn-primary pull-left" style="margin-top: 15px" href="{!! route('periods.create') !!}">Agregar nuevo</a>
    </div>

    <div class="row">
        @if($periods->isEmpty())
        <div class="well text-center">No hay registros.</div>
        @else
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table" id="periods">
                    <thead>
                        <th>Periodo</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Termino</th>
                        <th>Fecha de Inicio de Vacaciones</th>
                        <th>Fecha de Termino de Vacaciones</th>
                        <th>Fecha de Captura de Calificaciones</th>
                        <th>Estado</th>
                        <th width="50px">Acción</th>
                        <th width="50px">Activar/Desactivar</th>
                    </thead>
                    <tbody>

                        @foreach($periods as $period)
                        <tr>
                            <td>{!! $period->periodo !!}</td>
                            <td>{!! $period->inicio_periodo !!}</td>
                            <td>{!! $period->fin_periodo !!}</td>
                            <td>{!! $period->inicio_vacacion !!}</td>
                            <td>{!! $period->fin_vacacion !!}</td>
                            <td>{!! $period->captura_calificacion !!}</td>
                            <th>{!! $period->estado !!}</th>
                            <td>
                                <a href="{!! route('periods.edit', [$period->id]) !!}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                  <a href="{!! route('periods.delete', [$period->id]) !!}" onclick="return confirm('¿Estas seguro de que deseas eliminar el periodo?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group">
                                    @if($period->estado === 'Inactivo')
                                    <a class="btn btn-primary" href="{!! route('activate.period', [$period->id]) !!}">Activar
                                        <i class="glyphicon glyphicon-edit" title="Activar"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-danger" href="{!! route('desactivate.period', [$period->id]) !!}" onclick="return confirm('¿Estas seguro de que deseas desactivar el periodo?')">Desactivar
                                        <i class="glyphicon glyphicon-trash" title="Desactivar"></i>
                                    </a>
                                    @endif
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @endif
    </div>
</div>
@endsection