<!--- Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('periodo', 'Periodo escolar Mes año):') !!}
    {!! Form::text('periodo', null, ['class' => 'form-control', 'placeholder' => 'Mes/Mes año']) !!}
</div>

<!--- Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('inicio_periodo', 'Fecha de Inicio:') !!}
    <input type="date" name="inicio_periodo" class="form-control" value="{{ $period->inicio_periodo }}">
</div>

<!--- Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fin_periodo', 'Fecha de Termino:') !!}
    <input type="date" name="fin_periodo" class="form-control" value="{{ $period->fin_periodo }}">
</div>

<!--- Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('inicio_vacacion', 'Fecha de Inicio de vacaciones:') !!}
    <input type="date" name="inicio_vacacion" class="form-control" value="{{ $period->inicio_vacacion }}">
</div>

<!--- Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fin_vacacion', 'Fecha de Termino de vacaciones:') !!}
    <input type="date" name="fin_vacacion" class="form-control" value="{{ $period->fin_vacacion }}">
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg']) !!}
    {!! Form::reset('Borrar informacion', ['class' => 'btn btn-primary btn-lg']) !!}
    <form>
        <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
    </form>
</div>