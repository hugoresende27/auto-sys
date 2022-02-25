@extends('layouts.mainapp')

@section('content')

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
  
    <p class="my-titles-2">List of all Users</p>

    <table class="table">
        <thead>
            <tr>
              <th><abbr title="Name of the user">Name</abbr></th>
              <th><abbr title="Date of registration">Created at</abbr></th>
              <th><abbr title="Password">Password</abbr></th>
          
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{  $user->password }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>

@endsection