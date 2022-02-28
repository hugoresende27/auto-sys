@extends('layouts.mainapp')

@section('content')
<div class="main-content">
    <p class="my-titles-2">List of all Manufacturers</p>

  
  
     <p class="pre-nex">   {{ $makes->links(); }}</p>
    
        <div class="all-makes">
           
            <ul >
                @foreach ($makes as $m)
                    
            
                    {{-- <a href="/makes/{{ $m->id }}/show"> <li> {{ $m->title }}<span style="color:grey"> {{ $m->code }} </span> </li>          </a>    --}}
                    <a href="/makes/{{ $m->id }}/show"> <li> {{ $m->make }} </li>          </a>   
            

                @endforeach
            </ul>
                
                
           
        </div>
</div>

@endsection