@extends('layouts.app')@section('main-content')@if($activos->isEmpty())

<div class="row">
	<div class=" container">
		<div class="well text-center"> no hay periodo Activo, por favor activa un periodo para poder asignar materias a los grupos</div>
		<a href="{{url('/periods')}}">LINK</a></div>
</div>
@else
@foreach($activos as $item) @if($item->estado =='Activo')

@endif
@endforeach
<div class="container">@include('sweet::alert')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">crear asignacion en el periodo <strong>{{$item->periodo}}</strong></h3>
		</div>
		<div class="box-body">
			{!!Form::open(['route'=>'estructura.store'])!!}



		 <div class="form-group col-sm-6 col-lg-6">

             {!! Form::label('especialidad_id', 'Semestres y Especialidades:') !!}

   <select name="especialidad_id" class="form-control input-lg" id="deg" >
  <option disabled selected value="">Seleccione un Semestre o una especialidad</option>
                    @foreach($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->nombre}}</option>
                    @endforeach
                </select>
</div>



<div class="form-group col-sm-6 col-lg-6">
	{!!Form::label('materia_id', 'Materia:')!!}
	{!!Form::select('materia_id',['placeholder'=>'seleciona'],null,['id'=>'mat','class'=>'form-control'])!!}
</div>




           <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('group_id', 'Grupo:') !!}
                <select name="grupo_id" class="form-control input-lg">
                   <option disabled selected value="">Seleccione el grupo</option>

                    @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-6 col-lg-6">
                {{--{!!Form::label('periodo_id','Ciclo Escolar:')!!}
                <select name="periodo_id" class="form-control input-lg">--}}
                @foreach($activos as $period)
                <input type="hidden"  name="periodo_id" value="{{$period->id}}">

                @endforeach




            </div>


            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn uppercase btn-primary btn-lg']) !!} {!! Form::reset('Borrar informacion', ['class'
                => 'btn btn-primary btn-lg']) !!}
                <form>
                    <input type="button" value="volver atrás" name="volver atrás2" class="btn btn-primary btn-lg" onclick="history.back()" />
                </form>
            </div>
            {!! Form::close() !!}
        </div>
		</div>
	</div>
</div>
@endif
@stop