
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!} {!! Form::text('nombre', null, ['id'=>'name','class' => 'form-control input-lg']) !!}
</div>

<div class="form-group col-sm-8 col-lg-8">
    {!! Form::label('description', 'Descripción:') !!} {!! Form::textarea('description', null, ['class' => 'form-control input-lg']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!} {!! Form::reset('Borrar informacion', ['class' => 'btn btn-primary btn-lg'])
    !!}
    <form>
        <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
    </form>
</div>
