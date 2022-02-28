@extends('layouts.mainapp')

@section('content')

<div class="main-content">
    <p class="my-titles-2">List of all Cars</p>
  
     <p class="pre-nex ">   {{ $cars->links(); }}</p>
    
     <table class="table table-striped mt-4">
        <thead>
            <tr>
            <th><abbr title="Id">ID</abbr></th>
            <th><abbr title="Make">Make</abbr></th>
            <th><abbr title="Model">Model</abbr></th>
            {{-- <th><abbr title="Password">Password</abbr></th> --}}
        
            </tr>
        </thead>

        <tbody>
            @foreach ($cars as $c)
                
                <tr>
                    <td>{{ $c->id }}</td>
                    <td> <a href="showcar/{{ $c->id }}/show">{{ $c->make }}</a></td>
                    <td>{{ $c->model }}</td>
                    {{-- <td>{{  $user->password }}</td> --}}
                </tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection