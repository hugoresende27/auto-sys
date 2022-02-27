@extends('layouts.mainapp')

@section('content')
<div class="main-content">
  <h1>Add a car</h1>

  {!! Form::open(['route' => 'save_car', 'method'=> 'POST']) !!}

  <div class="form-group display-6 ">
    

  {{ Form::label('make','Manufacturer',['class'=>' m-3']) }}<br>



 <!-- Department Dropdown -->
 <select id='sel_mak' name='sel_mak'>
  <option value='0'>-- Select Maker --</option>

  <!-- Read Departments -->
  @foreach($makes['data'] as $make)
    <option value='{{ $make->code }}'>{{ $make->title }}</option>
  @endforeach

</select>
<br>

{{ Form::label('models','Models',['class'=>' m-3']) }}<br>
<!-- Department Employees Dropdown -->
 <select id='sel_mod' name='sel_mod'>
 <option value='0'>-- Select Model --</option>
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

      {{-- {{ Form::label('models','Models',['class'=>' m-3']) }}<br> --}}
      {{-- {{  Form::select('model', $models,null); }}<br> --}}
 


 {{-- {{  dd(get_defined_vars()); }} --}}
 

      
  
      {{ Form::submit('Add Car', ['class'=>'btn btn-primary w-100 m-3 p-3']) }}

  </div>
{!! Form::close() !!}

</div>
@endsection
