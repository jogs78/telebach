@extends('layouts.app') @section('main-content')
<div class="container">
@include('sweet::alert')
<div class="row">
 <h1 class="pull">Catalogo de Docentes</h1>


            <a class="btn btn-primary pull-left" style="margin-top: 25px" href="{!!route('docents.create')!!}">Agregar nuevo</a>
        </div>
     <div class="row">
                <table class="table" id="teacher">
                    <thead>
              {{--      <th>id docente</th> --}}
                        <th>Nombre </th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Nivel de estudio</th>
                        <th>Editar Contraseña</th>

                        <th>Acción</th>
                        <th width="50px"></th>
                    </thead>
                    <tbody>
                    @foreach($docents as $director)
             {{--       <td>{{$director->id}}</td>--}}
                    <td>{{$director->nombre}}</td> <td>{{$director->apellido_paterno}}</td>
                    <td>{{$director->apellido_materno}}</td>
                    <td>{{$director->email}}</td>
                    <td>{{$director->telefono}}</td>
                    <td>{{$director->nivel_estudio}}</td>
                    <td><a href="{!!route('contradocente.edit',[$director->id])!!}"><i class="glyphicon glyphicon-edit">Editar-contraseña</i></a>
</td>
                      <td>


<a href="{!!route('docents.edit',[$director->usuario_id])!!}"><i class="glyphicon glyphicon-edit"></i></a>

<a href="{!! route('docents.delete', [$director->usuario_id]) !!}" onclick="return confirm('¿Seguro que quieres eliminar este Docente?')"><i class="glyphicon glyphicon-remove"></i></a>
              </td>


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