@extends('layouts.mainapp')

@section('content')

<div class="main-content">
    <p class="my-titles-2">List of all Cars V2</p>
  
     <p class="pre-nex">   {{ $all->links(); }}</p>
    
     <table class="table table-striped mt-4">
        <thead>
            <tr>
            <th><abbr title="Id">ID</abbr></th>
            {{-- <th><abbr title="Id">Year</abbr></th> --}}
            <th><abbr title="Make">Make</abbr></th>
            <th><abbr title="Model">Model</abbr></th>
       
        
            </tr>
        </thead>

        <tbody>
            @foreach ($all as $c)
                
                <tr>
                    <td>{{ $c->id }}</td>
                    {{-- <td>{{ $c->year }}</td> --}}
                    <td> <a href="showcar/{{ $c->id }}/show">{{ $c->make }}</a></td>
                    <td>{{ $c->model }}</td>
                 
                </tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection