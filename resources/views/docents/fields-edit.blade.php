<script type="text/javascript">
            function validar(e) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla==8) return true; // 3
             patron =/[A-Za-z\s]/; // 4
             te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
              }
            </script>



<!--- Name Field --->

  <div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','onKeyPress="return validar(event)"
    class="form-control input-lg"']) !!}


</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellido_paterno', 'Apellido paterno:') !!}
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control','onKeyPress="return validar(event)" class="form-control"']) !!}
</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('apellido_materno', 'Apellido materno:') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control','onKeyPress="return validar(event)" class="form-control"']) !!}
</div>


<!--- Gender Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('genero', 'Sexo:') !!}
    {!! Form::select('genero', ['Hombre'=>'Hombre','Mujer'=>'Mujer'],null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control',' maxlength="11"','onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"']) !!}
</div>
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nivel', 'Nivel de estudios:') !!}
    {!! Form::select('nivel_estudio', ['Licenciatura' => 'Licenciatura', 'Maestría' => 'Maestría', 'Doctorado' => 'Doctorado'],null, ['class' => 'form-control']) !!}
</div>





<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">

    {!! Form::reset('Borrar informacion', ['class' => 'btn btn-primary']) !!}


</div>





<div class="form-group col-sm-6 col-lg-4">

<form>

                              <input type="button" value="volver atrás" name="volver atrás2"
                              class="btn btn-primary" onclick="history.back()" />

                          </form>
           </div>