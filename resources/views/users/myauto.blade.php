@extends('layouts.mainapp')

@section('content')



<div class="main-content">

    <p class="my-titles-2">List of all Cars</p>
     {{-- <p class="pre-nex">   {{ $cars->links(); }}</p> --}}
    
     <table class="table table-striped table-logos">
        <thead>
            <tr>
                <th><abbr title="Id">Image</abbr></th>
                <th><abbr title="Make">Make</abbr></th>
                <th><abbr title="Model">Model</abbr></th>
                <th><abbr title="Model">Year</abbr></th>
            {{-- <th><abbr title="Password">Password</abbr></th> --}}
        
            </tr>
        </thead>

        <tbody>
            @foreach ($cars as $c)
                
                <tr>
                    <td>

                        <img class ="img-logo-list" src="{{ asset('/images/'. $c->images_nr) }}" alt="Avatar" 
                        
                             >

                    </td>
                    <td class="align-middle"> <a href="showcar/{{ $c->id }}/show"> {{ $c->make }} </a> </td>
                    <td class="align-middle">{{ $c->model }}</td>
                    <td class="align-middle">{{  $c->year }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection