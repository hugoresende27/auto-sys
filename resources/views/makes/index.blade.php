@extends('layouts.mainapp')

@section('content')
<div class="main-content">

    <p class="my-titles-2">List of all Models </p>
    
    <p class="my-label-1"><a href="/allmakes">  {{ $manu->make }} </a></p>

    {{-- <p class="pre-nex">   {{ $mds->links(); }}</p> --}}

    <div class="all-makes-index">
        <ul>
            @foreach ($mds as $m)
             
                 <li> {{ $m->title }} </li>   
            @endforeach
        </ul>
    </div>

</div>

@endsection