@extends('layouts.mainapp')

@section('content')


<p class="my-titles-2">Welcome {{ Auth::user()->name }}</p>

<ul>
    <li>Add Auto</li>
    <li>My Autos</li>
</ul>

@endsection
