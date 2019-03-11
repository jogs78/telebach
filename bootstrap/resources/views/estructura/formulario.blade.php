{{--
 <div class="form-group col-sm-4 col-lg-4">
 {!! Form::label('periodo_id', 'Periodo Escolar:') !!}
 <select name=" periodo_id"  class="form-control input-lg" id="">
@foreach($activos as $period)
<option value=" {{$period->id}}">{{$period->periodo}}</option>
@endforeach
 </select>
 </div>
 --}}

 <div class="form-group col-sm-6 col-lg-6" >

                {!! Form::label('materia_id', 'Materia')!!}
                {!! Form::select('materia_id', $matters, null,['id'=>'matter', 'class'=> 'form-control select2'])!!}
</div>


<div class="form-group col-sm-6 col-lg-6" >
    {!! Form::label('grupo_id', 'Grupos:') !!}
    {!! Form::select('grupo_id', $groups, null, ['id'=>'group', 'class' => 'form-control input-lg'])
    !!}
 </div>

  <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn uppercase btn-primary btn-lg']) !!}


                <form>
                    <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
                </form>
            </div>



