<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Mother Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellido_paterno', 'Apellido paterno:') !!}
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
</div>

<!--- Father Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellido_materno', 'Apellido materno:') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!} {!! Form::reset('Borrar informacion', ['class' => 'btn btn-primary btn-lg'])
    !!}
    <form>
        <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
    </form>
</div>
