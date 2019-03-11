

  <div class="form-group col-sm-6 col-lg-4">

    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['id'=>'name','class' => 'form-control']) !!}
</div>
  <div class="form-group col-sm-6 col-lg-4">
                  {!!Form::label('Descripcion')!!}
                  {!!Form:: textarea('description',null,['id'=>'description','class'=>'form-control'])!!}
             </div>