@extends('layouts.mainapp')

@section('content')
<div class="main-content">
    <p class="my-titles-2">List of all Manufacturers</p>
  
     <p class="pre-nex">   {{ $makes->links(); }}</p>
    
        <div class="all-makes">
           

            @foreach ($makes as $m)
                
            <ul >
                <a href="/makes/{{ $m->id }}/show"> <li> {{ $m->title }}<span style="color:grey"> {{ $m->code }} </span> </li>          </a>   
            </ul>
                

            @endforeach
                
           
        </div>
</div>

@endsection