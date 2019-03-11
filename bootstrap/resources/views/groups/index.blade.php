 @extends('layouts.app') @section('main-content')
<div class="container">
    @include('sweet::alert')
    <div class="row">
        <h1 class="pull-left">Grupos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('groups.create') !!}">Agregar nuevo</a>
    </div>
    <div class="row">
        @if($groups->isEmpty())
        <div class="well text-center">No hay registros.</div>
        @else
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table" id="grop">
                    <thead>
                        <th>Grupo</th>
                        <th>Turno</th>
                        <th width="450px">Acción</th>
                    </thead>
                    <tbody>
                        @foreach($groups as $group) 
                        <tr>
                            <td>{!! $group->nombre !!}</td>
                            <td>{{$group->turno}}</td>
                            <td>
                                <a href="{!! route('groups.edit', [$group->id]) !!}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a href="{!! route('groups.delete', [$group->id]) !!}" onclick="return confirm('¿Seguro que quieres eliminar este grupo?')">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
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