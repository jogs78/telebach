<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Grado:') !!} {!! Form::text('nombre', null, ['class' => 'form-control input-lg', 'maxlength'=>'2'])
    !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('turno', 'Turno:') !!} {!! Form::select('turno',['MATUTINO' => 'MATUTINO', 'VESPERTINO' => 'VESPERTINO','REPETIDORES'=>'REPETIDORES'],null,['id'=>'matter','class'=>'form-control
    input-lg']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!} {!! Form::reset('Borrar informacion', ['class' => 'btn btn-primary btn-lg'])
    !!}
    <form>
        <input type="button" value="volver atrás" nombre="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
    </form>
</div>