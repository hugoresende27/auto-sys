@extends('layouts.mainapp')

@section('content')
<div class="main-content">

@foreach ($car as $c)
        <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                
                {{ $c->make }} {{ $c->model }}
                
            
            </p>
           
        </header>
        <div class="card-content text-left">
            <div class="content">
            <p class="card-info"> <span class="card-label"> Plate :</span> {{ $c->plate }}</p>
            <p class="card-info"> <span class="card-label"> Color :</span> 
                <span style="background-color:{{  $c->color }};"
                     class="card-label color-box">
                     
                </span>
            </p>
            <p class="card-info"> <span class="card-label"> Kms :</span> {{ $c->kms }}</p>
            <p class="card-info"> <span class="card-label"> Year :</span> {{ $c->year }}</p>
            <p class="card-info"> <span class="card-label"> Value :</span> {{ round($c->value,2) }} €</p>
            <p class="card-info"> <span class="card-label"> Last Revision :</span> {{ $c->last_revision }} Kms</p>
            <p class="card-info"> <span class="card-label"> Next Revision :</span> {{ $c->next_revision }} Kms</p>
            <p class="card-info"> <span class="card-label"> Driver :</span> {{ $c->driver }}</p>
            <p class="card-info"> <span class="card-label"> Details :</span> {{ $c->details }}</p>
           
            </div>
        </div>
        <div class="side-box">
          
            <a href="/showcar/{{ $c->id }}/edit" class="hero-btn">Edit</a>

    
            <form action="/showcar/{{ $c->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit"
                        class="hero-btn"
                        onclick="return confirm('Are you sure?')" 
                        > Delete </button>

            </form>
        </div>
        </div>
@endforeach
</div>


@endsection