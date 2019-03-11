

<!--- Password Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Edite su contraseña aqui','required'])  !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!} {!! Form::reset('Borrar informacion', ['class' => 'btn btn-primary btn-lg'])
    !!}
    <form>
        <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
    </form>
</div>
