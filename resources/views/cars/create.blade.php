@extends('layouts.mainapp')

@section('content')
<div class="main-content">
  <h1>Add a car</h1>

  {!! Form::open(['route' => 'save_car', 'method'=> 'POST']) !!}

  <div class="form-group display-6 ">
    




      {{ Form::label('make','Manufacturer',['class'=>' m-3']) }}<br>
      {{-- {{  Form::select('make', $makes,null); }}<br> --}}

      <select name="make" id="make">
        @foreach ($makes as $mak)
       
          <option value="{{ $mak->code }}">{{ $mak->title }}</option>
          @if (value('make') == "ACURA")
              <select name="model" id="model">
                @foreach ($models as $mod)
                  <option value="">{{ $mod->title }}</option>
                @endforeach
               
              </select>
          @endif
        @endforeach
      </select>

   
    


      {{ Form::label('models','Models',['class'=>' m-3']) }}<br>
      {{-- {{  Form::select('model', $models,null); }}<br> --}}
 
{{ $x = old('make') }}

 {{  dd(get_defined_vars()); }}

      
  
      {{ Form::submit('Add Car', ['class'=>'btn btn-primary w-100 m-3 p-3']) }}

  </div>
{!! Form::close() !!}

</div>
@endsection
