{{--

<div class="modal modal-primary" id="viewMatters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit materia</h4>
      </div>
      <form action="{{route('asignaciones.update','t')}}" method="post">
          {{method_field('patch')}}
          {{csrf_field()}}
        <div class="modal-body">
            <input type="hidden" name="asignacion_id" id="asignacion_id" value="">
  <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('docente_id', 'Docente:') !!}
                <select name="docente_id" class="form-control input-lg">
                <option disabled selected value="">Seleccione un Docente</option>
                @php
                $docent=DB::table('usuarios')->join('docentes','docentes.usuario_id','=','usuarios.id')->select('usuarios.*')->get();@endphp
                    @foreach($asignacion->$docent as $docent)
                    <option value="{{$docent->id}}">{{$docent->nombre}} {{$docent->apellido_paterno}} {{$docent->apellido_materno}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
   --}}