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
        <div class="card-content">
            <div class="content">
            <p> <span class="card-label"> Plate :</span> {{ $c->plate }}</p>
            <p> <span class="card-label"> Color :</span> 
                <span style="background-color:{{  $c->color }};"
                     class="card-label">
                     &Delta;&Delta;
                </span>
            </p>
            <p> <span class="card-label"> Kms :</span> {{ $c->kms }}</p>
            <p> <span class="card-label"> Year :</span> {{ $c->year }}</p>
            <p> <span class="card-label"> Value :</span> {{ $c->value }} €</p>
            <p> <span class="card-label"> Last Revision :</span> {{ $c->last_revision }}</p>
            <p> <span class="card-label"> Next Revision :</span> {{ $c->next_revision }}</p>
            <p> <span class="card-label"> Driver :</span> {{ $c->driver }}</p>
            <p> <span class="card-label"> Details :</span> {{ $c->details }}</p>
           
            </div>
        </div>
        <div class="card-footer">
            <a href="#" class="card-footer-item">Save</a>
            <a href="#" class="card-footer-item">Edit</a>
            <a href="#" class="card-footer-item">Delete</a>
        </div>
        </div>
@endforeach
</div>


@endsection