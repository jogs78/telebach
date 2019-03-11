@extends('layouts.app') @section('main-content')
<div class="container">
@include('sweet::alert')
<div class="row">
 <h1 class="pull-left">Datos del Director</h1>
        </div>
     <div class="box-body">
                <table class="table">
                    <thead>
                        <th>Nombre</th>


                        <th>Email</th>
                        <th>Teléfono</th>

                        <th>Acción</th>
                    </thead>
                    <tbody>
                    @foreach($directors as $director)
                    <tr>
                    <td>{{$director->nombre}}  {{$director->apellido_paterno}}  {{$director->apellido_materno}}</td>

                    <td>{{$director->correo}}</td>
                    <td>{{$director->telefono}}</td>

                    <td>

<a href="{!!route('directors.edit',[$director->id])!!}"><i class="glyphicon glyphicon-edit">Editar</i></a>

                    </td>
</tr>
                    </tbody>


                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    {{--     @endif
    </div>
</div>--}}
@endsection