@extends('layouts.app')

@section('main-content')
<div class="container">

	@include('common.errors')

	{!! Form::open(['route' => 'addmatter.store']) !!}
        {{ csrf_field() }}

<!--- Degree Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('degree_id', 'Selecciona una carrera o un semestre:') !!}
    {!! Form::select('degree_id',$degrees,null,['id'=>'carre', 'class' => 'form-control']) !!}
    <input type="hidden" value="{{$group->id}}" name="group_id">
</div>


<!--- Matter Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('matter_id', 'Materia:') !!}
    {!! Form::select('matter_id',['placeholder'=>'Selecciona'],null,['id'=>'mate','class'=>'form-control']) !!}
</div>

<!--- Docent Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('docent_id', 'Asignar Maestro:') !!}
    {!! Form::select('docent_id', $docents, null, ['placeholder'=>'Selecciona','id'=>'Degree', 'class' => 'form-control']) !!}
</div>

<!--- Period Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('period', 'Periodo Activo:') !!}
    @foreach($activos as $item)
    @if($item->status === 'Activo')
     {!! Form::text('period', $item->period, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
    @endif
    @endforeach
</div>

<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>






<div class="form-group col-sm-6 col-lg-4">

<form>
                            
                              <input type="button" value="volver atrás" name="volver atrás2"
                              class="btn btn-primary" onclick="history.back()" />
                            
                          </form>
           </div>




    {!! Form::close() !!}
</div>
@endsection
