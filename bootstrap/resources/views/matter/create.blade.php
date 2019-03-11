
        
  
	     <div class="form-group col-sm-6 col-lg-4">

                  {!!Form::label('Nombre')!!}
                  {!!Form::text('nombre',null,['id'=>'name','class'=>'form-control','placeholder'=>'Nombre de la Materia'])!!}
             </div>

             <div class="form-group col-sm-6 col-lg-4">
                  {!!Form::label('Clave')!!}
                  {!!Form::text('clave',null,['id'=>'key','class'=>'form-control','placeholder'=>'Clave'])!!}
             </div>
              <div class="form-group col-sm-6 col-lg-4">
                  {!!Form::label('Descripcion')!!}
                  {!!Form:: textarea('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Digite Descripcion'])!!}
             </div>
             <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('unidades', 'Unidades:') !!}
     {!! Form::select('unidades', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8' =>'8'] ,null, ['class' => 'form-control']) !!}
</div>
            <div class="form-group col-sm-6 col-lg-4">
                  {!!Form::label('Semestre y especialidades')!!}
                  {!!Form::select('especialidad_id',$degrees,null, ['id'=>'Degree','class'=>'form-control','placeholder'=>'Digite Semestre'])!!}
             </div>
              
            