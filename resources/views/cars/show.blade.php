@extends('layouts.mainapp')

@section('content')
<div class="main-content">

@foreach ($car as $c)
        <div class="card m-3 my-show">
        <header class="card-header">
  
        <div class="card" style="background:{{ $c->color }} ">
            {{-- <img src="https://cdn.pixabay.com/photo/2016/11/22/23/44/porsche-1851246_960_720.jpg" alt="Avatar"  --}}
            <img src="https://cdn.pixabay.com/photo/2016/11/22/23/44/porsche-1851246_960_720.jpg" alt="Avatar" 
                    style="width:100%;
                         ">
            <div class=" card-header-title">
              <h4><b>{{ $c->make }} </b></h4>
              <p>{{ $c->model }}</p>
            </div>
        </div>
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