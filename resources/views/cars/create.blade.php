@extends('layouts.mainapp')

@section('content')
<div class="main-content">
  {{-- <h1 class="my-titles-2">Add a car</h1> --}}

  {!! Form::open(['route' => 'save_car', 'method'=> 'POST']) !!}

  <div class="form-group">
    

  {{-- {{ Form::label('make','Manufacturer',['class'=>'']) }}<br> --}}



 <!-- Department Dropdown -->
 <select id='sel_mak' name='sel_mak' class="m-3">
  <option value='0'>-- Select Maker --</option>

  <!-- Read Departments -->
  @foreach($makes['data'] as $make)
    <option value='{{ $make->code }}' >{{ $make->title }}</option>
  @endforeach

</select>
<br>

{{-- {{ Form::label('models','Models',['class'=>'']) }}<br> --}}
<!-- Department Employees Dropdown -->
 <select id='sel_mod' name='sel_mod' required>
 <option value=''>-- Select Model --</option>
</select>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
$(document).ready(function(){

  // Department Change
  $('#sel_mak').change(function(){

     // Department id
     var code = $(this).val();
     
     // Empty the dropdown
     $('#sel_mod').find('option').not(':first').remove();

     // AJAX request 
     $.ajax({
      
       url: 'addcar/getModelos/'+code,
       type: 'get',
       dataType: 'json',
       success: function(response){
        
         var len = 0;
         if(response['data'] != null){
            len = response['data'].length;
         }

         if(len > 0){
            // Read data and create <option >
            for(var i=0; i<len; i++){

               var id = response['data'][i].make_id;
               var name = response['data'][i].title;

               var option = "<option value='"+name+"'>"+name+"</option>";
              //  console.log(name);
               $("#sel_mod").append(option); 
            }
         }
         
       }
     });
  });
});
</script>

<br>

{{-- {{ Form::label('Plate','Plate',['class'=>'']) }} --}}
{{ Form::text('plate','', ['class'=>'form-control text-center m-3','placeholder'=>'Plate','title'=>'##-##-##', 'pattern'=>"(^[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2}-[a-zA-Z0-9]{2})",'required'=>'required']) }}

<div>
  <label for="color">Color</label>
  <input type="color" id="color" name="color"
         value="#e66465"
         class="m-3">
 
</div>

{{ Form::label('year','Year') }}
{{ Form::number('year','', ['class'=>'form-control text-center m-3 mine-input','placeholder'=>1950,'min'=>1950, 'max'=>2025, 'step'=>1]) }}

{{ Form::label('kms','Kms') }}
{{ Form::number('kms','', ['class'=>'form-control text-center m-3','placeholder'=>0,'min'=>0, 'step'=>10000,'required'=>'required']) }}

{{ Form::label('last_rev','Last revision') }}
{{ Form::number('last_rev','', ['class'=>'form-control text-center m-3','placeholder'=>0,'min'=>0, 'step'=>5000,'required'=>'required']) }}

{{ Form::label('details','Details') }}
{{ Form::textarea('details','', ['class'=>'form-control  m-3','placeholder'=>'Details here']) }}

      
  
      {{ Form::submit('Add Car', ['class'=>'btn btn-primary w-100 m-3 p-3']) }}

  </div>
{!! Form::close() !!}

</div>
@endsection
