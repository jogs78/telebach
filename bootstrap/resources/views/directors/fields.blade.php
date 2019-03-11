<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Mother Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellido_paterno', 'Apellido paterno:') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
</div>

<!--- Father Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('father_last_name', 'Apellido materno:') !!}
    {!! Form::text('father_last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Home Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('home', 'Domicilio:') !!}
    <input type="text" name="home" id="txt1" class="form-control" placeholder="Introduce localización" />
</div>

<!--- Password Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
