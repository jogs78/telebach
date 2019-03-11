    @extends('layouts.app')

    @section('main-content')

    <div class="container">

        @include('sweet::alert')

        <div class="row">
            <h1 class="pull-left">Materias y Docentes del Grupo <strong>{{ $group->name }}</strong></h1>
        </div>

        <div class="row">
            @if ($matters->isEmpty())
            <div class="well text-center">No hay registros.</div>
            @else
            <table class="table" id="groups">
                <thead>
                    <th>Materia</th>
                    <th>Docente</th>
                    <th>Editar</th>
                </thead>
                <tbody>
                    @foreach($matters as $matter)
                    <?php
                    $group_matter = App\GroupMatter::where('group_id', $group->id)->where('matter_id', $matter->id)->first();

                    $docent = DB::table('docents')
                    ->where([['id', '=', $group_matter->docent_id]])->first(); 
                    if ($matter->docent_id == 0) {
                       $docent = "No hay maestro";
                   }   
                   ?>
                   <tr>
                    <td>{!! $matter->name !!}</td>
                    <td>{{ $docent->name }} {{ $docent->mother_last_name }} {{ $docent->father_last_name }}</td>
                    <td>
                        <a href="{{url('groups/editdocent')}}/{{$matter->id}}/{{ $group->id }}/{{ $docent->id }}" class="btn uppercase btn-success">editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection