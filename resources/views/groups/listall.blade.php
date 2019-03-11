  <table class="table">
                    <thead>
                        <th>Grupo</th>
                        <th>Turno</th>
                        <th width="450px">Acción</th>
                    </thead>
                    <tbody>
                        @foreach($groups as $group) 
                        <tr>
                            <td>{!! $group->name !!}</td>
                            <td>{{$group->turn}}</td>
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


                <div class="text-center">
    {!!$groups->links()!!}
</div>