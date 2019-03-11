
  <div class="form-group col-sm-6 col-lg-6">

 {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null,['id'=>'name','class' => 'form-control']) !!}
    <span class="help-block with-errors"></span>

</div>
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
      <span class="help-block with-errors"></span>
</div>
