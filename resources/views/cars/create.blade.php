@extends('layouts.mainapp')

@section('content')
<div class="main-content">
  <h1>Add a car</h1>

  {!! Form::open(['route' => 'save_car', 'method'=> 'POST']) !!}

  <div class="form-group display-6 ">
    




      {{ Form::label('make','Manufacturer',['class'=>' m-3']) }}<br>
      {{  Form::select('make', $makes,null); }}<br>

      {{ Form::label('models','Models',['class'=>' m-3']) }}<br>
      {{  Form::select('model', $models,null); }}<br>
      {{-- {{  Form::model('model', array('route'=>['admin.allmakes', $makes])) }}<br> --}}

      
  
      {{ Form::submit('Add Car', ['class'=>'btn btn-primary w-100 m-3 p-3']) }}

  </div>
{!! Form::close() !!}

</div>
@endsection
