@extends('layouts.mainapp')

@section('content')
<div class="main-content">

    <p class="my-titles-2">List of all Models of the <a href="/allmakes"> Manufacturer</a> {{ $make->title }}</p>

    <p class="pre-nex">   {{ $mds->links(); }}</p>

    <div class="all-makes">
        <ul>
            @foreach ($mds as $m)
             
                <a href=""> <li> {{ $m->title }} </li>   
            @endforeach
        </ul>
    </div>

</div>

@endsection